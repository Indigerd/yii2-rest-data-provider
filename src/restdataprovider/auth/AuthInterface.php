<?php

namespace indigerd\restdataprovider\auth;

interface AuthInterface
{
    public function __construct($auth);

    public function getQueryParams();

    public function getHttpHeaders();
}
