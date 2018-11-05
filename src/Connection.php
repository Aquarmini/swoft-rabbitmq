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

use Swoft\Pool\AbstractConnection;

abstract class Connection extends AbstractConnection
{
    public function reconnect()
    {
        $this->createConnection();

        return $this;
    }

    public function check(): bool
    {
        return true;
    }
}
