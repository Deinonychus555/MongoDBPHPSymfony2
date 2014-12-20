<?php

namespace Mongo\Bundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CrawlerControllerTest extends WebTestCase
{
    public function testListarnodos()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/listarNodos');
    }

}
