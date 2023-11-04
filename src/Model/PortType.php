<?php

namespace Nyamort\DockerClient\Model;

enum PortType: string
{
    case TCP = 'tcp';
    case UDP = 'udp';
}
