<?php


namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class JokeControllerTest
 */
class JokeControllerTest extends WebTestCase
{
    public function testShowJokeForm(): void
    {
        $client = static::createClient();

        $client->request(OAUTH_HTTP_METHOD_GET, '/joke');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testSubmitForm()
    {
        $client = static::createClient();
        $crawler = $client->request(OAUTH_HTTP_METHOD_GET, '/joke');

        $form = $crawler->selectButton('Send')->form();
        $form->setValues([
            'joke_category[email]' => 'email@mail.ru',
            'joke_category[category]' => 'nerdy',
        ]);

        $client->submit($form);

        $transport = self::$container->get('messenger.transport.async');
        $this->assertCount(2, $transport->getSent());
    }
}
