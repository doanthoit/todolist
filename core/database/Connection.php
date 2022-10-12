<?php

namespace app\core\database;
use \PDO;

class Connection
{
    /**
     * Make connect database
     * @param array $config
     * @return PDO|void
     */
    public static function make(array $config)
    {
        try {
            return new PDO(
                "{$config['DB_CONNECTION']}:dbname={$config['DB_DATABASE']};host={$config['DB_HOST']}",
                $config['DB_USERNAME'],
                $config['DB_PASSWORD']
            );
        } catch (Exception $e) {
            var_dump($e->getMessage());
            exit();
        }
    }
}