<?php

include_once "config/bootstrap.php";

class Userauthentication extends P{
    public static $pdo;


    

    // clear data
   

    // check user 
    private function checkUser($useremail){
        $users=$this->getAllData("Users", "Userauthentication");
        foreach($users as $user){
            if($user->useremail==$useremail){
                return false;
            }
            return false;

        }
        return "success";
    }
    public  function addUser($useremail, $userpassword){
        // check email 
        if (!filter_var($useremail, FILTER_VALIDATE_EMAIL)){
            return "this not email";
        } 

        // run clear data
        $useremail=$this->clearData($useremail);
        $userpassword=$this->clearData($userpassword);

        if($this->checkUser($useremail)){
            $query=self::$pdo->prepare("INSERT INTO Users ( useremail, userpassword) VALUES (:useremail, :userpassword)");
                $query->execute([
                    'useremail'=>$useremail,
                    'userpassword'=>$userpassword
                ]);
                
       return "success";
        }else{
            return "$useremail email already exists";
        }
        
    }


    // update users
    // 


}