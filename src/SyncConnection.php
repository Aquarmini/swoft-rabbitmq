<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace Swoftx\RabbitMQ;

use PhpAmqpLib\Connection\AbstractConnection as PhpAmqpLibConnection;
use PhpAmqpLib\Connection\AMQPStreamConnection;

class SyncConnection extends Connection
{
    public function initConnection($host, $port, $user, $pass, $vhost): PhpAmqpLibConnection
    {
        return new AMQPStreamConnection($host, $port, $user, $pass, $vhost);
    }
}
