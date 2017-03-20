<?php

namespace App\Kernels\Cli\Tasks;

use Neutrino\Cli\Output\Decorate;
use Neutrino\Cli\Task;

/**
 * Class SomeTask
 *
 * @package App\Core\Tasks
 */
class SomeTask extends Task
{
    /**
     * \> php quark some
     */
    public function mainAction()
    {
        $this->line(__METHOD__);
    }

    /**
     * \> php quark some test hello world
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
