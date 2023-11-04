<?php

namespace Nyamort\DockerClient\Command;

abstract class AbstractCommand
{
    protected \GuzzleHttp\Client $httpClient;

    public function __construct(
        protected readonly \Nyamort\DockerClient\DockerConfiguration $dockerConfiguration
    )
    {
        $this->httpClient = new \GuzzleHttp\Client([
            'base_uri' => 'http://localhost',
            'timeout' => 2.0,
            'verify' => false,
            'curl' => [
                CURLOPT_UNIX_SOCKET_PATH => $this->dockerConfiguration->getSocketPath(),
            ],
            'headers' => [
                'Content-Type' => 'application/json',
            ]
        ]);
    }

    abstract public function execute(array $parameters = []): mixed;
}
