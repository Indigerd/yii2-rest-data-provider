<?php

namespace indigerd\restdataprovider\auth;

class OAuth2 implements AuthInterface
{

    protected $auth;

    public function __construct($auth)
    {
        if (empty($auth)) {
            throw new AuthException('Access token cannot be empty');
        }
        $this->auth = $auth;
    }

    public function getQueryParams()
    {
        return ['access_token' => $this->auth];
    }

    public function getHttpHeaders()
    {
        return ['Authorization' => 'Bearer ' . $this->auth];
    }
}
