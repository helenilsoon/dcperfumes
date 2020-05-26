<?php

use App\Models\Template;
class DashboardController
{

    public function index()
    {
        $pasta = 'App/Views';
        $arquivo= 'dash.html';
        $paraments=[];
        echo Template::CarregarTemplate($pasta,$arquivo,$paraments);
    }
    public function logout()
    {
        unset($_SESSION['user']);
        session_destroy();
        header('location: /');
    }
}