<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class JemengageControllerTest extends WebTestCase
{
    public function testDons()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/Dons');
    }

    public function testPartenaires()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/Partenaires');
    }

    public function testBenevoles()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/Benevoles');
    }

    public function testLegs()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/Legs');
    }

}
