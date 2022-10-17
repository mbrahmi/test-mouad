<?php

namespace App\Client;

/*
 *
 */

use mysql_xdevapi\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ApiAuthenticator
{
    private const API_BASE_URL = 'https://api.themoviedb.org/3/authentication';
    private const API_KEY = '865a805e946243fa16a121951794066b';

    public function __construct(private HttpClientInterface $httpClient)
    {
    }

    private function createToken()
    {
        $response = $this->httpClient->request(
            Request::METHOD_GET,
            sprintf('%s/token/new?api_key=%s', self::API_BASE_URL, self::API_KEY)
        );

        return $response->request_token;
    }

    private function authenticate(string $token)
    {
        $response = $this->httpClient->request(
            Request::METHOD_GET,
            sprintf('https://www.themoviedb.org/authenticate/%s', $token)
        );
    }

    private function createSession()
    {
        $response = $this->httpClient->request(
            Request::METHOD_GET,
            sprintf('%s/session/new?api_key=%s', self::API_BASE_URL, self::API_KEY)
        );

        if (!$response->success) {
            throw new Exception();
        }

        return $response->session_id;
    }

    public function getSession()
    {
        $token = $this->createToken();

        $this->authenticate($token);

        return $this->createSession();
    }
}
