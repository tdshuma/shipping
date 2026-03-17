<?php

declare(strict_types=1);

namespace Fastway\Core\Dao;

use DateTime;
use SQLite3;

class BaseDao
{
    public SQLite3 $db;

    public function __construct()
    {
        $this->db = new SQLite3('../fastway.db');
    }

    public function saveData(string $key, array $value): bool
    {
        try {
            $time = new DateTime()->format('d/m/Y H:i:s');
            $value = json_encode($value);
            return $this->db->exec("INSERT INTO cache_storage(id, time, key, data) VALUES(NULL, '{$time}', '{$key}', '{$value}');");
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getData(string $key): array
    {
        try {
            $results = $this->db->query("SELECT * FROM cache_storage WHERE key='{$key}' ORDER BY id DESC LIMIT 1;");
            $data = (array)$results->fetchAll();
            $data = count($data) >= 1 ? $data[0] : $data;
            return (array)json_decode($data[3]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
