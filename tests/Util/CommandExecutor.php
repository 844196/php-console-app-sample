<?php declare(strict_types = 1);

namespace Test\Util;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CommandExecutor
{
    /**
     * @var Command
     */
    private $subject;

    public function __construct(Command $subject)
    {
        $this->subject = $subject;
    }

    public function execute(InputInterface $input, OutputInterface $output): ?int
    {
        return \Closure::bind(function () use ($input, $output) {
            return $this->execute($input, $output);
        }, $this->subject, get_class($this->subject))->__invoke();
    }

    public static function exec(Command $subject, InputInterface $input, OutputInterface $output): ?int
    {
        return (new self($subject))->execute($input, $output);
    }
}
