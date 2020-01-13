<?php

namespace Cbaconnier\ChuckNorrisJokes\Console;

use Cbaconnier\ChuckNorrisJokes\Facades\ChuckNorris;
use Illuminate\Console\Command;

class ChuckNorrisJoke extends Command
{
    protected $signature = 'chuck-norris';
    protected $description = 'Output a funny Chuck Norris joke.';

    public function handle()
    {
        $this->info(ChuckNorris::getRandomJoke());
    }
}
