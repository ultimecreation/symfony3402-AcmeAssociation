<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ActualitesControllerTest extends WebTestCase
{
    public function testEvenements()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/Evenements');
    }

    public function testBilans()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/Bilans');
    }

}
