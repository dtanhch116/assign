<?php

namespace App\Models;

class Product extends BaseModel
{
    protected $table = "san_pham";
    public function show()
    {
        $sql = "SELECT * FROM $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function queryOne($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id_sp = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }



    public function add($id, $ten_sp, $don_gia, $anh_sp, $ngay_nhap, $id_loai)
    {
        $sql = "INSERT INTO $this->table VALUES (?,?,?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id, $ten_sp, $don_gia, $anh_sp, $ngay_nhap, $id_loai]);
    }

    public function edit($id, $ten_sp, $don_gia, $anh_sp, $ngay_nhap, $id_loai, $id_get)
    {
        $sql = "UPDATE `san_pham` SET `id_sp`=?,`ten_sp`=?,`don_gia`=?,`anh_sp`=?,`ngay_nhap`=?,`id_loai`=? WHERE id_sp = ?";
        $this->setQuery($sql);
        return $this->execute([$id, $ten_sp, $don_gia, $anh_sp, $ngay_nhap, $id_loai, $id_get]);
    }

    public function delete($id)
    {

        $sql = "DELETE FROM $this->table WHERE id_sp = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
}
