<?php

namespace Cbaconnier\ChuckNorrisJokes\Tests;

use Cbaconnier\ChuckNorrisJokes\ChuckNorrisJokesServiceProvider;
use Cbaconnier\ChuckNorrisJokes\Console\ChuckNorrisJoke;
use Cbaconnier\ChuckNorrisJokes\Facades\ChuckNorris;
use Cbaconnier\ChuckNorrisJokes\Models\Joke;
use Illuminate\Support\Facades\Artisan;
use Orchestra\Testbench\TestCase;

class LaravelTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            ChuckNorrisJokesServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'ChuckNorris' => ChuckNorrisJoke::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        include_once __DIR__.'/../database/migrations/create_jokes_table.php.stub';

        (new \CreateJokesTable)->up();
    }

    /** @test */
    public function the_console_command_returns_a_joke(): void
    {
        $this->withoutMockingConsoleOutput();

        ChuckNorris::shouldReceive('getRandomJoke')
            ->once()
            ->andReturn('some joke');

        $this->artisan('chuck-norris');

        $output = Artisan::output();

        $this->assertSame('some joke'.PHP_EOL, $output);
    }

    /** @test */
    public function the_route_can_be_accessed(): void
    {
        ChuckNorris::shouldReceive('getRandomJoke')
            ->once()
            ->andReturn('some joke');

        $this->get('/chuck-norris')
            ->assertViewIs('chuck-norris::joke')
            ->assertViewHas('joke', 'some joke')
            ->assertStatus(200);
    }

    /** @test */
    public function it_can_access_the_database(): void
    {
        $joke = new Joke();
        $joke->joke = 'This is funny';
        $joke->save();

        $newJoke = Joke::find($joke->id);

        $this->assertSame($newJoke->joke, 'This is funny');
    }
}
