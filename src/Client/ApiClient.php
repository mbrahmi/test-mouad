<?php

namespace App\Client;

class ApiClient
{
    public function __construct(private ApiAuthenticator $apiAuthenticator)
    {
        $this->apiAuthenticator->getSession();
    }

    public function getFilmList()
    {
    }
}
