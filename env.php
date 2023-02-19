<?php
const DBNAME = "assign_php2";
const DBUSER = "root";
const DBPASS = "";
const DBCHARSET = "utf8";
const DBHOST = "127.0.0.1";
const BASE_URL = "http://localhost/web17312/assignment/";

function url($url)
{
    return BASE_URL . $url;
}

function redirect($key, $msg, $route)
{
    $_SESSION[$key] = $msg;
    switch ($key) {
        case "errors":
            unset($_SESSION['success']);
            break;
        case "success":
            unset($_SESSION['errors']);
            break;
    }
    header("location: " . url($route) . "?msg=" . $key);
}
