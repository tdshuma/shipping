<?php

declare(strict_types=1);

namespace Fastway\ParcelTracking\Model;

final class ParcelTracking
{
    public function __construct(public string $parcelNumber) {}
}
