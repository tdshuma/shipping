<?php

declare(strict_types=1);

use Fastway\ParcelTracking\Model\Parcel;
use PHPUnit\Framework\TestCase;

final class ParcelTest extends TestCase
{
    public function testCanBeCreatedFromValidJson(): void
    {
        $string = file_get_contents(__DIR__ . '/../../mocks/parcel.json');
        $parcel = Parcel::fromJson((array)json_decode($string));
        $this->assertSame($string, json_encode($parcel->toJson()));
    }
}
