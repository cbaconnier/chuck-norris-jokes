# Chuck Norris Jokes

Create Chuck Norris jokes in your PHP project.

## Installation

Require the package using composer:

```bash
composer require cbaconnier/chuck-norris-jokes
```

## Usage

```php
use Cbaconnier\ChuckNorrisJokes\JokeFactory;

$jokes = new JokeFactory();
$joke = $jokes->getRandomJoke();
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](./LICENSE.md)
