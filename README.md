# react-php-template

⚠️ **Ce projet est destiné aux développeurs débutants qui souhaitent démarrer rapidement un projet React avec une API en PHP.**

## Sommaire 📑
- [Introduction 🚪](#introduction-)
- [Fonctionnalités 📋](#fonctionnalités-)
- [Installation 📥](#installation-)
- [Paramétrage ⚙️](#paramétrage-)
  - [Client](#client)
  - [API](#api)
- [Créer des endpoints et générer des réponses 📡](#créer-des-endpoints-et-générer-des-réponses-)
    - [Ajouter un endpoint](#ajouter-un-endpoint)
    - [Générer une réponse](#générer-une-réponse)
    - [Créer un controller](#créer-un-controller)
    - [Intéractions avec la base de données](#intéractions-avec-la-base-de-données)
- [Structure du projet 📁](#structure-du-projet-)
    - [Serveur](#serveur)
    - [Client](#client-1)
- [Auteur(s) 👥](#auteurs-)

## Introduction 🚪
React PHP Template est un template pour créer rapidement la structure d'un projet React avec une API en PHP. Il est livré avec des endpoints d'exemple pour gérer des utilisateurs qui n'ont pas vocations à être utilisés.

## Fonctionnalités 📋
- [x] Création d'endpoints simplifiée
- [x] Génération de réponses
- [x] Intéractions avec la base de données
- [x] Gestion des logs
- [x] Gestion des erreurs
- [] Création de clés API
- [] Interface graphique d'administration

## Installation 📥
1. Cloner le projet
```bash
git clone https://github.com/rvHoney/react-php-template.git
```

2. Installer les dépendances
```bash
npm install
```

3. Créer la base de données
```bash
sqlite3 data/database.db < data/init-db.sql
```

4. Lancer le serveur de développement pour le client
```bash
npm start
```

5. Lancer le serveur PHP pour l'API
```bash
php -S localhost
```

## Paramétrage ⚙️
### Client

1. **Chemin d'accès côté client:**
Pour définir le lien vers l'API, il faut modifier le fichier `src/utils/constants.js`.
```javascript
// src/utils/constants.js
// Exemple avec ma configuration (Wampserver)
export const API_URL = "http://localhost/react-php-template/api";
```
___

### API
1. **Chemin d'accès côté serveur:**
Le chemin pour accèder au site peut varier notamment en développant sur un serveur local comme avec Wamp. Il faut donc modifier le fichier `api/config.php` pour que l'API puisse fonctionner correctement.
```php
// api/config.php
// Exemple avec ma configuration (Wampserver)
define('API_PREFIX', '/react-php-template/api');
```

2. **Base de données:**
Le fichier `api/config.php` contient également les informations de connexion à la base de données. Il faut donc modifier les informations pour que l'API puisse fonctionner correctement.
Par défaut le projet est fait pour fonctionner avec une base de données SQLite3. En fonction du SGBD utilisé, il faudra modifier le fichier `api/Database.php` pour utiliser le bon driver.
```php
// api/config.php 
// Exemple avec ma configuration (SQLite3)
define('DB_PATH', 'data/database.db')
```

3. **Headers:**
Si vous souhaitez changer les headers de l'API, il faut modifier le fichier `api/config.php`. ⚠️ **Attention, par défaut les requêtes sont autorisées depuis n'importe quelle origine.**
```php
// api/config/config.php
// Exemple avec ma configuration
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
```

## Créer des endpoints et générer des réponses 📡
### Ajouter un endpoint
Pour ajouter des endpoints, il faut créer un fichier dans le dossier `api/endpoints` et l'importer dans le fichier `api/index.php`.
```php
// api/endpoints/ping.php
<?php
require_once 'config/config.php';

// GET /ping
// Endpoint pour vérifier le fonctionnement de l'API
if ($requestUri === '/ping' && $requestMethod === 'GET')
{
    ApiResponse::sendResponse(200, 'pong');
}
?>
```
```php
// api/index.php
require_once 'endpoints/ping.php';
```

### Générer une réponse
Pour générer une réponse, il faut utiliser la classe `ApiResponse` et appeler la méthode `sendResponse` en lui passant en paramètre le code de la réponse HTTP et le contenu de la réponse.
```php
// api/endpoints/ping.php
ApiResponse::sendResponse(200, 'Les données que vous voulez envoyer');
```

### Créer un controller
Pour créer un controller, il faut créer un fichier dans le dossier `api/controllers` et l'importer dans le fichier de votre endpoint.

### Intéractions avec la base de données
Pour intéragir avec la base de données il vous faut ajouter un trait à votre base de données. Pour cela rendez-vous dans le fichier `models/traits` puis importez le trait dans le modèle de la base de données (fichier `models/Database.php`).
```php
// models/Database.php
<?php
// ...

require_once 'traits/votreTrait.php';

// Classe permettant de gérer la base de données
class Database
{
    use votreTrait;

    // ...
}
?>
```

## Structure du projet 📁
### Serveur
fin après data
```bash
api
├── config
│   └── config.php
├── controllers
│   └── UsersController.php
├── endpoints
│   ├── ping.php
│   └── users.php
├── index.php
├── models
│   ├── Database.php
│   └── User.php
├── data
│   └── database.db
├── helpers
│   ├── ApiResponse.php
│   └── logs.php
├── models
│   ├── Database.php
│   └── traits
│   └── UsersTrait.php
└── data
    ├── database.db
    ├── init-db.sql
    └── logs.txt
```

### Client
```bash
src
├── components
│   ├── MemberAdd.js
│   ├── MemberCard.js
│   ├── MemberEdit.js
│   ├── MemberList.js
│   ├── MemberSearch.js
├── css
│   ├── index.css
├── pages
│   ├── Home.js
│   ├── Members.js
│   └── NotFound.js
├── utils
│   └── constants.js
└── index.js
```

## Auteur(s) 👥
- [@rvHoney](https://www.github.com/rvHoney)