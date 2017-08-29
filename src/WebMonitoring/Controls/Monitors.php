<?php

namespace jakubenglicky\WebMonitoring\Controls;


use Nette\Neon\Neon;

class Monitors
{
	const folder = __DIR__ . '/../../../monitors/';

	public function mergeMonitorsFiles()
	{
		$files = scandir(self::folder);

		$result = NULL;
		foreach($files as $file) {

			if (!in_array($file,array(".","..")))
			{
				$result .= file_get_contents(self::folder . $file);
				$result .= PHP_EOL;
			}
		}

		return $result;
	}

	public function getMonitors()
	{
		return Neon::decode($this->mergeMonitorsFiles());
	}


}