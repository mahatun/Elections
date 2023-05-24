
<?php
session_start();

include '../models/user.php';
include '../dbconfig.php';

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
            $user = $this->userModel->register($_POST['user_id'], $_POST['username'], $_POST['email'], $_POST['password']);
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
        if ($user) {
            header("Location: ../views/UserDashboard.php");
        }
            
        
    
    }
}





$user= new User($conn);
$regController = new RegistrationController($user);
if(isset($_POST['email']))
{
    $regController->register();
}






?>