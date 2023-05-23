<?php
session_start();

include 'user.php';
include 'conn.php';

class RegistrationController
{
    private $userModel;
    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }
    public function register()
    {
        try{
            $user = $this->userModel->register($_POST['id'], $_POST['username'], $_POST['email'], $_POST['password'],$_POST['is_admin']);
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
        if ($user) {
            switch ($_POST["is_admin"]) {
                case 0:
                    header("location: /UserDashboard.php");
                    break;
                case 1:
                    header("location: /AdminDashboard.php");
                    break;
                
            }
        } else{
            header("Location: /index.php?error=1");
        }
    }
}









?>