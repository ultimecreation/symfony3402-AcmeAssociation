<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MissionsControllerTest extends WebTestCase
{
    public function testMissions()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/Missions');
    }

}
