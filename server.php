<?php

//start session in server side
session_start();

//create CSRF key token
if(empty($_SESSION['key']))

{

    $_SESSION['key']=bin2hex(random_bytes(32));
    
}


$token = hash_hmac('sha256',"This is token value of index.php ",$_SESSION['key']);

$_SESSION['CSRF'] = $token; 
//store CSRF key token with in session variable

ob_start(); 

echo $token;


if(isset($_POST['sbmt']))

{

    ob_end_clean(); 
    //End of Outer Buffer function
    
    
    loginvalidate($_POST['CSR'],$_COOKIE['session_id'],$_POST['user_name'],$_POST['user_pswd']);
    //log validation
    
}




function loginvalidate($user_CSRF,$user_sessionID, $username, $password)
// This function used to validate the Login

{

    if($username=="malik" && $password=="malik123" && $user_CSRF==$_SESSION['CSRF'] && $user_sessionID==session_id())

    {

        echo "<script> alert('you are successfully logged in') </script>";
        echo " Welcome :) "."<br/>"; 
        apc_delete('CSRF_token');

    }

    else

    {

        echo "<script> alert('Sorry Login Failed..!') </script>";
        echo " Sorry Login Failed..! "."<br/>"." Authorization failed please reset..!! ";
        
    }

}


?>