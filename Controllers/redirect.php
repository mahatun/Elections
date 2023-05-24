<?php
	if(!isset($_SESSION))
	{
		session_start();
	}

    if (isset($_SESSION['role'])) {
        if ($_SESSION['is_admin'] == 0) {
            header('Location: UserDashboard.php');
        } else if ($_SESSION['is_admin'] == 1) {
            header('Location: AdminDashboard.php');
        }
    } else {
        header('Location: authentication-login.php');
    }

?>