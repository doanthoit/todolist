<?php

namespace app\core\database;
use \PDO;

class QueryBuilder
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * Find fist data
     * @param string $table
     * @param string|null $fetchClass
     * @param $id
     * @return array|false
     */
    public function first(string $table, string $fetchClass=null, $id=0)
    {
        $query = $this->db->prepare("select * from {$table} where id = {$id};");
        $query->execute();
        
        if ($fetchClass) {
            return $query->fetchAll(PDO::FETCH_CLASS, $fetchClass);
        }

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Fetch all data
     * @param string $table
     * @param string|null $fetchClass
     * @param string|null $order
     * @return array|false
     */
    public function selectAll(string $table, string $fetchClass=null, string $order=null)
    {
        $query = $this->db->prepare("select * from {$table} {$order};");
        $query->execute();

        if ($fetchClass) {
            return $query->fetchAll(PDO::FETCH_CLASS, $fetchClass);
        }

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Insert data
     * @param string $table
     * @param array $parameters
     * @return void
     */
    public function insert(string $table, array $parameters)
    {
        $sql = sprintf(
                "INSERT INTO %s (%s) VALUES (%s)",
                $table,
                implode(', ', array_keys($parameters)),
                ':' . implode(', :', array_keys($parameters))
        );
        $query = $this->db->prepare($sql);
        $query->execute($parameters);
    }

    /**
     * Update data
     * @param string $table
     * @param array $parameters
     * @param $id
     * @return void
     */
    public function update(string $table, array $parameters, $id=0)
    {
        $str = '';
        foreach (array_keys($parameters) as $key => $value) {
            $str .= $value.'=:'.$value;
            if ($key!=count(array_keys($parameters))-1) {
                $str .= ', ';
            }
        }

        $sql = sprintf(
                "UPDATE %s SET %s WHERE id={$id}",
                $table,
                $str
        );
        $query = $this->db->prepare($sql);
        $query->execute($parameters);
    }

    /**
     * Delete data
     * @param string $table
     * @param $id
     * @return void
     */
    public function delete(string $table, $id=0)
    {
        $stmt = $this->db->prepare( "DELETE FROM {$table} WHERE id =:id" );
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}