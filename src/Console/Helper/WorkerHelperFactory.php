<?php

/**
 * Aist Queue (http://mateuszsitek.com/projects/queue)
 *
 * @copyright Copyright (c) 2017 DIGITAL WOLVES LTD (http://digitalwolves.ltd) All rights reserved.
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 */

namespace Aist\Queue\Console\Helper;

use Interop\Container\ContainerInterface;

/**
 * Factory for WorkerHelper
 */
class WorkerHelperFactory
{
    /**
     * @param ContainerInterface $container
     *
     * @return WorkerHelper
     */
    public function __invoke(ContainerInterface $container)
    {
        return new WorkerHelper($container->get(\SlmQueueDoctrine\Worker\DoctrineWorker::class));
    }
}
