<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace Swoftx\RabbitMQ\Pool;

use Swoft\App;
use Swoft\Bean\Annotation\Inject;
use Swoft\Bean\Annotation\Pool;
use Swoft\Pool\ConnectionInterface;
use Swoft\Pool\ConnectionPool;
use Swoftx\RabbitMQ\CoroutineConnection;
use Swoftx\RabbitMQ\Pool\Config\RabbitMQPoolConfig;
use Swoftx\RabbitMQ\SyncConnection;

/**
 * Redis pool
 *
 * @Pool()
 */
class RabbitMQPool extends ConnectionPool
{
    /**
     * Config
     *
     * @Inject()
     * @var RabbitMQPoolConfig
     */
    protected $poolConfig;

    /**
     * Create connection
     *
     * @return ConnectionInterface
     */
    public function createConnection(): ConnectionInterface
    {
        if (App::isCoContext()) {
            $connection = new CoroutineConnection($this);
        } else {
            $connection = new SyncConnection($this);
        }

        return $connection;
    }
}
