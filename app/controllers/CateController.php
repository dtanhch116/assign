<?php

namespace App\Controllers;

use App\Models\Category;

class CateController extends BaseController
{
    public $category;
    public function __construct()
    {
        $this->category = new Category();
    }

    public function index()
    {
        $queryAll = $this->category->show();
        $this->render('category.index', compact('queryAll'));
    }

    public function addCate()
    {
        // unset($_SESSION['errorDetail']);
        $this->render('category.add');
    }

    public function addCatePost()
    {
        if (isset($_POST['btn_addCate'])) {
            if ($_POST['ten_loai'] == "") {
                $error = "Tên loại không được để trống";
            }
            if (isset($error)) {
                $_SESSION['errorDetail'] = $error;
                redirect('errors', 'có lỗi xảy ra', 'add_Cate');
                die;
            } else {
                unset($_SESSION['errorDetail']);
            }

            $this->category->add(NULL, $_POST['ten_loai']);
            redirect('success', 'Thêm thành công', 'categoris');
            die;
        }
    }

    public function editCate($id)
    {

        $valueDetail = $this->category->getDetailCate($id);
        $this->render('category.edit', compact('valueDetail'));
        die;
    }

    public function editCatePost($id)
    {
        if (isset($_POST['btn_editCate'])) {
            $this->category->edit($id, $_POST['ten_loai']);
            redirect('success', 'Update Thành Công', 'categoris');
            die;
        }
    }

    public function deleteCate($id)
    {
        $this->category->delete($id);
        redirect('success', 'Xóa thành công', 'categoris');
        die;
    }
}
