<?php

namespace AdrienBrault\WoWClient\Tests;

use AdrienBrault\WoWClient\WoWClient;

class WoWClientTest extends \PHPUnit_Framework_TestCase
{
    public function testGetAuctionData()
    {
        $client = WoWClient::factory();
        $data = $client->GetAuctionData(array(
            'realm' => 'ysondre',
        ));

        $this->assertStringEndsWith('auctions.json', $data['files'][0]['url']);
    }
}
