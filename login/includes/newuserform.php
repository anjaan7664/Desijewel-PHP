<?php
class NewUserForm extends DbConn
{
    public function createUser($sn, $usr, $uid, $email, $pw ,$user_dir  )
    {
        try {

            $db = new DbConn;
            $tbl_members = $db->tbl_members;
            // prepare sql and bind parameters
            $stmt = $db->conn->prepare("INSERT INTO ".$tbl_members." (sn ,id, username, password, email, user_table, storage)
            VALUES (:sn, :id, :username, :password, :email, :user_table, :storage)");
            $stmt->bindParam(':sn', $sn);
            $stmt->bindParam(':id', $uid);
            $stmt->bindParam(':username', $usr);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $pw);
            $stmt->bindParam(':user_table', $user_dir);
            $stmt->bindParam(':storage', $user_dir);
            $stmt->execute();

            $err = '';

        } catch (PDOException $e) {

            $err = "Error: " . $e->getMessage();

        }
        //Determines returned value ('true' or error code)
        if ($err == '') {

            $success = 'true';

        } else {

            $success = $err;

        };

        return $success;

    }
}
