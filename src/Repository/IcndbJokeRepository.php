<?php

namespace src\Repository;

use src\Entity\Joke;
use src\Entity\JokeInterface;
use src\Model\Icndb\IcndbClientInterface;

/**
 * Class IcndbJokeRepository
 */
class IcndbJokeRepository implements JokeRepositoryInterface
{
    /**
     * @var IcndbClientInterface
     */
    protected $client;

    /**
     * IcndbJokeRepository constructor.
     *
     * @param IcndbClientInterface $client
     */
    public function __construct(IcndbClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @return array
     */
    public function getCategories(): array
    {
        return $this->client->getCategoryList();
    }

    /**
     * @param string $category
     *
     * @return JokeInterface|null
     */
    public function getJokeByCategory(string $category): ?JokeInterface
    {
        $jokeText = $this->client->getJokeTextByCategory($category);
        return $jokeText ? new Joke($category, $jokeText) : null;
    }
}
