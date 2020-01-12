<?php

namespace Cbaconnier\ChuckNorrisJokes;

class JokeFactory
{
    /**
     * @var array
     */
    protected $jokes = [
        'Chuck Norris threw a grenade and killed 50 people, then it exploded.',
        'Slow motion was invented in an attempt to defeat Chuck Norris. In response, Chuck Norris invented fast forward.',
        'Chuck Norris can shove your teeth so far down your throat that you need to sit on food to eat it.',
        'Death once had a near-Chuck-Norris experience.',
        'Chuck Norris can kill two stones with one bird.',
    ];

    public function __construct(array $jokes = null)
    {
        if ($jokes) {
            $this->jokes = $jokes;
        }
    }

    public function getRandomJoke()
    {
        return $this->jokes[array_rand($this->jokes)];
    }
}
