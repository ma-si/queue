<?php

/**
 * Aist Queue (http://mateuszsitek.com/projects/queue)
 *
 * @copyright Copyright (c) 2017 DIGITAL WOLVES LTD (http://digitalwolves.ltd) All rights reserved.
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 */

namespace Test\Aist\Queue\Console\Helper;

use Aist\Queue\Console\Helper\WorkerHelper;
use Aist\Queue\Console\Helper\WorkerHelperFactory;
use Interop\Container\ContainerInterface;
use PHPUnit\Framework\TestCase;
use Prophecy\Prophecy\ProphecyInterface;
use SlmQueue\Worker\WorkerInterface;
use SlmQueueDoctrine\Worker\DoctrineWorker;

class WorkerHelperFactoryTest extends TestCase
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

        $worker = $this->prophesize(WorkerInterface::class);
        $this->container->get(DoctrineWorker::class)->willReturn($worker);
    }

    public function testCallingFactoryReturnsHelperInstance()
    {
        $factory = new WorkerHelperFactory();
        $this->assertInstanceOf(WorkerHelperFactory::class, $factory);

        $class = $factory($this->container->reveal());

        $this->assertInstanceOf(WorkerHelper::class, $class);
    }
}
