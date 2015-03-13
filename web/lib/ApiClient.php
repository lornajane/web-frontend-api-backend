<?php

// start fetch events
class ApiClient {
    
    protected $client;
    private $apiUrl;

    public function __construct(GuzzleHttp\Client $client, $apiUrl) {
        $this->client = $client;
        $this->apiUrl = $apiUrl;
    }
    
    public function getEventList() {
        // todo make this URL configurable
        $response = $this->client->get(
           $this->apiUrl . "events");
        return $response->json();
    }
// end fetch events

    public function getEvent($id) {
        // todo make this URL configurable
        $response = $this->client->get($this->apiUrl ."events/" . $id);
        return $response->json();
    }

    public function getAccessToken($username, $password) {
        $request = $this->client->createRequest("POST", $this->apiUrl. "authorizations");
        $request->setHeader("Content-Type", "application/json");
        $request->setBody(\GuzzleHttp\Stream\Stream::factory(
            json_encode(array("username" => $username, 
                "password" => $password))));
        $response = $this->client->send($request);

        // check status codes, response format, etc
        $data = $response->json();
        return $data['access_token'];
    }

}
