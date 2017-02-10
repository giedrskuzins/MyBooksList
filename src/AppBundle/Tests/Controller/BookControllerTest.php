<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

use Symfony\Component\HttpFoundation\Request;

class BookControllerTest extends WebTestCase
{
    public function testShowAllBooks()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        //$this->assertContains('Mano knygos', $crawler->filter('#container h1')->text());
        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Mano knygos")')->count()
        );
    }
    
    public function testShowBookDetail()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/ShowBookDetail/2');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        //$this->assertContains('Mano knygos', $crawler->filter('#container h1')->text());
        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Apie knygą")')->count()
        );
    }
}
