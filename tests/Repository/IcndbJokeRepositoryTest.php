<?php

namespace App\Tests\Repository;

use App\Entity\Joke;
use App\Entity\JokeInterface;
use App\Model\Icndb\IcndbClient;
use App\Repository\IcndbJokeRepository;
use PHPUnit\Framework\TestCase;

/**
 * Class IcndbJokeRepositoryTest
 */
class IcndbJokeRepositoryTest extends TestCase
{
    public function testGetCategories(): void
    {
        $clientMock = $this->getMockBuilder(IcndbClient::class)
            ->disableOriginalConstructor()
            ->setMethods(['getCategoryList'])
            ->getMock();
        $clientMock->method('getCategoryList')->willReturn(['category1', 'category2']);

        $repository = new IcndbJokeRepository($clientMock);
        $this->assertEquals(['category1', 'category2'], $repository->getCategories());
    }
    /**
     * @dataProvider dataProvider
     */
    public function testGetJokeByCategory(?string $text, string $category, ?JokeInterface $expected): void
    {
        $clientMock = $this->getMockBuilder(IcndbClient::class)
            ->disableOriginalConstructor()
            ->setMethods(['getJokeTextByCategory'])
            ->getMock();
        $clientMock->method('getJokeTextByCategory')->willReturn($text);

        $repository = new IcndbJokeRepository($clientMock);
        $this->assertEquals($expected, $repository->getJokeByCategory($category));
    }

    /**
     * @return array
     */
    public function dataProvider(): array
    {
        return [
            ['joke text', 'category', new Joke('category', 'joke text')],
            [null, 'category', null],
        ];
    }
}