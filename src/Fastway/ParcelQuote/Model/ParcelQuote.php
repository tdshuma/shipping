<?PHP

declare(strict_types=1);

namespace Fastway\ParcelQuote\Model;

final class ParcelQuote
{
    public function __construct(
        public ?bool $isRural,
        public ?bool $isSaturdayDeliveryAvailable,
        public ?string $from,
        public ?string $to,
        public ?string $state,
        public ?string $postcode,
        public ?string $delfranchise,
        public ?string $delfranchiseCode,
        public ?string $pickfranchise,
        public ?string $pickfranchiseCode,
        public ?string $pickfranchisePhoneNumber,
        public ?string $currencySymbol,
        public ?string $currencyTaxword,
        public ?string $deliveryTimeframeDays,
        public ?int $parcelWeightKg,
        public ?array $services,
        public ?array $cheapestServices,
        public ?array $additionalServices,
        public ?string $countryCode,
        public ?bool $multipleRegions,
        public ?bool $deliveryRfDeeded,
    ) {}

    public static function fromJson(array $json): ParcelQuote
    {
        return new ParcelQuote(
            $json['isRural'],
            $json['isSaturdayDeliveryAvailable'],
            $json['from'],
            $json['to'],
            $json['state'],
            $json['postcode'],
            $json['delfranchise'],
            $json['delfranchise_code'],
            $json['pickfranchise'],
            $json['pickfranchise_code'],
            $json['pickfranchise_phone_number'],
            $json['currency_symbol'],
            $json['currency_taxword'],
            $json['delivery_timeframe_days'],
            $json['parcel_weight_kg'],
            array_map(fn($item) => Service::fromJson((array)$item), $json['services'] ?: []),
            array_map(fn($item) => Service::fromJson((array)$item), $json['cheapest_service'] ?: []),
            array_map(fn($item) => AdditionalService::fromJson((array)$item), $json['additional_services'] ?: []),
            $json['country_code'],
            $json['multiple_regions'],
            $json['delivery_rf_deeded'],
        );
    }

    public function toJson(): array
    {
        return [
            'isRural' => $this->isRural,
            'isSaturdayDeliveryAvailable' => $this->isSaturdayDeliveryAvailable,
            'from' => $this->from,
            'to' => $this->to,
            'state' => $this->state,
            'postcode' => $this->postcode,
            'delfranchise' => $this->delfranchise,
            'delfranchise_code' => $this->delfranchiseCode,
            'pickfranchise' => $this->pickfranchise,
            'pickfranchise_code' => $this->pickfranchiseCode,
            'pickfranchise_phone_number' => $this->pickfranchisePhoneNumber,
            'currency_symbol' => $this->currencySymbol,
            'currency_taxword' => $this->currencyTaxword,
            'delivery_timeframe_days' => $this->deliveryTimeframeDays,
            'parcel_weight_kg' => $this->parcelWeightKg,
            'services' => array_map(fn($item) => $item->toJson(), $this->services),
            'cheapest_service' => array_map(fn($item) => $item->toJson(), $this->cheapestServices),
            'additional_services' => array_map(fn($item) => $item->toJson(), $this->additionalServices),
            'country_code' => $this->countryCode,
            'multiple_regions' => $this->multipleRegions,
            'delivery_rf_deeded' => $this->deliveryRfDeeded,
        ];
    }
}
