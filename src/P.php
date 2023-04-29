<?php


include_once "config/bootstrap.php";

 class P{
    public static $pdo;

    // clear all type data
    public function clearData($data){
        return htmlspecialchars(strip_tags($data));
    }
    // get all data
    public function getAllData($table, $className){
        $stmt=self::$pdo->prepare("SELECT * FROM $table");
        $stmt->setFetchMode(PDO::FETCH_CLASS, "$className");
        $stmt->execute();
        $data=$stmt->fetchAll();
        return $data;
    }

    // get one data 
    public function getOneData($id, $table, $className){
        $stmt=self::$pdo->prepare("SELECT * FROM $table WHERE id=$id");
        $stmt->setFetchMode(PDO::FETCH_CLASS, "$className");
        $stmt->execute();  
        $data=$stmt->fetchAll();
        return $data;
    }

    // delete data
    public function removeData($id, $table){
        // clear data 
        $id=$this->clearData($id);
        $table=$this->clearData($table);
        // query code
        echo $idm=1;
        $query="DELETE FROM $table WHERE id = :id";
        // prepare
        $stmt = self::$pdo->prepare($query);
        // bind param
        $stmt->bindParam(':id', $id);

         // Execute query
         if($stmt->execute()) {
            /* Return number of rows that were deleted */
print("Return number of rows that were deleted:\n");
$count = $stmt->rowCount();
print("Deleted $count rows.\n");
          return 1;
        }


    }
}