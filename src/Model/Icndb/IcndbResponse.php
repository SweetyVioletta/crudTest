<?php

namespace App\Model\Icndb;

use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Psr7\Response;

/**
 * Class IcndbResponse
 * Parse json response from icndb.
 * Response should include type and value params.
 */
class IcndbResponse
{
    protected const SUCCESS_TYPE = 'success';

    /**
     * @var string
     */
    protected $type;
    /**
     * @var mixed
     */
    protected $value;

    /**
     * IcndbResponse constructor.
     *
     * @param Response $response
     */
    public function __construct(Response $response)
    {
        $content = json_decode($response->getBody()->getContents(), true);
        if (null === $content) {
            throw new BadResponseException('Invalid json data in response.');
        }
        if (!isset($content['type'], $content['value'])) {
            throw new BadResponseException('There is no required params `type` and `value`.');
        }
        $this->type = $content['type'];
        $this->value = $content['value'];
    }

    /**
     * @return bool
     */
    protected function isSuccess(): bool
    {
        return static::SUCCESS_TYPE === $this->type;
    }

    /**
     * Return a response value.
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
}
