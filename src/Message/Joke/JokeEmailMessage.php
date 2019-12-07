<?php

namespace App\Message\Joke;

use App\Entity\JokeInterface;

/**
 * Class JokeEmailMessage
 */
class JokeEmailMessage extends JokeMessage
{
    /**
     * @var string
     */
    protected $email;

    /**
     * JokeEmailMessage constructor.
     *
     * @param JokeInterface $joke
     * @param string $email
     */
    public function __construct(JokeInterface $joke, string $email)
    {
        $this->joke = $joke;
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }
}
