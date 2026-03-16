<?php

declare(strict_types=1);

namespace Fastway\Core\Dao;

use DateTime;
use SQLite3;

class BaseDao
{
    public function __construct(public SQLite3 $db) {}

    public function saveData(string $key, array $value): bool
    {
        $time = new DateTime()->format('d/m/Y H:i:s');
        $value = json_encode($value);
        return $this->db->exec("INSERT INTO cache_storage(id, time, key, data) VALUES(NULL, '{$time}', '{$key}', '{$value}');");
    }

    public function getData(string $key): array
    {
        $results = $this->db->query("SELECT * FROM cache_storage WHERE key='{$key}' ORDER BY id DESC LIMIT 1;");
        $data = (array)$results->fetchAll()[0];
        return (array)json_decode($data[3]);
    }
}
