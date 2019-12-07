<?php

namespace App\Repository;

use App\Entity\JokeInterface;

/**
 * Interface JokeRepositoryInterface
 */
interface JokeRepositoryInterface
{
    /**
     * Return array of joke categories.
     * @return array
     */
    public function getCategories(): array;

    /**
     * Return a random joke by selected category.
     * @param string $category
     *
     * @return JokeInterface|null
     */
    public function getJokeByCategory(string $category): ?JokeInterface;
}
