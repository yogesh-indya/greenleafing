<?php

namespace App\Listeners;

use Log;
use Illuminate\Auth\Events\Attempting;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Symfony\Component\Console\Output\ConsoleOutput;

class LogAuthenticationAttempt
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
    public function handle(Attempting $event)
    {
        Log::info('An user is attempting to log in..');
        
       /* $output = new ConsoleOutput();
        $output->writeln($event->message[0]->email);
        $output->writeln("<info>An user is attempting to log in</info>");*/

    }
}
