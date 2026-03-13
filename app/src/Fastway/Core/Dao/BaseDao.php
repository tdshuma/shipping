<?php

declare(strict_types=1);

namespace Fastway\Core\Dao;

class BaseDao
{
    public function __construct() {}

    public function saveData(string $key, object $value) {}

    public function getData(string $key) {}
}
