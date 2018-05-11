# yiiauth/spotify

This extension adds GitLab OAuth2 supporting for [yii2-authclient](https://github.com/yiisoft/yii2-authclient).

[![Latest Stable Version](https://poser.pugx.org/yiiauth/spotify/v/stable)](https://packagist.org/packages/yiiauth/spotify)
[![Total Downloads](https://poser.pugx.org/yiiauth/spotify/downloads)](https://packagist.org/packages/yiiauth/spotify)
[![Monthly Downloads](https://poser.pugx.org/yiiauth/spotify/d/monthly)](https://packagist.org/packages/yiiauth/spotify)
[![License](https://poser.pugx.org/yiiauth/spotify/license)](https://packagist.org/packages/yiiauth/spotify)

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require yiiauth/spotify
```

or add

```json
"yiiauth/spotify": "~0.1"
```

to the `require` section of your composer.json.

## Usage

You must read the yii2-authclient [docs](https://github.com/yiisoft/yii2/blob/master/docs/guide/security-auth-clients.md)

Register your application [in Spotify](https://beta.developer.spotify.com/dashboard)

and add the Spotify client to your auth clients.

```php
'components' => [
    'authClientCollection' => [
        'class' => \yii\authclient\Collection::class,
        'clients' => [
               'spotify' => [
                   'class' => \yiiauth\spotify\SpotifyClient:class,
                   'clientId' => 'client_id',
                   'clientSecret' => 'client_secret',
               ],
            // other clients
        ],
    ],
    // ...
 ]
 ```