<?php

namespace App\Tests\Message\Joke;

use App\Entity\Joke;
use App\Message\Joke\JokeEmailMessage;
use App\Message\Joke\JokeFileMessage;
use App\Message\Joke\JokeMessage;
use PHPUnit\Framework\TestCase;

/**
 * Class JokeFileMessageTest
 */
class JokeFileMessageTest extends TestCase
{
    public function testImplementation(): void
    {
        $joke = new Joke('category', 'text');
        $model = new JokeFileMessage($joke);
        static::assertInstanceOf(JokeMessage::class, $model);
    }

    public function testGetters(): void
    {
        $joke = new Joke('category', 'text');
        $model = new JokeFileMessage($joke);
        static::assertEquals($joke, $model->getJoke());
    }
}
