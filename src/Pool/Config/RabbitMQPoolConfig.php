<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace Swoftx\RabbitMQ\Pool\Config;

use Swoft\Bean\Annotation\Bean;
use Swoft\Bean\Annotation\Value;
use Swoft\Pool\PoolProperties;

/**
 * the pool config of RabbitMQ
 *
 * @Bean()
 */
class RabbitMQPoolConfig extends PoolProperties
{
    /**
     * the name of pool
     *
     * @Value(name="${config.rabbitMQ.name}", env="${RABBITMQ_NAME}")
     * @var string
     */
    protected $name = '';

    /**
     * Minimum active number of connections
     *
     * @Value(name="${config.rabbitMQ.minActive}", env="${RABBITMQ_MIN_ACTIVE}")
     * @var int
     */
    protected $minActive = 5;

    /**
     * the maximum number of active connections
     *
     * @Value(name="${config.rabbitMQ.maxActive}", env="${RABBITMQ_MAX_ACTIVE}")
     * @var int
     */
    protected $maxActive = 10;

    /**
     * the maximum number of wait connections
     *
     * @Value(name="${config.rabbitMQ.maxWait}", env="${RABBITMQ_MAX_WAIT}")
     * @var int
     */
    protected $maxWait = 20;

    /**
     * Maximum waiting time
     *
     * @Value(name="${config.rabbitMQ.maxWaitTime}", env="${RABBITMQ_MAX_WAIT_TIME}")
     * @var int
     */
    protected $maxWaitTime = 3;

    /**
     * Maximum idle time
     *
     * @Value(name="${config.rabbitMQ.maxIdleTime}", env="${RABBITMQ_MAX_IDLE_TIME}")
     * @var int
     */
    protected $maxIdleTime = 60;

    /**
     * the time of connect timeout
     *
     * @Value(name="${config.rabbitMQ.timeout}", env="${RABBITMQ_TIMEOUT}")
     * @var int
     */
    protected $timeout = 3;

    /**
     * the addresses of connection
     *
     * <pre>
     * [
     *  '127.0.0.1:88',
     *  '127.0.0.1:88'
     * ]
     * </pre>
     *
     * @Value(name="${config.rabbitMQ.uri}", env="${RABBITMQ_URI}")
     * @var array
     */
    protected $uri = [
        '127.0.0.1:5672'
    ];

    /**
     * the user of pool
     *
     * @Value(name="${config.rabbitMQ.user}", env="${RABBITMQ_USER}")
     * @var string
     */
    protected $user = 'guest';

    /**
     * the pass of pool
     *
     * @Value(name="${config.rabbitMQ.pass}", env="${RABBITMQ_PASS}")
     * @var string
     */
    protected $pass = 'guest';

    /**
     * the vhost of pool
     *
     * @Value(name="${config.rabbitMQ.vhost}", env="${RABBITMQ_VHOST}")
     * @var string
     */
    protected $vhost = '/';

    /**
     * @return string
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * @return string
     */
    public function getPass(): string
    {
        return $this->pass;
    }

    /**
     * @return string
     */
    public function getVhost(): string
    {
        return $this->vhost;
    }
}
