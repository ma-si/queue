<?php

/**
 * Aist Queue (http://mateuszsitek.com/projects/queue)
 *
 * @copyright Copyright (c) 2017 DIGITAL WOLVES LTD (http://digitalwolves.ltd) All rights reserved.
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 */

namespace Aist\Queue;

use Aist\Queue\Console\Helper\JobHelper;
use Aist\Queue\Console\Helper\JobHelperFactory;
use Aist\Queue\Console\Helper\QueueHelper;
use Aist\Queue\Console\Helper\QueueHelperFactory;
use Aist\Queue\Console\Helper\WorkerHelper;
use Aist\Queue\Console\Helper\WorkerHelperFactory;

/**
 * ConfigProvider for Aist Queue
 */
class ConfigProvider
{
    /**
     * Returns the configuration array
     *
     * To add a bit of a structure, each section is defined in a separate
     * method which returns an array with its configuration.
     *
     * @return array
     */
    public function __invoke()
    {
        return [
            'dependencies' => $this->getDependencies(),
            'slm_queue' => $this->getSlmQueue(),
            'console' => [
                'commands' => $this->getCommands(),
                'helpers' => $this->getHelpers(),
            ],
        ];
    }

    /**
     * Returns the container dependencies
     *
     * @return array
     */
    public function getDependencies()
    {
        return [
            'invokables' => [
            ],
            'factories'  => [
                QueueHelper::class => QueueHelperFactory::class,
                JobHelper::class => JobHelperFactory::class,
                WorkerHelper::class => WorkerHelperFactory::class,
            ],
        ];
    }

    /**
     * Returns the queue dependencies
     *
     * @return array
     */
    public function getSlmQueue()
    {
        return [
            'queue_manager' => [
                'factories' => [
                ],
            ],
            'queues' => [
            ],
            'job_manager' => [
                'factories' => [
                ],
            ],
        ];
    }

    /**
     * Returns the commands array
     *
     * @return array
     */
    public function getCommands()
    {
        return [
            Console\Command\StartQueueWorkerCommand::class,
        ];
    }

    /**
     * Returns the helpers array
     *
     * @return array
     */
    public function getHelpers()
    {
        return [
            'qm' => \Aist\Queue\Console\Helper\QueueHelper::class,
            'queueJobHelper' => \Aist\Queue\Console\Helper\JobHelper::class,
            'worker' => \Aist\Queue\Console\Helper\WorkerHelper::class,
        ];
    }
}
