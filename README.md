<h1 align="center">MyTransition</h1>

<p align="center">
  <strong>Un carnet de suivi de transition que vous hébergez vous-même.</strong><br>
  <em>A transition tracker you host yourself.</em>
</p>

<p align="center">
  <a href="#licence">AGPL&nbsp;v3</a> ·
  PHP&nbsp;8.2+ ·
  Laravel&nbsp;12 ·
  SQLite ou MySQL ·
  7&nbsp;langues
</p>

<p align="center">
  <a href="#-français">Français</a> · <a href="#-english">English</a>
</p>

---

# Français

## Pourquoi

Un parcours de transition produit beaucoup de choses à retenir : des dosages, des bilans
sanguins, des dates d'opération, des rendez-vous, des démarches administratives, des
factures, des photos. La plupart des outils qui promettent de vous aider à les suivre
gardent ces données sur leurs serveurs.

MyTransition fait l'inverse. Vous l'installez sur votre propre hébergement, et vos données
n'en sortent que si vous le décidez.

## Ce que c'est, et ce que ce n'est pas

C'est **un carnet**. Il enregistre ce que vous y écrivez et vous le remontre en ordre.

Ce n'est **ni un conseiller médical, ni un juge**. Deux règles traversent toute
l'application :

- **on ne devine jamais une donnée médicale.** Une posologie écrite en texte libre n'est pas
  transformée en répartition matin/midi/soir, et une date partielle ne produit pas de
  compteur de jours. Ce qui n'a pas été saisi reste absent ;
- **l'application situe, elle ne juge pas.** Les fourchettes de référence placent une valeur
  sur une échelle. Aucune alerte, aucune couleur de verdict, aucune interprétation.

## Vous choisissez ce qui vous concerne

Un parcours n'a pas de forme obligatoire. Quelqu'un qui ne prend pas d'hormones n'a aucune
raison de croiser une rubrique hormonale à chaque visite.

**Chaque rubrique s'active ou se désactive dans vos préférences.** Ce qui est décoché
disparaît de la navigation, du tableau de bord et de la chronologie — rien n'est supprimé, et
une rubrique masquée qui contient déjà des données reste atteignable par son adresse.

### Les rubriques

| Rubrique | Ce qu'elle porte |
|---|---|
| **Parcours hormonal** | Traitements, molécules, doses, posologie par moment de la journée |
| **Bilans sanguins** | 22 marqueurs, tous facultatifs, avec fourchettes de référence et courbes |
| **Mensurations** | Poids, tour de poitrine, de taille, de hanches… |
| **Photos d'évolution** | Chiffrées au repos, servies uniquement après vérification |
| **Symptômes** | Ce qu'on ressent, daté, avec une intensité facultative |
| **Journal** | Vos mots. **Jamais partageable, par construction** |
| **Chronologie** | Tout ce qui est daté, réuni. Reconstruite à chaque visite, jamais stockée en double |
| **Signets** | Liens utiles, avec récupération automatique du titre et de l'icône |
| **Rendez-vous** | Avec notes préparatoires et questions à poser sur place |
| **Chirurgies** | Six thèmes au choix, dossiers, étapes, dates |
| **Laser / épilation** | Séances, zones, rang dans le forfait |
| **Orthophonie** | Séances et mesures vocales, sans aucune valeur cible |
| **Prise en charge** | Statut et démarches, vocabulaire volontairement neutre selon les pays |
| **Démarches** | Changement de prénom, de mention de sexe, avec listes d'étapes adaptables |
| **Tâches** | Ce qui reste à faire, avec échéance et priorité |
| **Dépenses** | Montants, deux lignes de remboursement, reste à charge recalculé |
| **Documents** | PDF, images, audio, vidéo — chiffrés au repos |

### Les chirurgies, une par une

**Rien n'est coché d'avance.** Contrairement aux rubriques, dont l'affichage est actif par
défaut, aucune opération n'est proposée tant qu'elle n'a pas été choisie : féminisation
faciale, vaginoplastie, phalloplastie, augmentation mammaire, torsoplastie, suivi mammaire.

Personne n'a à décocher ce qui ne le concerne pas.

## Partager, sans publier

Trois mécanismes indépendants, tous facultatifs et tous fermés par défaut.

