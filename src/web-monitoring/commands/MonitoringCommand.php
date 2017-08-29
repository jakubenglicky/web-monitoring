<?php
namespace jakubenglicky\webmonitoring\commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MonitoringCommand extends Command
{
	protected function configure()
	{
		$this->setName('monitoring:check');
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$output->writeln('test command');
	}


}