<?php

namespace App\Cli\Tasks;

use Luxury\Cli\Task;

/**
 * Class XvideoDb
 *
 * @package App\Tasks
 */
class SomeTask extends Task
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
