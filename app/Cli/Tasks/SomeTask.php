<?php

namespace App\Cli\Tasks;

use Phalcon\Cli\Task;
use Phalcon\Cli\TaskInterface;
use Phalcon\Mvc\Model\Query;

/**
 * Class XvideoDb
 *
 * @package App\Tasks
 */
class SomeTask extends Task implements TaskInterface
{
    /**
     * \> php luxury some
     */
    public function mainAction()
    {
        echo __METHOD__;
    }

    /**
     * \> php luxury some test hello world
     *
     * @param array $params
     */
    public function testAction(array $params)
    {
        echo __METHOD__ . ':' . implode(' ', $params);
    }
}
