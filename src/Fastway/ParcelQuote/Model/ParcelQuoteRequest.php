<?php

declare(strict_types=1);

namespace Fastway\ParcelQuote\Model;

final class ParcelQuoteRequest
{
    public function __construct(
        public string $pick_up,
        public string $drop_off,
        public string $postal_code,
        public string $parcel_weight,
    ) {}
}
