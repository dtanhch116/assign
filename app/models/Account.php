<?php

namespace App\Models;

class Account extends BaseModel
{
    protected $table = 'khach_hang';
    public function getValue($ten_kh)
    {
        $sql = "SELECT * FROM $this->table WHERE ten_kh = ?";
        $this->setQuery($sql);
        return $this->loadRow([$ten_kh]);
    }

    public function register($id, $ten, $pass, $email, $dia_chi, $avatar, $phone, $vaitro)
    {
        $sql = "INSERT INTO `khach_hang` VALUES ( ?, ?, ?, ?, ?, ?, ?, ?)";
        $this->setQuery($sql);
        return $this->execute([$id, $ten, $pass, $email, $dia_chi, $avatar, $phone, $vaitro]);
    }

    public function validate()
    {
        $sql = "SELECT ten_kh FROM $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
}
