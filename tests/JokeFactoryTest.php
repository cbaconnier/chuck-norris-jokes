<?php

namespace Cbaconnier\ChuckNorrisJokes\Tests;

use Cbaconnier\ChuckNorrisJokes\JokeFactory;
use PHPUnit\Framework\TestCase;

class JokeFactoryTest extends TestCase
{
    /** @test */
    public function it_returns_a_random_joke(): void
    {
        $jokes = new JokeFactory([
            'This is a joke',
        ]);

        $joke = $jokes->getRandomJoke();

        $this->assertSame('This is a joke', $joke);
    }

    /** @test */
    public function it_returns_a_predefined_joke(): void
    {
        $chuckNorrisJokes = [
            'Chuck Norris threw a grenade and killed 50 people, then it exploded.',
            'Slow motion was invented in an attempt to defeat Chuck Norris. In response, Chuck Norris invented fast forward.',
            'Chuck Norris can shove your teeth so far down your throat that you need to sit on food to eat it.',
            'Death once had a near-Chuck-Norris experience.',
            'Chuck Norris can kill two stones with one bird.',
        ];

        $jokes = new JokeFactory($chuckNorrisJokes);

        $joke = $jokes->getRandomJoke();

        $this->assertContains($joke, $chuckNorrisJokes);
    }

}
