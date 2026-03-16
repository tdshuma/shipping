<?php

declare(strict_types=1);

namespace Fastway\ParcelTracking\Model;

final class CompanyInfo
{
    public function __construct(
        private ?string $contactName,
        private ?string $company,
        private ?string $address1,
        private ?string $address2,
        private ?string $address3,
        private ?string $address4,
        private ?string $address5,
        private ?string $address6,
        private ?string $address7,
        private ?string $address8,
        private ?string $comment,

    ) {}

    public static function fromJson(array $json): CompanyInfo
    {
        return new CompanyInfo(
            $json['contactName'],
            $json['company'],
            $json['address1'],
            $json['address2'],
            $json['address3'],
            $json['address4'],
            $json['address5'],
            $json['address6'],
            $json['address7'],
            $json['address8'],
            $json['comment'],
        );
    }

    public function toJson(): array
    {
        return [
            'contactName' => $this->contactName,
            'company' => $this->company,
            'address1' => $this->address1,
            'address2' => $this->address2,
            'address3' => $this->address3,
            'address4' => $this->address4,
            'address5' => $this->address5,
            'address6' => $this->address6,
            'address7' => $this->address7,
            'address8' => $this->address8,
            'comment' => $this->comment,
        ];
    }
}
