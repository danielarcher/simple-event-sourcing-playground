<?php

namespace Acme\Ui\Console;

use Acme\Application\CreateUserCommand;
use Shared\SimpleCommandBus;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class CreateUserConsoleCommand
 * @package Acme\Ui\Console
 */
class CreateUserConsoleCommand extends Command
{
    /**
     * @var string
     */
    protected static $defaultName = 'app:create-user';

    /**
     * @var SimpleCommandBus
     */
    private $commandBus;

    /**
     * CreateUserConsoleCommand constructor.
     * @param SimpleCommandBus $commandBus
     */
    public function __construct(SimpleCommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
        parent::__construct();
    }

    /**
     * Console configuration
     */
    protected function configure()
    {
        $this->addArgument('name', InputArgument::REQUIRED, 'The username of the user.');
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     * @return int|void|null
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->commandBus->handle(
            new CreateUserCommand($input->getArgument('name'))
        );

        $output->writeln('User successfully generated!');
    }

}