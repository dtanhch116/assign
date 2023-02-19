<?php

namespace App\Controllers;

use App\Models\Customer;

class CustomerController extends BaseController
{
    public $custommer;
    public function __construct()
    {
        $this->custommer = new Customer();
    }

    public function index()
    {
        $loadAll = $this->custommer->getAll();
        $this->render('customer.index', compact("loadAll"));
    }

    public function addCustomer()
    {
        $this->render('customer.add');
    }

    public function addCustomerPost()
    {
        if (isset($_POST['btn_addCustomer'])) {
            $errors = [];
            $max_size = 2 * 1024 * 1024;
            $ten_kh = $_POST['ten_kh'];
            $mat_khau = $_POST['mat_khau'];
            $email = $_POST['email'];
            $dia_chi = $_POST['dia_chi'];
            $phone = $_POST['so_dien_thoai'];
            $vai_tro = $_POST['vai_tro'];
            if ($_FILES['avatar']['size'] > 0) {

                $avatar = $_FILES['avatar']['name'];
                $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
                if ($ext != "png" && $ext != "jpg" && $ext != "gif") {

                    $errors['anh'] = "Ảnh không đúng định dạng";
                }
                if ($_FILES['avatar']['size'] > $max_size) {
                    $errors['anh'] = "Ảnh vượt quá dung lượng cho phép 2 MB";
                }
            } else {
                $errors['anh'] = "Chưa có ảnh";
            }

            if ($ten_kh == "") {
                $errors['ten'] = "bạn chưa nhập tên";
            }
            if ($mat_khau == "") {
                $errors['pass'] = "bạn chưa nhập Mật khẩu";
            }
            if ($email == "") {
                $errors['email'] = "chưa có email";
            }
            if ($dia_chi == "") {
                $errors['dia_chi'] = "chưa có Địa chỉ";
            }
            if ($phone == "") {
                $errors['phone'] = "chưa có Số điện thoại";
            }
            if ($vai_tro == "") {
                $errors['vai_tro'] = "chưa có Vai trò";
            }

            if (count($errors) > 0) {
                $_SESSION['errorCtm'] = [
                    'ten' => $errors['ten'],
                    'anh' => $errors['anh'],
                    'pass' => $errors['pass'],
                    'email' => $errors['email'],
                    'dia_chi' => $errors['dia_chi'],
                    'phone' => $errors['phone'],
                    'vai_tro' => $errors['vai_tro'],
                ];
                redirect('errors', 'Có lỗi Xảy Ra', 'add_customer');
                die;
            } else {
                unset($_SESSION['errorCtm']);
                $this->custommer->add(NULL, $ten_kh, $mat_khau, $email, $dia_chi, $avatar, $phone, $vai_tro);
                // move_uploaded_file($file['tmp_name'], 'http://localhost/web17312/assignment/app/views/images/' . $file['name']);
                redirect('success', 'Thêm thành công', 'customer');
                die;
            }
        }
    }

    public function editCustomer($id)
    {
        if (isset($_SESSION['errorCtm'])) echo "có session";
        $customer = $this->custommer->getDetailCtm($id);
        // var_dump($customer);
        // die;
        $this->render('customer.edit', compact('customer'));
    }

    public function editCustomerPost($id)
    {
        if (isset($_POST['btn_editCustomer'])) {
            $errors = [];
            $max_size = 2 * 1024 * 1024;
            $ten_kh = $_POST['ten_kh'];
            $mat_khau = $_POST['mat_khau'];
            $email = $_POST['email'];
            $dia_chi = $_POST['dia_chi'];
            $phone = $_POST['so_dien_thoai'];
            $vai_tro = $_POST['vai_tro'];



            if ($_FILES['avatar']['size'] > 0) {
                $avatar = $_FILES['avatar']['name'];
                $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
                if ($ext != "png" && $ext != "jpg" && $ext != "gif") {
                    echo "con cặc";
                    $errors['anh'] = "Ảnh không đúng định dạng";
                }
                if ($_FILES['avatar']['size'] > $max_size) {
                    $errors['anh'] = "Ảnh vượt quá dung lượng cho phép 2 MB";
                }
            } else {
                $avatar = $_POST['avatarDetail'];
            }

            if ($ten_kh == "") {
                $errors['ten'] = "bạn chưa nhập tên";
            }
            if ($mat_khau == "") {
                $errors['pass'] = "bạn chưa nhập Mật khẩu";
            }
            if ($email == "") {
                $errors['email'] = "chưa có email";
            }
            if ($dia_chi == "") {
                $errors['dia_chi'] = "chưa có Địa chỉ";
            }
            if ($phone == "") {
                $errors['phone'] = "chưa có Số điện thoại";
            }
            if ($vai_tro == "") {
                $errors['vai_tro'] = "chưa có Vai trò";
            }

            // echo "hihi";
            // die;
            if (count($errors) > 0) {
                $_SESSION['errorCtm'] = [
                    'ten' => $errors['ten'],
                    'anh' => $errors['anh'],
                    'pass' => $errors['pass'],
                    'email' => $errors['email'],
                    'dia_chi' => $errors['dia_chi'],
                    'phone' => $errors['phone'],
                    'vai_tro' => $errors['vai_tro'],
                ];
                redirect('errors', 'Có lỗi Xảy Ra', 'edit_customer/' . $id);
                die;
            } else {
                unset($_SESSION['errorCtm']);
            }
            if (empty($errors)) {
                $result = $this->custommer->editCtm($id, $ten_kh, $mat_khau, $email, $dia_chi, $avatar, $phone, $vai_tro);
                // move_uploaded_file($file['tmp_name'], 'http://localhost/web17312/assignment/app/views/images/' . $file['name']);
                if ($result) {
                    redirect('success', 'Update thành công', 'customer');
                    die;
                }
            }
        }
    }

    public function deleteCustomer($id)
    {

        $this->custommer->delete($id);
        // header("location: " . url('customer'));
        redirect('success', "xóa thành công", "customer");
    }
}
