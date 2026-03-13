<?php

declare(strict_types=1);

namespace Fastway\ParcelTracking\Model;

final class Scan
{
    public function __construct(
        private string $type,
        private string $courier,
        private string $description,
        private string $date,
        private string $realDateTime,
        private string $name,
        private string $franchise,
        private string $status,
        private string $statusDescription,
        private CompanyInfo $companyInfo,
        private string $uploadDate,
        private string $signature,
        private ?string $parcelconnectagent
    ) {}
}
