<?php

/**
 * Aist Queue (http://mateuszsitek.com/projects/queue)
 *
 * @copyright Copyright (c) 2017 DIGITAL WOLVES LTD (http://digitalwolves.ltd) All rights reserved.
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 */

namespace Test\Aist\Queue\Console\Helper;

use Aist\Queue\Console\Helper\JobHelper;
use Aist\Queue\Console\Helper\JobHelperFactory;
use Interop\Container\ContainerInterface;
use PHPUnit\Framework\TestCase;
use Prophecy\Prophecy\ProphecyInterface;
use SlmQueue\Job\JobPluginManager;

class JobHelperFactoryTest extends TestCase
{
    /**
     * @var ContainerInterface|ProphecyInterface
     */
    private $container;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        $this->container = $this->prophesize(ContainerInterface::class);

        $jobPluginManager = $this->prophesize(JobPluginManager::class);
        $this->container->get(JobPluginManager::class)->willReturn($jobPluginManager);
    }

    public function testCallingFactoryReturnsHelperInstance()
    {
        $factory = new JobHelperFactory();
        $this->assertInstanceOf(JobHelperFactory::class, $factory);

        $class = $factory($this->container->reveal());

        $this->assertInstanceOf(JobHelper::class, $class);
    }
}
