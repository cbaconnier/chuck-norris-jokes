<?php

namespace Cbaconnier\ChuckNorrisJokes\Tests;

use Cbaconnier\ChuckNorrisJokes\JokeFactory;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class JokeFactoryTest extends TestCase
{
    /** @test */
    public function it_returns_a_random_joke(): void
    {
        $mock = new MockHandler([
            new Response(200, [], '{ "type": "success", "value": { "id": 457, "joke": "MySpace actually isn\'t your space, it\'s Chuck\'s (he just lets you use it).", "categories": ["nerdy"] } }'),
        ]);

        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);

        $jokes = new JokeFactory($client);

        $joke = $jokes->getRandomJoke();

        $this->assertSame('MySpace actually isn\'t your space, it\'s Chuck\'s (he just lets you use it).', $joke);
    }


}
