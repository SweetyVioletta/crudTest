<?php

namespace App\Message\Joke;

use App\Entity\JokeInterface;

/**
 * Class JokeFileMessage
 * @package src\Message\Joke
 */
class JokeFileMessage extends JokeMessage
{
    /**
     * JokeFileMessage constructor.
     *
     * @param JokeInterface $joke
     */
    public function __construct(JokeInterface $joke)
    {
        $this->joke = $joke;
    }
}