**Le profil public** montre *les mêmes écrans que les vôtres*, en lecture seule. Vous cochez
ce qui y figure, rubrique par rubrique. L'adresse est un jeton imprévisible — personne ne
peut deviner qui, sur une instance, a publié un profil. La changer révoque tous les liens
déjà donnés sans dépublier : on change la serrure, pas la porte.

**Les partages ponctuels** portent leur propre sélection, leur propre adresse, leur propre
identifiant et mot de passe, et une échéance facultative. Datés, ils cessent tout seuls —
personne ne pense à révoquer après un rendez-vous. Des profils types (médecin généraliste,
endocrinologue, chirurgien·ne, orthophoniste, psy, dermatologue, un proche) cochent un jeu de
rubriques de départ, que vous restez libre de modifier.

**Un mot de passe** peut protéger l'entrée, à chaque fois.

Ce qui tient l'ensemble :

- **le journal n'est pas partageable.** Il ne figure pas au catalogue, et rien ne permet de
  l'y faire entrer : ce n'est pas une case décochée par défaut, c'est une case qui n'existe
  pas ;
- **une visite n'écrit rien.** Toutes les routes de partage sont des lectures, et aucune
  session n'est ouverte au nom du compte visité ;
- **un contenu qu'on ne peut pas voir est indistinguable d'un contenu qui n'existe pas.**
  Jeton inconnu, profil dépublié, rubrique non cochée, lien expiré : une seule réponse, 404 ;
- **aucun visiteur n'est identifié.** Vous voyez combien de fois votre adresse a été ouverte
  et quand pour la dernière fois. Ni adresse IP, ni empreinte, ni historique.

## Vie privée

Ce ne sont pas des intentions, ce sont des décisions inscrites dans le code.

- **Tout est privé par défaut.** Aucune rubrique n'est publiée sans activation explicite.
- **Aucune adresse IP n'est conservée**, nulle part. Les compteurs sont agrégés. Le limiteur
  de tentatives de connexion enregistre l'identifiant saisi, jamais une adresse.
- **Les fichiers déposés vivent hors du dossier public**, sous des noms aléatoires qui ne
  reprennent jamais le nom d'origine, **chiffrés au repos en AES-256** avec une clé dérivée
  de la clé d'application. Ils ne sont servis que par un contrôleur qui vérifie
  l'appartenance à chaque lecture.
- **Aucun traceur, aucune ressource tierce** en dehors d'une police de caractères.
- **Vous pouvez tout emporter et tout effacer** : export JSON complet, archive avec les
  fichiers, fiche imprimable sur la période de votre choix, et suppression définitive du
  compte.

## Langues et apparence

Sept langues : **français, anglais, espagnol, allemand, portugais, italien, japonais**. Aucun
texte n'est écrit en dur dans le code.

Thème sombre par défaut, thème clair, ou celui du système. Le choix est posé côté serveur :
la page est déjà à la bonne couleur au premier octet, sans clignotement.

Sur téléphone en orientation portrait, la navigation passe en bas de l'écran, avec un bouton
d'ajout au centre qui ouvre directement le formulaire de la rubrique choisie.

---

## Installation

### Prérequis

- **PHP 8.2 ou supérieur**, avec `mbstring`, `openssl`, `fileinfo`, et `pdo_sqlite` et/ou
  `pdo_mysql`
- **Composer**
- Un serveur web pointant sur le dossier **`public/`**
- L'extension `zip` de PHP est recommandée (sauvegardes)

### Avec un accès SSH

```bash
cd /chemin/vers/le/site

composer install --no-dev --optimize-autoloader

cp .env.example .env
php artisan key:generate

chmod -R 775 storage bootstrap/cache database

php artisan mytransition:install
```

### Sans accès SSH

Sur votre ordinateur, dans le dossier du projet :

```bash
composer install --no-dev --optimize-autoloader
```

Transférez ensuite l'ensemble du projet, **dossier `vendor/` compris**, puis renommez
`.env.example` en `.env` sur le serveur.

> **Attention :** beaucoup de clients FTP masquent les fichiers commençant par un point.
> Activez leur affichage, faute de quoi `.env.example` et les `.htaccess` ne partiront pas.

Ouvrez enfin **`/install`** dans votre navigateur.

### L'assistant

Trois écrans : le site (langue et nom), la base de données (SQLite ou MySQL — la connexion
est éprouvée avant de continuer), votre compte administrateur.

