<?php

namespace Asaas\Api;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\MultipartStream;

abstract class AsaasClient {
    protected $httpClient;
    protected $apiKey;

    public function __construct($apiKey, $baseUri = 'https://sandbox.asaas.com/api/') 
    {
        $this->apiKey = $apiKey;
        $this->httpClient = new Client([
            'base_uri' => $baseUri,
            'headers' => [
                'Accept' => 'application/json',
                'access_token' => $apiKey
            ]
        ]);
    }

    protected function get($uri, array $queryParams = []) 
    {
        try {
            $response = $this->httpClient->get($uri, [
                'query' => $queryParams
            ]);
            return json_decode($response->getBody(), true);
        } catch (GuzzleException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    protected function post($uri, array $data) 
    {
        try {
            $response = $this->httpClient->post($uri, ['json' => $data]);
            return json_decode($response->getBody(), true);
        } catch (GuzzleException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    protected function put($uri, array $data) 
    {
        try {
            $response = $this->httpClient->put($uri, ['json' => $data]);
            return json_decode($response->getBody(), true);
        } catch (GuzzleException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    protected function delete($uri, array $data = []) 
    {
        try {
            $response = $this->httpClient->delete($uri, ['json' => $data]);
            return json_decode($response->getBody(), true);
        } catch (GuzzleException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    protected function postMultipart($uri, array $multipartData) 
    {
        try {
            // Create a multipart stream
            $multipart = [];
            foreach ($multipartData as $name => $data) {
                $multipart[] = ['name' => $name, 'contents' => fopen($data['file'], 'r'), 'filename' => $data['filename']];
            }

            // Make the request
            $response = $this->httpClient->request('POST', $uri, [
                'multipart' => $multipart,
                'headers' => [
                    'Content-Type' => 'multipart/form-data'
                ]
            ]);
            return json_decode($response->getBody(), true);
        } catch (GuzzleException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    protected function putMultipart($uri, array $data) 
    {
        try {
            $response = $this->httpClient->request('PUT', $uri, [
                'multipart' => $data
            ]);
            return json_decode($response->getBody(), true);
        } catch (GuzzleException $e) {
            return ['error' => $e->getMessage()];
        }
    }

}

