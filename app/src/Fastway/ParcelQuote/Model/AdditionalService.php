<?PHP

declare(strict_types=1);

namespace Fastway\ParcelQuote\Model;

final class AdditionalService
{
    public function __construct(
        public ?string $type,
        public ?string $name,
        public ?string $labelcolour,
        public ?array $labelcolourArray,
        public ?string $labelcolourPretty,
        public ?array $labelcolourPrettyArray,
        public ?int $labelprice,
        public ?int $labelpriceNormalExgst,
    ) {}

    public static function fromJson(array $json): AdditionalService
    {
        return new AdditionalService(
            $json['type'],
            $json['name'],
            $json['labelcolour'],
            $json['labelcolour_array'],
            $json['labelcolour_pretty'],
            $json['labelcolour_pretty_array'],
            $json['labelprice'],
            $json['labelprice_normal_exgst'],
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
            'labelprice' => $this->labelprice,
            'labelprice_normal_exgst' => $this->labelpriceNormalExgst
        ];
    }
}
