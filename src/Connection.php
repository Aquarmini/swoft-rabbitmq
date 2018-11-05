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

use Swoft\Helper\PhpHelper;
use Swoft\Pool\AbstractConnection;
use Swoftx\RabbitMQ\Pool\Config\RabbitMQPoolConfig;
use Swoftx\RabbitMQ\Pool\RabbitMQPool;
use PhpAmqpLib\Connection\AbstractConnection as PhpAmqpLibConnection;

abstract class Connection extends AbstractConnection
{
    /**
     * @var PhpAmqpLibConnection
     */
    protected $connection;

    public function createConnection()
    {
        /** @var RabbitMQPool $pool */
        $pool = $this->getPool();

        /** @var RabbitMQPoolConfig $config */
        $config = $pool->getPoolConfig();

        $uri = $pool->getConnectionAddress();
        list($host, $port) = explode(':', $uri);
        $user = $config->getUser();
        $pass = $config->getPass();
        $vhost = $config->getVhost();

        $this->connection = $this->initConnection($host, $port, $user, $pass, $vhost);
    }

    abstract public function initConnection($host, $port, $user, $pass, $vhost): PhpAmqpLibConnection;

    public function reconnect()
    {
        $this->createConnection();

        return $this;
    }

    public function check(): bool
    {
        return true;
    }

    /**
     * @param string $method
     * @param array  $arguments
     *
     * @return mixed
     */
    public function __call($method, $arguments)
    {
        return PhpHelper::call([$this->connection, $method], $arguments);
    }
}
