<?php


namespace App\Tests\Form;

use App\Repository\IcndbJokeRepository;
use Symfony\Component\Form\PreloadedExtension;
use Symfony\Component\Form\Test\TypeTestCase;
use App\Form\JokeCategoryType;
use App\Model\JokeCategory;

class JokeCategoryTypeTest extends TypeTestCase
{
    private $jokeRepository;

    protected function setUp(): void
    {
        // mock any dependencies
        $this->jokeRepository = $this->getMockBuilder(IcndbJokeRepository::class)
            ->disableOriginalConstructor()
            ->setMethods(['getCategories'])
            ->getMock();

        $this->jokeRepository->method('getCategories')->willReturn(['category1', 'category2']);

        parent::setUp();
    }

    protected function getExtensions(): array
    {
        // create a type instance with the mocked dependencies
        $type = new JokeCategoryType($this->jokeRepository);

        return [
            // register the type instances with the PreloadedExtension
            new PreloadedExtension([$type], []),
        ];
    }

    public function testSubmitValidData(): void
    {
        $formData = [
            'email' => 'mail@mail.ru',
            'category' => 'category',
        ];

        $objectToCompare = new JokeCategory();
        // $objectToCompare will retrieve data from the form submission; pass it as the second argument
        $form = $this->factory->create(JokeCategoryType::class);

        $object = new JokeCategory();
        // ...populate $object properties with the data stored in $formData

        // submit the data to the form directly
        $form->submit($formData);

        $this->assertTrue($form->isSynchronized());
        // check that $objectToCompare was modified as expected when the form was submitted
        $this->assertEquals($object, $objectToCompare);

        $view = $form->createView();
        $children = $view->children;

        foreach (array_keys($formData) as $key) {
            $this->assertArrayHasKey($key, $children);
        }
    }
}
