<?php

require __DIR__ . '/vendor/autoload.php';

$sns = new Aws\Sns\SnsClient([
    'region'  => 'ap-northeast-1',
    'version' => '2010-03-31'
]);

// Create some new topics
foreach (['currency_usd', 'currency_jpy', 'currency_brl'] as $topic) {
    $result = $sns->createTopic(['Name' => $topic]);
}

$topics = $sns->listTopics();
foreach ($topics['Topics'] as $topic) {
    var_dump($topic);
}
