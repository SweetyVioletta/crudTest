<?php

namespace App\Model\Icndb;

use GuzzleHttp\Client;

/**
 * Class IcndbClient
 * @package src\Model\Icndb
 */
class IcndbClient implements IcndbClientInterface
{
    protected const CATEGORY_LIST_URL = 'categories';
    protected const CATEGORY_RANDOM_JOKE = 'jokes/random';
    protected const METHOD = 'GET';

    /**
     * @var string
     */
    protected $url;
    /**
     * @var Client
     */
    protected $guzzleClient;

    /**
     * IcndbClient constructor.
     *
     * @param string $url
     */
    public function __construct(string $url)
    {
        $this->guzzleClient = new Client(['base_uri' => $url]);
    }

    /**
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getCategoryList(): array
    {
        $response = new IcndbResponse($this->guzzleClient->request(static::METHOD, static::CATEGORY_LIST_URL));
        return $response->getValue();
    }

    /**
     * @param string $category
     *
     * @return string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getJokeTextByCategory(string $category): ?string
    {
        $url = static::CATEGORY_RANDOM_JOKE . "?limitTo=[$category]";
        $response = new IcndbResponse($this->guzzleClient->request(static::METHOD, $url));
        return $response->getValue();
    }
}
