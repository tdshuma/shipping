<?php

declare(strict_types=1);

namespace Fastway\ParcelTracking\Model;

final class Scan
{
    public function __construct(
        public ?string $type,
        public ?string $courier,
        public ?string $description,
        public ?string $date,
        public ?string $realDateTime,
        public ?string $name,
        public ?string $franchise,
        public ?string $status,
        public ?string $statusDescription,
        public ?CompanyInfo $companyInfo,
        public ?string $uploadDate,
        public ?string $signature,
        public ?string $parcelconnectagent
    ) {}

    public static function fromJson(array $json): Scan
    {
        return new Scan(
            $json['Type'],
            $json['Courier'],
            $json['Description'],
            $json['Date'],
            $json['RealDateTime'],
            $json['Name'],
            $json['Franchise'],
            $json['Status'],
            $json['StatusDescription'],
            CompanyInfo::fromJson((array)$json['CompanyInfo']),
            $json['UploadDate'],
            $json['Signature'],
            $json['Parcelconnectagent'],
        );
    }


    public function toJson(): array
    {
        return [
            'Type' => $this->type,
            'Courier' => $this->courier,
            'Description' => $this->description,
            'Date' => $this->date,
            'RealDateTime' => $this->realDateTime,
            'Name' => $this->name,
            'Franchise' => $this->franchise,
            'Status' => $this->status,
            'StatusDescription' => $this->statusDescription,
            'CompanyInfo' =>  $this->companyInfo->toJson(),
            'UploadDate' => $this->uploadDate,
            'Signature' => $this->signature,
            'ParcelConnectAgent' => $this->parcelconnectagent,
        ];
    }
}
