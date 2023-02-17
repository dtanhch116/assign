<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\Product;

class ProductController extends BaseController
{
    public $products;
    public $category;
    public function __construct()
    {
        $this->category = new Category();
        $this->products = new Product();
    }
    public function index()
    {
        $product = $this->products->show();

        $this->render('product.index', compact('product'));
    }


    public function addProduct()
    {
        $dataLoai = $this->category->show();
        $this->render('product.add', compact('dataLoai'));
    }


    public function addProductPost()
    {
        if (isset($_POST['btn_addProduct'])) {

            $errors = [];
            $ten_sp = $_POST['ten_sp'];
            $don_gia = $_POST['don_gia'];
            $ngay_nhap = $_POST['ngay_nhap'];
            $id_loai = $_POST['id_loai'];
            $file = $_FILES['anh_sp'];

            $max_size = 2 * 1024 * 1024;
            if ($file['size'] > 0) {
                $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
                if ($ext != 'png' && $ext != 'jpg' && $ext != 'png') {
                    $errors['anh'] = "Ảnh không đúng định dạng";
                }
                if ($file['size'] > $max_size) {
                    $errors['anh'] = "ảnh vượt quá dung lượng 2MB";
                }
                $anh_sp = $file['name'];
            } else {
                $errors['anh'] = "Bạn chưa nhập ảnh";
            }
            if ($ten_sp == "") {
                $errors['ten'] = "bạn chưa nhập tên";
            }
            if ($don_gia == "") {
                $errors['tien'] = "bạn chưa nhập giá tiền";
            } elseif ($don_gia < 0) {
                $errors['tien'] = "Giá tiền phải lớn hơn hoặc bằng 0";
            }
            if ($ngay_nhap == "") {
                $errors['ngay_nhap'] = "chưa có ngày nhập hàng";
            }

            if (count($errors) > 0) {
                $_SESSION['anh'] = $errors['anh'];
                $_SESSION['ten'] = $errors['ten'];
                $_SESSION['tien'] = $errors['tien'];
                $_SESSION['ngay_nhap'] = $errors['ngay_nhap'];

                header("location:" . url('add_sp'));
                die;
            }

            if (empty($errors)) {
                echo "hihi";
                $this->products->add(NULL, $ten_sp, $don_gia, $anh_sp, $ngay_nhap, $id_loai);
                // move_uploaded_file($file['tmp_name'], 'http://localhost/web17312/assignment/app/views/images/' . $file['name']);
                header("location: " . url("quan-li-san-pham"));
                die;
            }
        }
    }


    public function editProduct($id)
    {
        $valueDetailProduct = $this->products->queryOne($id);
        $valueDetailCategory = $this->category->show();
        $this->render('product.edit', compact('valueDetailProduct', 'valueDetailCategory'));
    }


    public function editProductPost()
    {
        echo 123;
        die;
    }



    public function deleteProduct($id)
    {
        $this->products->delete($id);
        header("location: " . url('quan-li-san-pham'));
    }
}
