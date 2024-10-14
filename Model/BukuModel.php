<?php

include('Model/Model.php');

class Buku extends Model
{
    private $id;
    private $judul_buku;
    private $penerbit;
    private $pengarang;

    protected $table = 'buku';

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        return $this->id = $id;
    }

    public function getJudul_buku()
    {
        return $this->judul_buku;
    }

    public function setJudul_buku($judul_buku)
    {
        return $this->judul_buku = $judul_buku;
    }

    public function getpenerbit()
    {
        return $this->penerbit;
    }

    public function setpenerbit($penerbit)
    {
        return $this->penerbit = $penerbit;
    }

    public function getpengarang()
    {
        return $this->pengarang;
    }

    public function setpengarang($pengarang)
    {
        return $this->pengarang = $pengarang;
    }

    public function create($data)
    {
        $query = "INSERT INTO $this->table (judul_buku, penerbit, pengarang) VALUES (:judul_buku, :penerbit, :pengarang)";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':judul_buku', $data['judul_buku']);
        $stmt->bindParam(':penerbit', $data['penerbit']);
        $stmt->bindParam(':pengarang', $data['pengarang']);
        return $stmt->execute();
    }

    public function read()
    {
        $query = "SELECT * FROM $this->table";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function show($id)
    {
        $query = "SELECT * FROM $this->table WHERE id = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $data)
    {
        $query = "UPDATE $this->table SET judul_buku = :judul_buku, penerbit = :penerbit, pengarang = :pengarang WHERE id = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':judul_buku', $data['judul_buku']);
        $stmt->bindParam(':penerbit', $data['penerbit']);
        $stmt->bindParam(':pengarang', $data['pengarang']);
        return $stmt->execute();
    }

    public function delete($id)
    {
        $query = "DELETE FROM $this->table WHERE id = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
