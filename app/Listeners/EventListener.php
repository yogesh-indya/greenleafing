<?php

namespace App\Listeners;

use App\Events\SomeEvent;
use Illuminate\Auth\Events\Attempting;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Symfony\Component\Console\Output\ConsoleOutput;

class EventListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SomeEvent  $event
     * @return void
     */
    public function handle(SomeEvent $eventRequest)
    {
        $output = new ConsoleOutput();
        $output->writeln("<info>Someone asked for a plant and you\'re bieng queued for 30 seconds..!!</info>");

        if (true) {
            $this->release(30);
        }
    }
}
