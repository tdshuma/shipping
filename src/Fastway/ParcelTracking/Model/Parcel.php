<?php

declare(strict_types=1);

namespace Fastway\ParcelTracking\Model;

final class Parcel
{
    public function __construct(
        public ?string $pickupFranchise,
        public ?string $pickupFranchiseCode,
        public ?string $pickupFranchiseCurrentDate,
        public ?string $pickupFranchiseCurrentTime,
        public ?string $deliveryFranchise,
        public ?string $deliveryFranchiseCode,
        public ?string $deliveryFranchiseCurrentDate,
        public ?string $deliveryFranchiseCurrentTime,
        public ?string $deliveryETADate,
        public ?string $tSSDeliveryDays,
        public ?string $labelNumber,
        public ?array $scans,
        public ?string $signature,
        public ?string $distributedTo,
        public ?string $distributedDate,
        public ?string $reference,
        public ?string $originalLabelNumber,
        public ?string $isOnforward,
        public ?bool $isNZPostOnforward,
        public ?string $onforwardLabelNumber,
        public ?string $callingCard,
        public ?array $callingCardLabelNumbers,
        public ?bool $hasDScan,
        public ?string $lastScanDate,
        public ?bool $wasScannedLast24Hours,
    ) {}

    public static function fromJson(array $json): Parcel
    {
        return new Parcel(
            $json['PickupFranchise'],
            $json['PickupFranchiseCode'],
            $json['PickupFranchiseCurrentDate'],
            $json['PickupFranchiseCurrentTime'],
            $json['DeliveryFranchise'],
            $json['DeliveryFranchiseCode'],
            $json['DeliveryFranchiseCurrentDate'],
            $json['DeliveryFranchiseCurrentTime'],
            $json['DeliveryETADate'],
            $json['TSSDeliveryDays'],
            $json['LabelNumber'],
            array_map(fn($scan) => Scan::fromJson((array)$scan), $json['Scans']),
            $json['Signature'],
            $json['DistributedTo'],
            $json['DistributedDate'],
            $json['Reference'],
            $json['OriginalLabelNumber'],
            $json['IsOnforward'],
            $json['IsNZPostOnforward'],
            $json['OnforwardLabelNumber'],
            $json['CallingCard'],
            $json['CallingCardLabelNumbers'],
            $json['HasDScan'],
            $json['LastScanDate'],
            $json['WasScannedLast24Hours'],
        );
    }

    public function toJson(): array
    {
        return [
            'PickupFranchise' => $this->pickupFranchise,
            'PickupFranchiseCode' => $this->pickupFranchiseCode,
            'PickupFranchiseCurrentDate' => $this->pickupFranchiseCurrentDate,
            'PickupFranchiseCurrentTime' => $this->pickupFranchiseCurrentTime,
            'DeliveryFranchise' => $this->deliveryFranchise,
            'DeliveryFranchiseCode' => $this->deliveryFranchiseCode,
            'DeliveryFranchiseCurrentDate' => $this->deliveryFranchiseCurrentDate,
            'DeliveryFranchiseCurrentTime' => $this->deliveryFranchiseCurrentTime,
            'DeliveryETADate' => $this->deliveryETADate,
            'TSSDeliveryDays' => $this->tSSDeliveryDays,
            'LabelNumber' => $this->labelNumber,
            'Scans' => array_map(fn($item) => $item->toJson(), $this->scans ?: []),
            'Signature' => $this->signature,
            'DistributedTo' => $this->distributedTo,
            'DistributedDate' => $this->distributedDate,
            'Reference' => $this->reference,
            'OriginalLabelNumber' => $this->originalLabelNumber,
            'IsOnforward' => $this->isOnforward,
            'IsNZPostOnforward' => $this->isNZPostOnforward,
            'OnforwardLabelNumber' => $this->onforwardLabelNumber,
            'CallingCard' => $this->callingCard,
            'CallingCardLabelNumbers' => $this->callingCardLabelNumbers,
            'HasDScan' => $this->hasDScan,
            'LastScanDate' => $this->lastScanDate,
            'WasScannedLast24Hours' => $this->wasScannedLast24Hours,
        ];
    }
}
