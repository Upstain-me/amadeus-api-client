<?php

namespace Upstain\AmadeusApiClient;

class Amadeus
{
    public function configure(Configuration $configuration): Client
    {
        $client = new Client();
        $client->setConfiguration($configuration);
        return $client;
    }
}
