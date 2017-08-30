<?php

namespace jakubenglicky\WebMonitoring\Controls;


class Errors
{
    public function sendMail($to, $subject, $text)
    {
        $headers = 'From: Web Monitoring <monitor@englicky.net>' . "\r\n" .
            'Reply-To: noreply@englicky.net' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        mail($to,$subject,$text, $headers);
    }

    public function logError($failedTest, $test,$url, $result,$res)
    {
        $date = new \DateTime();
        $msg = 'Date: ' . $date->format('d. m. Y H:i') . PHP_EOL;
        $msg .= 'URL: ' . $url . PHP_EOL;
        $msg .= 'Type of test: ' . $test . PHP_EOL . PHP_EOL;

        if ($test == 'code') {
            $sub = 'Test status code (' . $result . ') failed: ' . $failedTest;
            $msg .= 'There was an error. Unexpected code ' . $res . ', expected code ' . $result . '.';
        }

        $to = 'jakubenglicky@gmail.com';

        $this->sendMail($to,$sub,$msg);
    }
}