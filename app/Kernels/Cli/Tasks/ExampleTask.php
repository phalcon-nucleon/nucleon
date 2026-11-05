<?php

declare(strict_types=1);

namespace App\Kernels\Cli\Tasks;

use Neutrino\Cli\Attribute\Argument;
use Neutrino\Cli\Attribute\Description;
use Neutrino\Cli\Output\Decorate;
use Neutrino\Cli\Task;

class ExampleTask extends Task
{
    #[Description('An example command.')]
    public function mainAction()
    {
        $this->line(__METHOD__);
    }

    #[Description('Shows its two arguments.')]
    #[Argument('param_1', 'The first argument.')]
    #[Argument('param_2', 'The second argument.')]
    public function testAction()
    {
        $this->line(Decorate::notice(__METHOD__) . ' ' . Decorate::info($this->getArg('param_1') . ' ' . $this->getArg('param_2')));
    }

    #[Description('Asks some questions.')]
    public function showupAction()
    {
        $this->line('Hi !');

        $name = $this->prompt('I\'m quark ! And you, who you are ?');

        $this->line('Nice to meet you ' . $name);

        if ($this->confirm('Are you human ?', true)) {
            $this->info('Yes you are !');

            $answer = $this->choices('You are a male, a female, or just human ?', ['male', 'female', 'human'], 'human');
            $this->line($answer === 'human' ? 'Ok, I like your way of thinking :)' : 'Ok');
        } else {
            $this->info('Hey ! you like me');
        }

        $this->line('');
        $this->line('Well, bye ' . $name);
    }
}
