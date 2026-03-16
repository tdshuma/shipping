<?PHP

declare(strict_types=1);

namespace Fastway\ParcelQuote\Model;

final class Service
{
    public function __construct(
        public ?string $type,
        public ?string $name,
        public ?string $labelcolour,
        public ?array $labelcolourArray,
        public ?string $labelcolourPretty,
        public ?array $labelcolourPrettyArray,
        public ?int $weightlimit,
        public ?int $baseweight,
        public ?int $excessLabelsRequired,
        public ?string $excessLabelPriceNormal,
        public ?string $excessLabelPriceFrequent,
        public ?string $excessLabelPriceNormalExgst,
        public ?string $excessLabelPriceFrequentExgst,
        public ?string $labelpriceNormal,
        public ?string $labelpriceFrequent,
        public ?string $labelpriceNormalExgst,
        public ?string $labelpriceFrequentExgst,
        public ?string $totalpriceNormal,
        public ?string $totalpriceFrequent,
        public ?float $totalpriceNormalExgst,
        public ?float $totalpriceFrequentExgst,
    ) {}

    public static function fromJson(array $json): Service
    {
        return new Service(
            $json['type'],
            $json['name'],
            $json['labelcolour'],
            $json['labelcolour_array'],
            $json['labelcolour_pretty'],
            $json['labelcolour_pretty_array'],
            $json['weightlimit'],
            $json['baseweight'],
            $json['excess_labels_required'],
            $json['excess_label_price_normal'],
            $json['excess_label_price_frequent'],
            $json['excess_label_price_normal_exgst'],
            $json['excess_label_price_frequent_exgst'],
            $json['labelprice_normal'],
            $json['labelprice_frequent'],
            $json['labelprice_normal_exgst'],
            $json['labelprice_frequent_exgst'],
            $json['totalprice_normal'],
            $json['totalprice_frequent'],
            $json['totalprice_normal_exgst'],
            $json['totalprice_frequent_exgst'],
        );
    }

    public function toJson(): array
    {
        return [
            'type' => $this->type,
            'name' => $this->name,
            'labelcolour' => $this->labelcolour,
            'labelcolour_array' => $this->labelcolourArray,
            'labelcolour_pretty' => $this->labelcolourPretty,
            'labelcolour_pretty_array' => $this->labelcolourPrettyArray,
            'weightlimit' => $this->weightlimit,
            'baseweight' => $this->baseweight,
            'excess_labels_required' => $this->excessLabelsRequired,
            'excess_label_price_normal' => $this->excessLabelPriceNormal,
            'excess_label_price_frequent' => $this->excessLabelPriceFrequent,
            'excess_label_price_normal_exgst' => $this->excessLabelPriceNormalExgst,
            'excess_label_price_frequent_exgst' => $this->excessLabelPriceFrequentExgst,
            'labelprice_normal' => $this->labelpriceNormal,
            'labelprice_frequent' => $this->labelpriceFrequent,
            'labelprice_normal_exgst' => $this->labelpriceNormalExgst,
            'labelprice_frequent_exgst' => $this->labelpriceFrequentExgst,
            'totalprice_normal' => $this->totalpriceNormal,
            'totalprice_frequent' => $this->totalpriceFrequent,
            'totalprice_normal_exgst' => $this->totalpriceNormalExgst,
            'totalprice_frequent_exgst' => $this->totalpriceFrequentExgst,
        ];
    }
}
