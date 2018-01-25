# Laravel HTTPS redirection
Ce package a pour but de rediriger vos requêtes HTTP vers de l'HTTPS très simplement.

## Installation

*NB: Ce package n'a pas été testé en dessous de Laravel 5.5*


Tout d'abord, utiliser la fonction ci-dessous:

```
composer require winxaito/laravel-https
```

Si vous n'utiliez pas l'auto-discovery, ajouter ce ServiceProvider aux tableaux
de providers dans `config/app.php`

```php
WinXaito\LaravelHttpsRedirect\LaravelHttpsServiceProvider::class,
```

Si vous souhaitez travailler avec les configurations sans passer par un fichier 
d'environnement, exécuter la commande suivante et modifier ensuite le fichier 
`config/https-redirection.php`

```php
php artisan vendor:publish --provider="WinXaito\LaravelHttpsRedirect\LaravelHttpsServiceProvider"
```

## Comment utiliser ce package ?

Ce package fonctionne avec les variables d'environnement dans un ordre de priorités.

Liste des constantes par ordre de priorités:

- HTTPS_FORCE: Si cette valeur est vrai, alors dans tous les cas les requêtes seront redirigé en HTTPS, sinon on passe à la constante suivante:
- HTTPS_PROHIBIT: Si cette constante est vrai, les requêtes ne seront pas redirigé, si elle est fausse, alors on passe à la constante suivante:
- APP_ENV: Si cette constante vaut "production", alors on redirige en HTTPS, sinon on passe à la constante suivante:
- APP_DEBUG: Si l'application n'est pas en mode debug, on redirige en HTTPS, sauf si HTTPS_PROHIBIT est vrai. Si l'application est en mode debug alors l'adresse ne sera pas redirigé.

Par défaut si aucune variable d'environnement est défini nous avons les valeurs suivantes:

- `HTTPS_FORCE=false`
- `HTTPS_PROHIBIT=false`
- `APP_ENV=production`
- `APP_DEBUG=false`

Donc par défaut la redirection est activé.

## License

La license est GNU GPL3, par conséquent en cas d'utilisation de ce vous devez 
respecter les indications de la license. Pour les logiciels propriétaires qui 
aimerait utiliser cette bibliothèque sans rendre leur code source disponible, 
merci de me contacter.
