<?php

namespace App\Models;

class Customer extends BaseModel
{
    protected $table = "khach_hang";

    public function getAll()
    {
        $sql = "SELECT * FROM $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function add($id, $ten, $pass, $email, $address, $avatar, $phone, $role)
    {
        $sql = "INSERT INTO $this->table VALUES (? ,? ,? ,? ,? ,? ,? ,? )";
        $this->setQuery($sql);
        return $this->execute([$id, $ten, $pass, $email, $address, $avatar, $phone, $role]);
    }

    public function getDetailCtm($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id_kh = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }

    public function editCtm($id, $ten, $mat_khau, $email, $dia_chi, $avatar, $phone, $vai_tro)
    {
        $sql = "UPDATE $this->table SET `ten_kh`= ?,`mat_khau`= ?,`email`= ?,`dia_chi`= ?,`avatar`= ?,`so_dien_thoai`= ?,`vai_tro`= ? WHERE id_kh = ?";
        $this->setQuery($sql);
        return $this->execute([$ten, $mat_khau, $email, $dia_chi, $avatar, $phone, $vai_tro, $id]);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM $this->table WHERE id_kh = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
}
