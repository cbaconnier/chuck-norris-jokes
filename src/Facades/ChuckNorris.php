<?php

namespace Cbaconnier\ChuckNorrisJokes\Facades;

use Illuminate\Support\Facades\Facade;

/**
* @method static string getRandomJoke()
*
* @see \Cbaconnier\ChuckNorrisJokes\JokeFactory
*/

class ChuckNorris extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'chuck-norris';
    }
}