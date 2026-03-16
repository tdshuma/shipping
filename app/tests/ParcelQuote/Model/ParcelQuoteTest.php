<?php

declare(strict_types=1);

use Fastway\ParcelQuote\Model\ParcelQuote;
use PHPUnit\Framework\TestCase;

final class ParcelQuoteTest extends TestCase
{
    public function testCanBeCreatedFromValidJson(): void
    {
        $string = file_get_contents(__DIR__ . '/../../mocks/parcel_quote.json');
        $json = (array)json_decode($string);
        $parcel = ParcelQuote::fromJson($json);
        $this->assertSame($parcel->countryCode, $json['country_code']);
    }
}
