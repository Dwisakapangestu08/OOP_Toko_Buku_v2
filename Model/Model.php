<?php

include('Model/CRUDInterface.php');

abstract class Model implements CRUDInterface
{
    protected $connection;
    protected $table;

    public function __construct($db)
    {
        $this->connection = $db;
    }

    abstract public function create($data);
    abstract public function read();
    abstract public function update($id, $data);
    abstract public function delete($id);
}
