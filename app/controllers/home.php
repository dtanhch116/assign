<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function home()
    {
        $this->render('layout.main');
    }
}
