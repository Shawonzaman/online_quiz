<?php

class Sign_up {
    //put your code here
    public function save_user_information($data){
        $user_name = $data['user_name'];
        $user_email = $data['user_email'];
        $user_password = $data['user_password'];
        
        $sql = "INSERT INTO tbl_user (user_name,user_email,user_password) VALUES ('$user_name','$user_email','$user_password')";
        if(!$sql){
            die('mysql error:'.mysql_errno());
        }
        else{
            mysql_query($sql);
//            $msg = "Registration Successfully Done";
            header("Location:index.php");
        }
    }
    public function check_user_login_information($data){
        $user_email = $data['chkEmail'];
        $user_password = $data['chkPassword'];
        
         $sql = "SELECT *
                FROM tbl_user
                WHERE user_email = '$user_email' AND user_password = '$user_password'";
        $query_result = mysql_query($sql);
        $result = mysql_fetch_assoc($query_result);
      
        if ($result == NULL) {
            $_SESSION['message'] = '<span style="color:red;">Invalid Email and Password</span>';
        } else {
            $_SESSION['sess_user_admin_login_id'] = session_id();
            $_SESSION['result'] = $result;
           $user_type = $_SESSION['result']['user_type'] ;
            if($user_type == 1){
            header("Location:deshbord.php");
            }
            if($user_type == 2){
            header("Location:admin_deshbord.php");
            }
        }
    }
}

