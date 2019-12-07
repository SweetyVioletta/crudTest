<?php

namespace App\Tests\Entity;

use App\Entity\Joke;
use App\Entity\JokeInterface;
use PHPUnit\Framework\TestCase;

/**
 * Class JokeTest
 */
class JokeTest extends TestCase
{
    public function testImplementation(): void
    {
        $model = new Joke('category', 'text');
        static::assertInstanceOf(JokeInterface::class, $model);
    }

    public function testGetters(): void
    {
        $model = new Joke('category', 'text');
        static::assertEquals('category', $model->getCategory());
        static::assertEquals('text', $model->getText());
    }
}
