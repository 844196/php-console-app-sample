<?php declare(strict_types = 1);

namespace App\Command;

use Mockery as M;
use Noodlehaus\Config;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Test\Util\CommandExecutor;

class HelloCommandTest extends TestCase
{
    public function testExecute(): void
    {
        $config = M::mock(Config::class)->shouldReceive('get')
            ->once()
            ->with('defaultMessage')
            ->andReturn($expected = 'default message')
            ->getMock();

        $input = M::mock(InputInterface::class);
        $output = M::mock(OutputInterface::class)->shouldReceive('writeln')
            ->once()
            ->with($expected)
            ->getMock();

        $subject = new HelloCommand($config);

        $this->assertNull(CommandExecutor::exec($subject, $input, $output));
    }
}
