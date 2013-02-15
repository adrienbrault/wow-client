<?php

namespace AdrienBrault\WoWClient;

class WoWHelper
{
    public static function parseDateTime($millisecondTimestamp)
    {
        $timestamp = round($millisecondTimestamp / 1000);

        $dateTime = new \DateTime(null, self::getDateTimeZoneUTC());
        $dateTime->setTimestamp($timestamp);

        return $dateTime;
    }

    private static function getDateTimeZoneUTC()
    {
        $utcIdentifiers = \DateTimeZone::listIdentifiers(\DateTimeZone::UTC);

        return new \DateTimeZone($utcIdentifiers[0]);
    }
}
