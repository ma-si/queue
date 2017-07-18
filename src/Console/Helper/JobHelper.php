<?php

/**
 * Aist Queue (http://mateuszsitek.com/projects/queue)
 *
 * @copyright Copyright (c) 2017 DIGITAL WOLVES LTD (http://digitalwolves.ltd) All rights reserved.
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 */

namespace Aist\Queue\Console\Helper;

use SlmQueue\Job\JobPluginManager;
use Symfony\Component\Console\Helper\Helper;

/**
 * {@inheritdoc}
 */
class JobHelper extends Helper
{
    const NAME = 'queueJobHelper';

    /** @var JobPluginManager */
    protected $jobPluginManager;

    /**
     * @param JobPluginManager $jobPluginManager
     */
    public function __construct(JobPluginManager $jobPluginManager)
    {
        $this->jobPluginManager = $jobPluginManager;
    }

    /**
     * @param $method
     * @param $args
     *
     * @return mixed
     */
    public function __call($method, $args)
    {
        return call_user_func_array([$this->jobPluginManager, $method], $args);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return self::NAME;
    }
}
