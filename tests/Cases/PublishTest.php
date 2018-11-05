<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */
namespace SwoftTest\Cases;

use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Message\AMQPMessage;
use Swoft\Helper\JsonHelper;
use Swoftx\RabbitMQ\RabbitMQ;

class PublishTest extends AbstractTestCase
{
    public function testBasicPublish()
    {
        $mq = bean(RabbitMQ::class);
        /** @var AMQPChannel $channel */
        $channel = $mq->channel();
        $exchange = 'swoft-test';

        $body = JsonHelper::encode([
            'type' => 'test',
            'data' => [
                'id' => 1,
                'name' => 'limx'
            ],
        ]);
        $message = new AMQPMessage($body);
        $res = $channel->basic_publish($message, $exchange, 'swoft-key');

        $this->assertNull($res);
    }

    public function testBasicPublishByCo()
    {
        go(function () {
            $this->testBasicPublish();
        });
    }
}
