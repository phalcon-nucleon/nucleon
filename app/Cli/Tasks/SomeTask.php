<?php

namespace App\Cli\Tasks;

use Luxury\Cli\Output\Decorate;
use Luxury\Cli\Task;

/**
 * Class SomeTask
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
        $this->line(__METHOD__);
    }

    /**
     * \> php luxury some test hello world
     *
     * @argument param_1: the first param
     * @argument param_2: the second param
     *
     * @param array $params
     */
    public function testAction(array $params)
    {
      $this->line($this->output->notice(__METHOD__) . ' ' . Decorate::info(implode(' ', $params)));
    }
}
