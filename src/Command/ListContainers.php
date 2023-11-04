<?php

namespace Nyamort\DockerClient\Command;

class ListContainers extends AbstractCommand
{

    /**
     * @param array $parameters
     * @return \Nyamort\DockerClient\Model\Container[]
     * @throws \Nyamort\DockerClient\Exception\DockerClientException
     */
    public function execute(array $parameters = []): array
    {
        $query = [];
        if($parameters['all'] === true) {
            $query['all'] = true;
        }
        try {
            $response = $this->httpClient->get($this->getEndpoint(), [
                'query' => $query,
            ]);
            $responseBody = $response->getBody()->getContents();
            $containers = json_decode($responseBody, true);
            return $this->hydrateCollection($containers);
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            throw new \Nyamort\DockerClient\Exception\DockerClientException($e->getMessage());
        }
    }

    protected function getEndpoint(): string
    {
        return '/containers/json';
    }

    /**
     * @param array $data
     * @return \Nyamort\DockerClient\Model\Container
     */
    protected function hydrate(array $data): \Nyamort\DockerClient\Model\Container
    {
        $container = new \Nyamort\DockerClient\Model\Container();
        try {
            $container->setId($data['Id'])
                ->setImageId($data['ImageID'])
                ->setNames($data['Names'])
                ->setCommand($data['Command'])
                ->setCreated(new \DateTimeImmutable($data['Created']))
                ->setStatus($data['Status'])
                ->setPorts($data['Ports'])
                ->setLabels($data['Labels']);
            return $container;
        } catch (\Exception $e) {
            throw new \Nyamort\DockerClient\Exception\DockerClientException($e->getMessage());
        }

    }

    /**
     * @param array $data
     * @return \Nyamort\DockerClient\Model\Container[]
     */
    protected function hydrateCollection(array $data): array
    {
        $containers = [];
        foreach ($data as $datum) {
            $containers[] = $this->hydrate($datum);
        }
        return $containers;
    }


}
