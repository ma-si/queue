<?php

/**
 * Aist Queue (http://mateuszsitek.com/projects/queue)
 *
 * @copyright Copyright (c) 2017 DIGITAL WOLVES LTD (http://digitalwolves.ltd) All rights reserved.
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 */

namespace Aist\Queue\Console\Helper;

use SlmQueue\Queue\QueuePluginManager;
use Symfony\Component\Console\Helper\Helper;

/**
 * {@inheritdoc}
 */
class QueueHelper extends Helper
{
    const NAME = 'queueManager';

    /** @var QueuePluginManager */
    protected $queuePluginManager;

    /**
     * @param QueuePluginManager $queuePluginManager
     */
    public function __construct(QueuePluginManager $queuePluginManager)
    {
        $this->queuePluginManager = $queuePluginManager;
    }

    /**
     * @param $method
     * @param $args
     *
     * @return mixed
     */
    public function __call($method, $args)
    {
        return call_user_func_array([$this->queuePluginManager, $method], $args);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return self::NAME;
    }
}
