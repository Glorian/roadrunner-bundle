<?php

declare(strict_types=1);

namespace Baldinof\RoadRunnerBundle\Worker;

use Spiral\RoadRunner\GRPC\ServiceInterface;
use Symfony\Contracts\Service\ResetInterface;

final class GrpcResetWorkerFinalizer implements WorkerFinalizerInterface
{
    /**
     * @var list<ServiceInterface>
     */
    private array $registeredServices = [];

    public function __invoke(): void
    {
        foreach ($this->registeredServices as $service) {
            if ($service instanceof ResetInterface) {
                $service->reset();
            }
        }
    }

    /**
     * @param list<ServiceInterface>  $services
     */
    public function setRegisteredServices(array $services): void
    {
        $this->registeredServices = $services;
    }
}
