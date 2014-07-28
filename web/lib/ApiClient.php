<?php

class ApiClient {
    protected $client;

    public function __construct(GuzzleHttp\Client $client) {
        $this->client = $client;
    }

    public function getEventList() {
        // todo make this URL configurable
        $response = $this->client->get("http://localhost:8880/events");
        return $response->json();
    }

}
