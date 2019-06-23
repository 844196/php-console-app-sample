<?php declare(strict_types= 1);

namespace App\Command;

use Noodlehaus\Config;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class HelloCommand extends Command
{
    /**
     * @var Config
     */
    private $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->setName('hello')->setDescription('Say hello');
    }

    protected function execute(InputInterface $input, OutputInterface $output): void
    {
        $output->writeln($this->config->get('defaultMessage'));
    }
}
