<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ComiteControllerTest extends WebTestCase
{
    public function testHistorique()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/Historique');
    }

    public function testEquipe()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/Equipe');
    }

    public function testNousrencontrer()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/NousRencontrer');
    }

}
