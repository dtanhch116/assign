<?php

namespace App\Controllers;

use App\Models\Account;

class AccountController extends BaseController
{
    public $account;
    public function __construct()
    {
        $this->account = new Account();
    }
    public function index()
    {
        $this->render('account.login');
    }
    public function loginPost()
    {
        if (isset($_POST['btn_Login'])) {
            $ten = $_POST['tai_khoan'];
            $passPost = $_POST['pass'];
            $user = $this->account->getValue($ten);

            if ($user) {
                $pass = $user->mat_khau;
                if ($passPost == $pass) {
                    unset($_SESSION['error']);
                    $_SESSION['user'] = $ten;
                    redirect('success', 'login', 'home-page');
                    die;
                } else {
                    unset($_SESSION['user']);
                    $err = "tài khoản hoặc mật khẩu không đúng";
                    $_SESSION['error'] = $err;
                    redirect('errors', 'lỗi', 'login');
                    die;
                }
            } else {
                $err = "tài khoản hoặc mật khẩu không đúng";
                $_SESSION['error'] = $err;
                redirect('errors', 'lỗi', 'login');
                die;
            }
        }
    }

    public function register()
    {
        $this->render('account.register');
    }

    public function registerPost()
    {
        if (isset($_POST['btn_register'])) {
            $errors = [];
            $max_size = 2 * 1024 * 1024;
            $ten_kh = $_POST['ten_kh'];
            $mat_khau = $_POST['mat_khau'];
            $email = $_POST['email'];
            $dia_chi = $_POST['dia_chi'];
            $phone = $_POST['so_dien_thoai'];
            $vai_tro = "Khách Hàng";
            $validate = $this->account->validate();

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

            foreach ($validate as $value) {
                if ($ten_kh == $value->ten_kh) {
                    $errors['ten'] = "Tên đăng nhập đã tồn tại";
                    break;
                }
            }
            if (count($errors) > 0) {
                $_SESSION['errorCtm'] = [
                    'ten' => $errors['ten'],
                    'anh' => $errors['anh'],
                    'pass' => $errors['pass'],
                    'email' => $errors['email'],
                    'dia_chi' => $errors['dia_chi'],
                    'phone' => $errors['phone'],
                ];
                redirect('errors', 'Có lỗi Xảy Ra', 'register');
                die;
            } else {
                unset($_SESSION['errorCtm']);
                $this->account->register(NULL, $ten_kh, $mat_khau, $email, $dia_chi, $avatar, $phone, $vai_tro);
                // move_uploaded_file($file['tmp_name'], 'http://localhost/web17312/assignment/app/views/images/' . $file['name']);
                redirect('success', 'Đăng kí thành công xin mời đăng nhập', 'login');
                die;
            }
        }
    }

    public function logout()
    {
        unset($_SESSION['user']);
        redirect('success', 'login', 'login');
    }
}
