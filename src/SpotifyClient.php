<?php

namespace yiiauth\spotify;

use yii\authclient\OAuth2;

/**
 * Spotify allows authentication via Spotify OAuth.
 *
 * In order to use Spotify OAuth you must register your application at <https://beta.developer.spotify.com/dashboard>.
 *
 * Example application configuration:
 *
 * ```php
 * 'components' => [
 *     'authClientCollection' => [
 *         'class' => \yii\authclient\Collection:class,
 *         'clients' => [
 *             'spotify' => [
 *                 'class' => \yiiauth\spotify\SpotifyClient:class,
 *                 'clientId' => 'client_id',
 *                 'clientSecret' => 'client_secret',
 *             ],
 *
 *         ],
 *     ]
 *     // ...
 * ]
 * ```
 *
 * @see    https://beta.developer.spotify.com/documentation/general/guides/authorization-guide/
 *
 * @author Dmitriy Kuts <me@exileed.com>
 * @since  1.0
 */
class SpotifyClient extends OAuth2
{
    /**
     * @inheritdoc
     */
    public $authUrl = 'https://accounts.spotify.com/authorize';
    /**
     * @inheritdoc
     */
    public $tokenUrl = 'https://accounts.spotify.com/api/token';
    /**
     * @inheritdoc
     */
    public $apiBaseUrl = 'https://api.spotify.com/v1';
    /**
     * @inheritdoc
     */
    public $scope = 'user-read-email';

    /**
     * @var array list of attribute names, which should be requested from API to initialize user attributes.
     */
    public $attributeNames = [
        'id',
        'display_name',
        'email',
    ];

    /**
     * @inheritdoc
     */
    protected function initUserAttributes()
    {
        return $this->api('me', 'GET', [
            'fields' => implode(',', $this->attributeNames),
        ]);
    }

    /**
     * @inheritdoc
     */
    protected function defaultNormalizeUserAttributeMap()
    {
        return [
            'name' => 'display_name',
        ];
    }

    /**
     * @inheritdoc
     */
    protected function defaultName()
    {
        return 'spotify';
    }

    /**
     * @inheritdoc
     */
    protected function defaultTitle()
    {
        return 'Spotify';
    }
}