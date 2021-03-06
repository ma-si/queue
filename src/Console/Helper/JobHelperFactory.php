<?php

/**
 * Aist Queue (http://mateuszsitek.com/projects/queue)
 *
 * @copyright Copyright (c) 2017 DIGITAL WOLVES LTD (http://digitalwolves.ltd) All rights reserved.
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 */

namespace Aist\Queue\Console\Helper;

use Interop\Container\ContainerInterface;
use SlmQueue\Job\JobPluginManager;

/**
 * Factory for JobHelper
 */
class JobHelperFactory
{
    /**
     * @param ContainerInterface $container
     *
     * @return JobHelper
     */
    public function __invoke(ContainerInterface $container)
    {
        return new JobHelper($container->get(JobPluginManager::class));
    }
}
