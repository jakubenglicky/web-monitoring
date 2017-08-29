<?php
namespace jakubenglicky\WebMonitoring\Commands;

use jakubenglicky\WebMonitoring\Controls\Monitors;
use Nette\Neon\Neon;
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
		$monitors = new Monitors();

		$data = $monitors->getMonitors();

		foreach ($data as $name => $values) {
			$output->writeln($name);
			$output->writeln(print_r($values));
		}

	}

}