<?php

require __DIR__ . '/vendor/autoload.php';

$sns = new Aws\Sns\SnsClient([
    'region'  => 'ap-northeast-1',
    'version' => '2010-03-31'
]);

$topics = $sns->listTopics();

// Subscribe an email address to each topic
foreach ($topics['Topics'] as $topic) {
    $response = $sns->subscribe([
            'TopicArn' => $topic['TopicArn'],
            'Protocol' => 'email',
            'Endpoint' => 'aws-sns@example.com'
    ]);
    printf('Subscribe to "%s": %s'.PHP_EOL,
           $topic['TopicArn'], $response['SubscriptionArn']);
}