Rien n'est écrit avant la validation du dernier écran : une installation interrompue ne
laisse ni `.env` pointant dans le vide, ni base à moitié construite.

À la première connexion, un second assistant règle l'envoi de messages, les inscriptions, le
partage et votre profil.

---

## Problèmes courants

<details>
<summary><strong>Une page blanche, ou « 500 », juste après le transfert</strong></summary>

Les dépendances ne sont pas installées. Lancez `composer install --no-dev` sur le serveur,
ou transférez le dossier `vendor/` depuis votre ordinateur.

Si vous ouvrez le site avant cette étape, une page vous rappelle la marche à suivre plutôt
que de vous laisser devant une erreur.
</details>

<details>
<summary><strong>« The stream or file could not be opened »</strong></summary>

Les permissions d'écriture. Trois dossiers doivent être accessibles en écriture par le
serveur web :

```bash
chmod -R 775 storage bootstrap/cache database
```
</details>

<details>
<summary><strong>Les messages ne partent pas</strong></summary>

Dans l'immense majorité des cas, **l'adresse d'expédition**. Elle doit appartenir à un
domaine que votre hébergeur héberge réellement — c'est elle qu'il vérifie. Un expéditeur
qu'il ne reconnaît pas est refusé *sans qu'aucune erreur de connexion n'apparaisse*.

Le bouton d'essai indique par quel transport le message est parti. S'il annonce `log`, rien
n'a été envoyé : le message a été écrit dans `storage/logs/laravel.log`. Choisissez
« serveur d'envoi » ou « SMTP ».

Chez la plupart des hébergeurs mutualisés, « serveur d'envoi » suffit. En SMTP, les réglages
habituels sont le port `587` avec chiffrement `tls`, ou `465` avec `ssl`.
</details>

<details>
<summary><strong>Un dépôt de fichier échoue sans message clair</strong></summary>

La taille se règle dans l'administration, mais **trois plafonds** décident : ce réglage,
`upload_max_filesize` et `post_max_size` — et c'est le plus petit qui s'applique. L'écran
d'administration montre les trois et dit lequel gagne.

Un fichier trop lourd pour PHP est tronqué *avant* d'arriver au code, et le formulaire se
plaint alors d'un fichier manquant pour un fichier pourtant choisi.
</details>

<details>
<summary><strong>Une modification n'apparaît pas après une mise à jour</strong></summary>

Les vues compilées. Après toute mise à jour :

```bash
php artisan view:clear
php artisan optimize:clear
```
</details>

<details>
<summary><strong>Migrations : que faire</strong></summary>

Les mises à jour livrent parfois de nouveaux fichiers dans `database/migrations/`.

```bash
php artisan migrate --force
```

L'état du schéma vit dans la table `migrations`, et nulle part ailleurs. Aucune migration
existante n'est jamais modifiée : les évolutions arrivent toujours par un fichier de plus.
</details>

---

## Documentation

Le dossier `docs/` détaille les décisions de conception, pas seulement leur usage.

| Fichier | Sujet |
|---|---|
| `CONFIGURATION.md` | Réglages, envoi de messages, pièces jointes |
| `MIGRATIONS.md` | Faire évoluer la base |
| `AUTHENTIFICATION.md` | Comptes, sessions, limitation des tentatives |
| `SUIVI.md` | Tableau de bord, parcours hormonal, bilans |
| `ORGANISATION.md` | Parcours de soin, dépenses, documents |
| `PARTAGE.md` | Profil public, partages ponctuels |
| `MOBILE.md` | Navigation sur téléphone |

---

## Contribuer

Les signalements de bogues, suggestions et traductions sont les bienvenus.

Pour une traduction : les fichiers vivent dans `lang/<code>/`, le français fait référence.
Une clé absente retombe silencieusement sur le français plutôt que d'afficher son
identifiant.

---

## Licence

**GNU Affero General Public License, version 3 ou ultérieure.**

Vous pouvez utiliser, étudier, modifier et redistribuer ce logiciel. Si vous en proposez une
version modifiée à d'autres personnes **à travers un réseau**, vous devez leur en offrir le
code source. Voir [`LICENSE`](LICENSE).

---
---

# English

## Why

Transitioning generates a lot to keep track of: dosages, blood work, surgery dates,
appointments, paperwork, invoices, photos. Most tools that promise to help you follow all
that keep your data on their servers.

