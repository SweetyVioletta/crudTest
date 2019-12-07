<?php

namespace src\Model\Icndb;

use src\Repository\IcndbJokeRepository;

/**
 * Interface IcndbClientInterface
 * This interface is for IcndbClient model
 * @see IcndbJokeRepository
 */
interface IcndbClientInterface
{
    /**
     * @return array
     */
    public function getCategoryList(): array;

    /**
     * @param string $category
     *
     * @return string|null
     */
    public function getJokeTextByCategory(string $category): ?string;
}
