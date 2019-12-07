<?php

namespace App\Message\Joke;

use App\Entity\JokeInterface;

/**
 * Class JokeMessage
 * @package src\Message\Joke
 */
abstract class JokeMessage
{
    /**
     * @var JokeInterface
     */
    protected $joke;

    /**
     * @return JokeInterface
     */
    public function getJoke(): JokeInterface
    {
        return $this->joke;
    }
}
