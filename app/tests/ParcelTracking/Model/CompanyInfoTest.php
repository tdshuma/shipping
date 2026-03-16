<?php

declare(strict_types=1);

use Fastway\ParcelTracking\Model\CompanyInfo;
use PHPUnit\Framework\TestCase;

final class CompanyInfoTest extends TestCase
{
    public function testCanBeCreatedFromValidJson(): void
    {
        $string = file_get_contents(__DIR__ . '/../../mocks/company_info.json');
        $companyInfo = CompanyInfo::fromJson((array)json_decode($string));
        $this->assertSame($string, json_encode($companyInfo->toJson()));
    }
}
