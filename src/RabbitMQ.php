<?php


namespace Swoftx\RabbitMQ;

use Swoft\App;
use Swoft\Bean\Annotation\Bean;
use Swoftx\RabbitMQ\Pool\RabbitMQPool;

/**
 * Class RabbitMQ
 * @Bean
 */
class RabbitMQ
{
    protected $poolName = RabbitMQPool::class;

    /**
     * magic method
     *
     * @param string $method
     * @param array  $arguments
     *
     * @return mixed
     */
    public function __call($method, $arguments)
    {
        return $this->call($method, $arguments);
    }

    /**
     * call method by redis client
     *
     * @param string $method
     * @param array  $params
     *
     * @return mixed
     */
    public function call(string $method, array $params)
    {
        /* @var RabbitMQPool $pool */
        $pool = App::getPool($this->poolName);
        /* @var Connection $client */
        $connection = $pool->getConnection();
        $result = $connection->$method(...$params);
        $connection->release(true);

        return $result;
    }
}