<?php

namespace App\Entity;

/**
 * Class Joke
 */
class Joke implements JokeInterface
{
    /**
     * @var string
     */
    protected $category;

    /**
     * @var string
     */
    protected $text;

    /**
     * Joke constructor.
     *
     * @param string $category
     * @param string $text
     */
    public function __construct(string $category, string $text)
    {
        $this->category = $category;
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }
}
