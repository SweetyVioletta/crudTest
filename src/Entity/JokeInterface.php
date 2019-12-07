<?php

namespace App\Entity;
/**
 * Interface JokeInterface
 * This is interface for Joke entity model
 */
interface JokeInterface
{
    /**
     * @return string
     */
    public function getText(): string;

    /**
     * @return string
     */
    public function getCategory(): string;
}
