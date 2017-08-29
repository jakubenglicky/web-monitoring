<?php
namespace jakubenglicky\WebMonitoring\Commands;

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
		$file = file_get_contents(__DIR__ . '/../../../monitors/pavel_vana_cz.neon');
		$data = Neon::decode($file);

		foreach($data as $name => $values) {
			$output->writeln($name);
			$output->writeln($values['url']);
		}
	}

}