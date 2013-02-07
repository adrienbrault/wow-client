<?php

namespace AdrienBrault\WoWClient;

use Guzzle\Common\Collection;
use Guzzle\Service\Client;
use Guzzle\Service\Description\ServiceDescription;

/**
 * @author Adrien Brault <adrien.brault@gmail.com>
 *
 * @method WoWClient factory
 * @method array getAuctionData($parameters = array())
 * @method array getItem($parameters = array())
 * @method array getItemClasses($parameters = array())
 * @method array getRealmStatus($parameters = array())
 */
class WoWClient extends Client
{
    public static function factory($config = array())
    {
        $default = array(
            'base_url' => '{scheme}://{region}.battle.net/api/wow/',
            'scheme' => 'http',
            'region' => 'eu',

            self::CURL_OPTIONS => array(
                CURLOPT_ENCODING => 'gzip',
            ),
        );
        $required = array();
        $config = Collection::fromConfig($config, $default, $required);

        $client = new self($config->get('base_url'), $config);

        $description = ServiceDescription::factory(__DIR__ . '/description.json');
        $client->setDescription($description);

        return $client;
    }
}
