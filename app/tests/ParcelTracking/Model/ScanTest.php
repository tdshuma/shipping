<?php

declare(strict_types=1);

use Fastway\ParcelTracking\Model\Scan;
use PHPUnit\Framework\TestCase;

final class ScanTest extends TestCase
{
    public function testCanBeCreatedFromValidJson(): void
    {
        $string = file_get_contents(__DIR__ . '/../../mocks/scan.json');
        $scan = Scan::fromJson((array)json_decode($string));
        $this->assertSame($string, json_encode($scan->toJson()));
    }
}