MyTransition does the opposite. You install it on your own hosting, and your data leaves it
only if you decide so.

## What it is, and what it is not

It is **a notebook**. It records what you write and shows it back to you in order.

It is **neither a medical adviser nor a judge**. Two rules run through the whole
application:

- **medical data is never guessed.** A dosage written in free text is not turned into a
  morning/noon/evening breakdown, and a partial date does not produce a day counter. What
  was not entered stays absent;
- **the application situates, it does not judge.** Reference ranges place a value on a
  scale. No alerts, no verdict colours, no interpretation.

## You choose what concerns you

A transition has no mandatory shape. Someone who does not take hormones has no reason to
walk past a hormone section on every visit.

**Every section can be switched on or off in your preferences.** What you untick disappears
from the navigation, the dashboard and the timeline — nothing is deleted, and a hidden
section that already holds data remains reachable by its address.

### The sections

| Section | What it holds |
|---|---|
| **Hormone pathway** | Treatments, molecules, doses, per-time-of-day dosage |
| **Blood work** | 22 markers, all optional, with reference ranges and charts |
| **Measurements** | Weight, chest, waist, hips… |
| **Progress photos** | Encrypted at rest, served only after an ownership check |
| **Symptoms** | What you feel, dated, with an optional intensity |
| **Journal** | Your words. **Never shareable, by design** |
| **Timeline** | Everything dated, gathered. Rebuilt on each visit, never stored twice |
| **Bookmarks** | Useful links, with automatic title and icon retrieval |
| **Appointments** | With preparation notes and questions to ask on the spot |
| **Surgeries** | Six themes to choose from, records, steps, dates |
| **Hair removal** | Sessions, areas, rank in the course |
| **Speech therapy** | Sessions and voice measurements, with no target values |
| **Long-term care** | Status and steps, deliberately country-neutral wording |
| **Paperwork** | Name change, gender marker change, with adaptable step lists |
| **Tasks** | What is left to do, with due date and priority |
| **Expenses** | Amounts, two reimbursement lines, out-of-pocket recomputed |
| **Documents** | PDF, images, audio, video — encrypted at rest |

### Surgeries, one at a time

**Nothing is ticked in advance.** Unlike sections, which are visible by default, no operation
is offered until it has been chosen: facial feminisation, vaginoplasty, phalloplasty, breast
augmentation, chest surgery, breast screening.

Nobody should have to untick what does not concern them.

## Sharing, without publishing

Three independent mechanisms, all optional and all closed by default.

**The public profile** shows *the same screens as yours*, read-only. You tick what appears on
it, section by section. The address is an unguessable token — nobody can discover who on an
instance has published a profile. Changing it revokes every link already given without
unpublishing: you change the lock, not the door.

**One-off shares** carry their own selection, their own address, their own username and
password, and an optional end date. Dated, they end on their own — nobody remembers to revoke
after an appointment. Role presets (general practitioner, endocrinologist, surgeon, speech
therapist, psychologist, dermatologist, someone close) tick a starting set of sections that
you remain free to change.

**A password** can protect the door, in every case.

What holds it together:

- **the journal is not shareable.** It is not in the catalogue, and nothing can put it there:
  it is not a box unticked by default, it is a box that does not exist;
- **a visit writes nothing.** Every sharing route is a read, and no session is opened in the
  name of the visited account;
- **content you cannot see is indistinguishable from content that does not exist.** Unknown
  token, unpublished profile, unticked section, expired link: one answer, 404;
- **no visitor is identified.** You see how many times your address was opened and when it
  was last opened. No IP address, no fingerprint, no history.

## Privacy

These are not intentions, they are decisions written into the code.

- **Everything is private by default.** No section is published without an explicit action.
- **No IP address is ever kept**, anywhere. Counters are aggregated. The login throttle
  records the identifier that was typed, never an address.
- **Uploaded files live outside the public folder**, under random names that never reuse the
  original filename, **encrypted at rest with AES-256** using a key derived from the
  application key. They are served only by a controller that checks ownership on every read.
- **No trackers, no third-party resources** beyond a webfont.
- **You can take everything with you and erase everything**: full JSON export, archive with
  the files, printable sheet over the period of your choice, and permanent account deletion.

## Languages and appearance

Seven languages: **French, English, Spanish, German, Portuguese, Italian, Japanese**. No text
is hard-coded.

