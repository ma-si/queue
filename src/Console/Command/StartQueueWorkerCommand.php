<?php

/**
 * Aist Queue (http://mateuszsitek.com/projects/queue)
 *
 * @copyright Copyright (c) 2017 DIGITAL WOLVES LTD (http://digitalwolves.ltd) All rights reserved.
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 */

namespace Aist\Queue\Console\Command;

use Aist\Queue\Console\Helper\QueueHelper;
use SlmQueue\Controller\Exception\WorkerProcessException;
use SlmQueue\Exception\ExceptionInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Queue Worker
 */
class StartQueueWorkerCommand extends Command
{
    const NAME = 'queue:worker:start';

    const DESCRIPTION = 'Process queue worker.';

    const HELP = <<< 'EOT'
Process queue worker.
EOT;

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName(self::NAME)
            ->setDescription(self::DESCRIPTION)
            ->setHelp(self::HELP)
            ->setDefinition([
                new InputArgument(
                    'name',
                    InputArgument::REQUIRED,
                    'The queue name.'
                ),
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /**
         * Strange issue
         * Without this we can't use $this->getHelper('name')
         * but $this->getApplication()->getHelperSet()->get('name')
         */
        $this->setApplication($this->getApplication());
        $queuePluginManager = $this->getHelper('qm');
        $worker = $this->getHelper('worker');
        $logger = $this->getHelper('logger');

        $this->setProcessTitle('queue.' . $input->getArgument('name'));

        $output->writeln(
            'Processing queue <info>' . $input->getArgument('name') . '</info> PID <info>' . getmypid() . '</info>'
        );

        return $this->executeWorkerCommand($input, $output, $queuePluginManager, $worker, $logger);
    }

    /**
     * Execute worker
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @param QueueHelper $queuePluginManager
     * @param $worker
     *
     * @return int
     */
    protected function executeWorkerCommand(
        InputInterface $input,
        OutputInterface $output,
        QueueHelper $queuePluginManager,
        $worker,
        $logger
    ) {
        $options = $input->getOptions();
        $name    = $input->getArgument('name');
        $queue   = $queuePluginManager->get($name);

        try {
            $messages = $worker->processQueue($queue, $options);
        } catch (ExceptionInterface $e) {
            $logger->error(
                self::class,
                [
                    'queue' => $name,
                    'code' => $e->getCode(),
                    'message' => $e->getMessage(),
                ]
            );
            throw new WorkerProcessException(
                'Caught exception while processing queue ' . $name,
                $e->getCode(),
                $e
            );
        }
        $output->writeln(sprintf('Finished worker for queue <info>%s</info>', $name));
        $output->writeln($messages);

        return 0;
    }
}
