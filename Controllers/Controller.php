<?php

class Home
{
    public function __construct()
    {
        $action = filter_input(INPUT_POST, 'action') ?? filter_input(INPUT_GET, 'action') ?? 'index';
        switch ($action) {
            case 'index':
                $this->index();
                break;
            case 'service':
                $this->service();
                break;
            default:
                echo 'Method Invalid';
                break;
        }
    }

    public function index()
    {
        if (isset($_SESSION['username'])){
            header('location: /upfb/user');
        }else{
            include('Views/home.php');
        }
    }

    public function service()
    {
        if (isset($_SESSION['username'])){
            header('location: /upfb/user');
        }else{
            include('Views/service.php');
        }
    }

}
