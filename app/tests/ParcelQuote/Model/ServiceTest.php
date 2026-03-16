<?php

declare(strict_types=1);

use Fastway\ParcelQuote\Model\Service;
use PHPUnit\Framework\TestCase;

final class ServiceTest extends TestCase
{
    public function testCanBeCreatedFromValidJson(): void
    {
        $string = file_get_contents(__DIR__ . '/../../mocks/service.json');
        $json = (array)json_decode($string);
        $parcel = Service::fromJson($json);
        $this->assertSame($parcel->name, $json['name']);
    }
}
