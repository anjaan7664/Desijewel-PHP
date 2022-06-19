<?php
require 'includes/functions.php';
include_once 'config.php';
//Pull username, generate new ID and hash password
$newid = uniqid(time(), false);
$newuser = $_POST['newuser'];
$newpw = password_hash($_POST['password1'], PASSWORD_DEFAULT);
$pw1 = $_POST['password1'];
$pw2 = $_POST['password2'];
$sql_get_rows= mysqli_query($db_login,"SELECT username FROM members");
$sn  =  mysqli_num_rows($sql_get_rows)+1;
 

    //Enables moderator verification (overrides user self-verification emails)
if (isset($admin_email)) {

    $newemail = $admin_email;

} else {

    $newemail = $_POST['email'];

}
//Validation rules
if ($pw1 != $pw2) {

    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Password fields must match</div><div id="returnVal" style="display:none;">false</div>';

} elseif (strlen($pw1) < 6) {

    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Password must be at least 4 characters</div><div id="returnVal" style="display:none;">false</div>';

} elseif (!filter_var($newemail, FILTER_VALIDATE_EMAIL) == true) {

    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Must provide a valid email address</div><div id="returnVal" style="display:none;">false</div>';

}  elseif(preg_match('/\s/',$_POST['newuser'])){
     echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Type username without space</div><div id="returnVal" style="display:none;">false</div>';
}
  
else {
    //Validation passed
    if (isset($_POST['newuser']) && !empty(str_replace(' ', '', $_POST['newuser'])) && isset($_POST['password1']) && !empty(str_replace(' ', '', $_POST['password1']))) {

        //Tries inserting into database and add response to variable

        $a = new NewUserForm;

        $user_dir = $newuser."_".time() ;
        $response = $a->createUser($sn, $newuser, $newid, $newemail, $newpw, $user_dir);
    
        //Success
          
        if ($response == 'true') {
            
         $sql = "CREATE TABLE `$user_dir` (
                     `id` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
                     `dp` int(10) NOT NULL DEFAULT '1',
                     `path` varchar(20) NOT NULL,
                     `date` varchar(20) NOT NULL,
                     `image` varchar(100) NOT NULL,
                     `weight` varchar(100) NOT NULL,
                     `hit` int(100) NOT NULL,
                     `alt` varchar(100) NOT NULL
) ";
   $query = mysqli_query($db_user, $sql);
   
if($query){
       if (!file_exists("../uploads_user/$user_dir")) {
            mkdir("../uploads_user/$user_dir", 0755, true);
         } 
           echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Thank You . Please Contact/Whatsapp on <ul><li>7793055835</li><li>9521522736</li><li>9571790992</li></ul> to verify your account .</div><div id="returnVal" style="display:none;">true</div>';
}
          /*
            echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'. $signupthanks .'</div><div id="returnVal" style="display:none;">true</div>';

            //Send verification email
            $m = new MailSender;
            $m->sendMail($newemail, $newuser, $newid, 'Verify');  */

        } else {
            //Failure
            mySqlErrors($response);

        } 
    } else {
        //Validation error from empty form variables
        echo 'An error occurred on the form... try again';
    }
};