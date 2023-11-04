<?php

namespace Nyamort\DockerClient;

class DockerClient
{
    private string $socketPath;

    public function __construct(string $socketPath = 'unix:///var/run/docker.sock')
    {
        $this->socketPath = $socketPath;
    }


}