<?php

namespace App\Kernels\Cli\Tasks;

use Neutrino\Cli\Output\Decorate;
use Neutrino\Cli\Task;

/**
 * Class SomeTask
 *
 * @package App\Core\Tasks
 */
class ExampleTask extends Task
{
    /**
     * \> php quark some
     */
    public function mainAction()
    {
        $this->line(__METHOD__);
    }

    public function throwException()
    {
        throw new \Exception();
    }

    /**
     * \> php quark some:test hello world
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

    /**
     * \> php quark show:up
     */
    public function showupAction()
    {
        $this->line('Hi !');
        $name = $this->prompt('I\'m quark ! And you, who you are ?');

        $this->line('Nice to meet you ' . $name);

        if ($this->confirm('Are you humain ?', true)) {
            $this->info('Yes you are !');

            switch ($this->choices('You are a male, a female, or just human ?', ['male', 'female', 'human'], 'human')) {
                case 'male':
                case 'female':
                    $this->line('Ok');
                    break;
                case 'human':
                    $this->line('Ok, i like your thinking way :)');
                    break;
            }
        } else {
            $this->info('Hey ! you like me');
        }

        $this->line('');
        $this->line('Well, by ' . $name);
    }
}
