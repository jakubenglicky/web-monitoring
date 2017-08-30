<?php
namespace jakubenglicky\WebMonitoring\Commands;

use jakubenglicky\WebMonitoring\Controls\Errors;
use jakubenglicky\WebMonitoring\Controls\Monitors;
use jakubenglicky\WebMonitoring\Controls\Tasks;
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
        $tasks = new Tasks();
        $errors = new Errors();


		$data = $monitors->getMonitors();

		foreach ($data as $name => $values) {

		    if ($values['test'] == 'code') {
		        if (!$tasks->checkStatusCode($values['url'],$values['result'])) {
                    $output->writeln('Error');
                    $errors->logError($name, $values['test'], $values['url'], $values['result'], 'aa');
                } else {
                    $output->writeln('Test URL: ' . $values['url'] . ' code (' .  $values['result']. ')');
                }

            }
		}

	}

}