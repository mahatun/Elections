
<?php
session_start();

require '../models/user.php';
require '../dbconfig.php';

class LoginController
{
    private $userModel;
    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }
    public function login()
    {
        try
        {
            $user=$this->userModel->login($_POST['email'], $_POST['password']);
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
        if ($user) {
            switch ($_SESSION["role"]) {
                case 0:
                    header("location: ../views/UserDashboard.php");
                    break;
                case 1:
                    header("location: ../views/AdminDashboard.php");
                    break;
                
                }
            
        }
        else{
            header("location: ../views/authentication-login.php?error=0");
        }

    }

}


$user= new User($conn);
$loginController = new LoginController($user);
if(isset($_POST['email']))
{
    $loginController->login();
}

