<?php

use App\Http\Middleware\EnsureAccountIsActivated;
use App\Http\Middleware\EnsureDatabaseIsMigrated;
use App\Http\Middleware\EnsureIsAdmin;
use App\Http\Middleware\EnsurePublicSection;
use App\Http\Middleware\EnsureLegalTermsAccepted;
use App\Http\Middleware\PublicProfile;
use App\Http\Middleware\RedirectIfNotInstalled;
use App\Http\Middleware\RedirectToSetup;
use App\Http\Middleware\ResolveTheme;
use App\Http\Middleware\SetLocale;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Session\Middleware\AuthenticateSession;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Ordre volontaire et non négociable :
        //
        // 1. RedirectIfNotInstalled — tant que l'application n'est pas installée, aucune
        //    requête ne doit toucher la base (elle peut être absente ou vide). Ce middleware
        //    court-circuite tout vers l'assistant d'installation SANS lire la moindre table.
        //
        // 2. EnsureDatabaseIsMigrated — une fois installée, on garantit que le schéma est à
        //    jour avant qu'un contrôleur ne puisse échouer sur une colonne manquante. Il
        //    délègue à `artisan migrate`, seule méthode officielle de faire évoluer la base.
        $middleware->web(prepend: [
            RedirectIfNotInstalled::class,
            EnsureDatabaseIsMigrated::class,
        ]);

        // En fin de pile, à l'inverse : ces trois-là ont besoin de la session ouverte et des
        // cookies déchiffrés pour connaître le compte connecté et ses préférences.
        //
        // AuthenticateSession compare le haché de mot de passe gardé en session à celui en
        // base : un changement de mot de passe met donc fin aux sessions déjà ouvertes
        // ailleurs, sans qu'on ait à tenir soi-même un second indicateur. Il fonctionne ici
        // parce que User::getAuthPassword() désigne bien password_hash.
        $middleware->web(append: [
            AuthenticateSession::class,
            SetLocale::class,
            ResolveTheme::class,
        ]);

        $middleware->alias([
            'account.active' => EnsureAccountIsActivated::class,
            'terms.accepted' => EnsureLegalTermsAccepted::class,
            'admin' => EnsureIsAdmin::class,
            'setup.complete' => RedirectToSetup::class,

            // Profil public : le premier établit qui l'on regarde, le second si la rubrique
            // demandée est publiée. Deux questions distinctes, deux gardes distincts —
            // aucune des deux réponses ne se déduit de l'autre.
            'public.profile' => PublicProfile::class,
            'public.section' => EnsurePublicSection::class,
        ]);

        $middleware->redirectGuestsTo('/login');
        $middleware->redirectUsersTo('/dashboard');
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
