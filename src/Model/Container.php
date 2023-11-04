<?php

namespace Nyamort\DockerClient\Model;

class Container
{
    private string $id;

    private string $imageId;

    private array $names;

    private string $command;

    private \DateTimeInterface $created;

    private string $status;

    /**
     * @var Port[]
     */
    private array $ports = [];

    private string $labels;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): Container
    {
        $this->id = $id;
        return $this;
    }

    public function getImageId(): string
    {
        return $this->imageId;
    }

    public function setImageId(string $imageId): Container
    {
        $this->imageId = $imageId;
        return $this;
    }

    public function getNames(): array
    {
        return $this->names;
    }

    public function setNames(array $names): Container
    {
        $this->names = $names;
        return $this;
    }

    public function getCommand(): string
    {
        return $this->command;
    }

    public function setCommand(string $command): Container
    {
        $this->command = $command;
        return $this;
    }

    public function getCreated(): \DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(\DateTimeInterface $created): Container
    {
        $this->created = $created;
        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): Container
    {
        $this->status = $status;
        return $this;
    }

    public function getPorts(): array
    {
        return $this->ports;
    }

    public function setPorts(array $ports): Container
    {
        $this->ports = $ports;
        return $this;
    }

    public function getLabels(): string
    {
        return $this->labels;
    }

    public function setLabels(string $labels): Container
    {
        $this->labels = $labels;
        return $this;
    }

}
