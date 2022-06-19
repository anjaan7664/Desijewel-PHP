<?php
include_once '../../script/database_user.php';
include_once '../../script/database.php';
include_once "../login/init.php";
 
 if (isset($_POST['acc'])) {
        
        if (is_admin_check($_POST['acc']) <= 1){
        // Get User Input from form and set is as Variable
        $user_name = trim($_POST['acc']);
        $user_name = strip_tags($user_name);
        $user_name = strip_tags($user_name);

        if (email_exists($user_name) === true) {
            $sql = mysqli_query($db_login, "UPDATE members
         SET verified = '1' WHERE email='$user_name';");
            if ($sql) {
                echo "Account Activated";
            }
        }

        elseif (user_exists($user_name) === true) {
            $sql = mysqli_query($db_login, "UPDATE members
         SET verified = '1' WHERE username='$user_name';");
            if ($sql) {
                echo "Account Activated";
            }
        }else {
            echo "User does'nt exist .";
        };
        
        }
        else {
        echo "Account is already active.";
        }
        }
        
elseif (isset($_POST['acc_cc'])) {
    
        if (is_admin_check($_POST['acc_cc']) <= 1) {
        // Variable for making a user Admin/Content_Creator
        $user_name_cc = trim($_POST['acc_cc']);
        $user_name_cc = htmlspecialchars($user_name_cc);
        $user_name_cc = htmlspecialchars($user_name_cc);
        if (email_exists($user_name_cc) === true) {
            $sql = mysqli_query($db_login, "UPDATE members
         SET verified = '2' WHERE email='$user_name_cc';");
            if ($sql) {
                echo "Username Is Admin Now";
            }
        } elseif (user_exists($user_name_cc) === true) {
            $sql = mysqli_query($db_login, "UPDATE members
         SET verified = '2' WHERE username='$user_name_cc';");
            if ($sql) {
                echo "User Is Admin Now";
            }
        }
          else {
            echo "User does'nt exist .";
        };
        }else {
        echo "User is already Admin";
    }
    }

elseif (isset($_POST['acc_username']) && !empty($_POST['acc_password'])) {
    
        // Variable for setting password
        $acc_username = $_POST['acc_username'] ;
        $acc_password = password_hash($_POST['acc_password'], PASSWORD_DEFAULT);
        if (email_exists($acc_username) === true) {
            $sql = mysqli_query($db_login, "UPDATE members
         SET password = '$acc_password' WHERE email='$acc_username';");
            if ($sql) {
                echo "Username Is Admin Now";
            }
        } elseif (user_exists($acc_username) === true) {
            $sql = mysqli_query($db_login, "UPDATE members
         SET password = '$acc_password' WHERE username='$acc_username';");
            if ($sql) {
                echo "Password Set";
            }
        }
          else {
            echo "User does'nt exist .";
        };
       
    }


?>