Dark theme by default, light theme, or the system one. The choice is applied server-side: the
page is already the right colour at the first byte, without flashing.

On a phone held upright, navigation moves to the bottom of the screen, with an add button in
the middle that opens the chosen section's form directly.

---

## Installation

### Requirements

- **PHP 8.2 or later**, with `mbstring`, `openssl`, `fileinfo`, and `pdo_sqlite` and/or
  `pdo_mysql`
- **Composer**
- A web server pointing at the **`public/`** folder
- PHP's `zip` extension is recommended (backups)

### With SSH access

```bash
cd /path/to/the/site

composer install --no-dev --optimize-autoloader

cp .env.example .env
php artisan key:generate

chmod -R 775 storage bootstrap/cache database

php artisan mytransition:install
```

### Without SSH access

On your own machine, in the project folder:

```bash
composer install --no-dev --optimize-autoloader
```

Then upload the whole project, **including the `vendor/` folder**, and rename `.env.example`
to `.env` on the server.

> **Careful:** many FTP clients hide files starting with a dot. Turn on their display,
> otherwise `.env.example` and the `.htaccess` files will not be uploaded.

Finally open **`/install`** in your browser.

### The installer

Three screens: the site (language and name), the database (SQLite or MySQL — the connection
is tested before moving on), your administrator account.

Nothing is written before the last screen is confirmed: an interrupted installation leaves
neither a `.env` pointing nowhere nor a half-built database.

On first login, a second wizard sets up mail delivery, registrations, sharing and your
profile.

---

## Common problems

<details>
<summary><strong>A blank page, or "500", right after uploading</strong></summary>

Dependencies are not installed. Run `composer install --no-dev` on the server, or upload the
`vendor/` folder from your machine.

If you open the site before that step, a page reminds you what to do rather than leaving you
in front of an error.
</details>

<details>
<summary><strong>"The stream or file could not be opened"</strong></summary>

Write permissions. Three folders must be writable by the web server:

```bash
chmod -R 775 storage bootstrap/cache database
```
</details>

<details>
<summary><strong>Mail is not going out</strong></summary>

In the vast majority of cases, **the sender address**. It must belong to a domain your host
actually hosts — that is the address it checks. A sender it does not recognise is refused
*without any connection error appearing*.

The test button tells you which transport the message went through. If it says `log`, nothing
was sent: the message was written to `storage/logs/laravel.log`. Choose "server mailer" or
"SMTP".

On most shared hosting, "server mailer" is enough. Over SMTP, the usual settings are port
`587` with `tls`, or `465` with `ssl`.
</details>

<details>
<summary><strong>A file upload fails without a clear message</strong></summary>

The size is set in the administration, but **three ceilings** decide: that setting,
`upload_max_filesize` and `post_max_size` — and the smallest one applies. The administration
screen shows all three and says which one wins.

A file too large for PHP is truncated *before* reaching the code, and the form then complains
about a missing file for a file you did choose.
</details>

<details>
<summary><strong>A change does not show up after an update</strong></summary>

Compiled views. After any update:

```bash
php artisan view:clear
php artisan optimize:clear
```
</details>

<details>
<summary><strong>Migrations: what to do</strong></summary>

Updates sometimes ship new files in `database/migrations/`.

```bash
php artisan migrate --force
```

The schema state lives in the `migrations` table and nowhere else. No existing migration is
ever modified: changes always arrive as one more file.
</details>

---

## Documentation

The `docs/` folder explains design decisions, not just usage. It is written in French.

| File | Subject |
|---|---|
| `CONFIGURATION.md` | Settings, mail delivery, attachments |
| `MIGRATIONS.md` | Evolving the database |
| `AUTHENTIFICATION.md` | Accounts, sessions, login throttling |
| `SUIVI.md` | Dashboard, hormone pathway, blood work |
| `ORGANISATION.md` | Care pathway, expenses, documents |
| `PARTAGE.md` | Public profile, one-off shares |
| `MOBILE.md` | Phone navigation |

---

## Contributing

Bug reports, suggestions and translations are welcome.

For a translation: files live in `lang/<code>/`, with French as the reference. A missing key
silently falls back to French rather than displaying its identifier.

---

## Licence

**GNU Affero General Public License, version 3 or later.**

You may use, study, modify and redistribute this software. If you offer a modified version to
others **over a network**, you must offer them its source code. See [`LICENSE`](LICENSE).
