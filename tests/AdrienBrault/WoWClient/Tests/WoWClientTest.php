<?php

namespace AdrienBrault\WoWClient\Tests;

use AdrienBrault\WoWClient\WoWClient;

class WoWClientTest extends \PHPUnit_Framework_TestCase
{
    public function testGetAuctionData()
    {
        $client = WoWClient::factory();
        $data = $client->getAuctionData(array(
            'realm' => 'ysondre',
        ));

        $this->assertStringEndsWith('auctions.json', $data['files'][0]['url']);
    }

    public function testGetItem()
    {
        $client = WoWClient::factory();
        $data = $client->getItem(array(
            'id' => 18348,
        ));

        $this->assertEquals('Quel\'Serrar', $data['name']);
    }

    public function testGetItemClasses()
    {
        $client = WoWClient::factory();
        $data = $client->getItemClasses();

        $this->assertArrayHasKey('classes', $data);
    }

    public function testGetRealmStatus()
    {
        $client = WoWClient::factory();
        $data = $client->getRealmStatus();

        $this->assertArrayHasKey('realms', $data);
    }
}
