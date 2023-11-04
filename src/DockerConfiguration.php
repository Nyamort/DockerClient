<?php

namespace Nyamort\DockerClient;

class DockerConfiguration
{
    protected DockerConfiguration $dockerConfiguration;

    public function __construct(string $socketPath = 'unix:///var/run/docker.sock')
    {
        $this->dockerConfiguration = new DockerConfiguration($socketPath);
    }

    public function getSocketPath(): string
    {
        return $this->dockerConfiguration->getSocketPath();
    }
}
