<?php

namespace Nyamort\DockerClient\Model;

class Port
{
    private int $privatePort;

    private int $publicPort;

    private PortType $type;

    public function getPrivatePort(): int
    {
        return $this->privatePort;
    }

    public function setPrivatePort(int $privatePort): void
    {
        if ($privatePort < 0 || $privatePort > 65535) {
            throw new \InvalidArgumentException('Invalid port number');
        }
        $this->privatePort = $privatePort;
    }

    public function getPublicPort(): int
    {
        return $this->publicPort;
    }

    public function setPublicPort(int $publicPort): void
    {
        if ($publicPort < 0 || $publicPort > 65535) {
            throw new \InvalidArgumentException('Invalid port number');
        }
        $this->publicPort = $publicPort;
    }

    public function getType(): PortType
    {
        return $this->type;
    }

    public function setType(PortType $type): void
    {
        $this->type = $type;
    }


}
