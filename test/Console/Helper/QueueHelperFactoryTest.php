<?php

/**
 * Aist Queue (http://mateuszsitek.com/projects/queue)
 *
 * @copyright Copyright (c) 2017 DIGITAL WOLVES LTD (http://digitalwolves.ltd) All rights reserved.
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 */

namespace Test\Aist\Queue\Console\Helper;

use Aist\Queue\Console\Helper\QueueHelper;
use Aist\Queue\Console\Helper\QueueHelperFactory;
use Interop\Container\ContainerInterface;
use PHPUnit\Framework\TestCase;
use Prophecy\Prophecy\ProphecyInterface;
use SlmQueue\Queue\QueuePluginManager;

class QueueHelperFactoryTest extends TestCase
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

        $queuePluginManager = $this->prophesize(QueuePluginManager::class);
        $this->container->get(QueuePluginManager::class)->willReturn($queuePluginManager);
    }

    public function testCallingFactoryReturnsHelperInstance()
    {
        $factory = new QueueHelperFactory();
        $this->assertInstanceOf(QueueHelperFactory::class, $factory);

        $class = $factory($this->container->reveal());

        $this->assertInstanceOf(QueueHelper::class, $class);
    }
}
