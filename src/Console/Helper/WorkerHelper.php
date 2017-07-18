<?php

/**
 * Aist Queue (http://mateuszsitek.com/projects/queue)
 *
 * @copyright Copyright (c) 2017 DIGITAL WOLVES LTD (http://digitalwolves.ltd) All rights reserved.
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 */

namespace Aist\Queue\Console\Helper;

use SlmQueue\Worker\WorkerInterface;
use Symfony\Component\Console\Helper\Helper;

/**
 * {@inheritdoc}
 */
class WorkerHelper extends Helper
{
    const NAME = 'workerManager';

    /** @var WorkerInterface */
    protected $worker;

    /**
     * @param WorkerInterface $worker
     */
    public function __construct(WorkerInterface $worker)
    {
        $this->worker = $worker;
    }

    /**
     * @param $method
     * @param $args
     *
     * @return mixed
     */
    public function __call($method, $args)
    {
        return call_user_func_array([$this->worker, $method], $args);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return self::NAME;
    }
}
