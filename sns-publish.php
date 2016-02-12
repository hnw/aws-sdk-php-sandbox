<?php

require __DIR__ . '/vendor/autoload.php';

$sns = new Aws\Sns\SnsClient([
    'region'  => 'ap-northeast-1',
    'version' => '2010-03-31'
]);

$topics = $sns->listTopics();

// Publish something to each topic
foreach ($topics['Topics'] as $topic) {
    $rand1 = rand(1, 100);
    $rand2 = rand(1, 100);
    $response = $sns->publish([
        'TopicArn' => $topic['TopicArn'],
        'Message' => "Start: ${rand1}, End: ${rand2}\n",
        'Subject' => "Price Change",
    ]);
}
