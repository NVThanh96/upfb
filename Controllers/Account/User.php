<?php

class User
{
    public function __construct()
    {
        $action = filter_input(INPUT_POST, 'action') ?? filter_input(INPUT_GET, 'action') ?? 'index';
        switch ($action) {
            case 'index':
                $this->index();
                break;
            default:
                echo 'Method Invalid';
                break;
        }
    }

    public function index(){
        try {
            if (isset($_SESSION['username'])){
                include('Views/account/user/index.php');
            }else{
                header('location: /upfb/');
            }
        }catch (Exception $e){
            echo "have error" . $e->getMessage();
        }
    }
}
