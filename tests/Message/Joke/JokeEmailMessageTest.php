<?php

namespace App\Tests\Message\Joke;

use App\Entity\Joke;
use App\Message\Joke\JokeEmailMessage;
use App\Message\Joke\JokeMessage;
use PHPUnit\Framework\TestCase;

/**
 * Class JokeEmailMessageTest
 */
class JokeEmailMessageTest extends TestCase
{
    public function testImplementation(): void
    {
        $joke = new Joke('category', 'text');
        $model = new JokeEmailMessage($joke, 'email');
        static::assertInstanceOf(JokeMessage::class, $model);
    }

    public function testGetters(): void
    {
        $joke = new Joke('category', 'text');
        $model = new JokeEmailMessage($joke, 'email');
        static::assertEquals($joke, $model->getJoke());
        static::assertEquals('email', $model->getEmail());
    }
}
