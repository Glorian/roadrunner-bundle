<?php

declare(strict_types=1);

namespace Baldinof\RoadRunnerBundle\Worker;

use Spiral\RoadRunner\GRPC\ServiceInterface;

interface WorkerFinalizerInterface
{
    public function __invoke(): void;

    /**
     * @param list<ServiceInterface>  $services
     */
    public function setRegisteredServices(array $services): void;
}
