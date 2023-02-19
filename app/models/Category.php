<?php

namespace App\Models;

class Category extends BaseModel
{
    protected $table = 'loai';
    public function show()
    {
        $sql = "SELECT * FROM $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function getDetailCate($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id_loai = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
    public function add($id, $name)
    {
        $sql = "INSERT INTO $this->table VALUES (?,?)";
        $this->setQuery($sql);
        return $this->execute([$id, $name]);
    }

    public function edit($id, $ten)
    {
        $sql = "UPDATE $this->table SET `ten_loai`=? WHERE id_loai = ?";
        $this->setQuery($sql);
        return $this->execute([$ten, $id]);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM $this->table WHERE id_loai =?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
}
