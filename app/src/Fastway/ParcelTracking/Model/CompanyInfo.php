<?php

declare(strict_types=1);

namespace Fastway\ParcelTracking\Model;

final class CompanyInfo
{
    public function __construct(
        private string $contactName,
        private string $company,
        private string $address1,
        private string $address2,
        private string $address3,
        private string $address4,
        private string $address5,
        private string $address6,
        private string $address7,
        private string $address8,
        private string $comment,

    ) {}

    public function fromJson(array $json): CompanyInfo
    {
        $this->contactName = $json['contactName'];
        $this->company = $json['company'];
        $this->address1 = $json['address1'];
        $this->address2 = $json['address2'];
        $this->address3 = $json['address3'];
        $this->address4 = $json['address4'];
        $this->address5 = $json['address5'];
        $this->address6 = $json['address6'];
        $this->address7 = $json['address7'];
        $this->address8 = $json['address8'];
        $this->comment = $json['comment'];
        return $this;
    }
}
