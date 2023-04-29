<?php

include_once "config/bootstrap.php";

class Userauthentication{
    public static $pdo;


    // get all products
    public function getUsers(){
        $stmt=self::$pdo->prepare("SELECT * FROM Users");
        $stmt->setFetchMode(PDO::FETCH_CLASS, "Userauthentication");
        $stmt->execute();
        $users=$stmt->fetchAll();
        return $users;
    }

    // clear data
    private function clearData($data){
        return htmlspecialchars(strip_tags($data));
    }

    // check user 
    private function checkUser($useremail){
        $users=$this->getUsers();
        foreach($users as $user){
            if($user->useremail===$useremail){
                return false;
            }else{
                return true;
            }

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


}