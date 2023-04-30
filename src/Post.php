<?php 

include "config/bootstrap.php";

class Post extends P{
    public static $pdo;

    


    public function addPost($title, $image, $descr, $type){
        // clear data 
        $title=$this->$this->clearData($title);
        $image=$this->clearData($image);
        $descr=$this->clearData($descr);
        $type=$this->clearData($type);
        echo $descr;
        // write sql query
        $query="INSERT INTO posts (title, image, descr, type) VALUES (:title, :image, :descr, :type)";
        $stmt=self::$pdo->prepare($query);
        $stmt->execute([
            'title'=>$title,
            'image'=>$image,
            'descr'=>$descr,
            'type'=>$type,
        ]);

        return true;
    }

    // update post

    public function updatePost($id, $title, $image, $descr, $type){
        // clear data
        $id=$this->clearData($id);
        $title=$this->clearData($title);
        $image=$this->clearData($image);
        $descr=$this->clearData($descr);
        $type=$this->clearData($type);
        // query code
        $query = 'UPDATE ' . 'posts' . '
                          SET title = :title, image = :image, descr = :descr, type = :type 
                          WHERE id = :id';
        $stmt = self::$pdo->prepare($query);
        // bint parametrs
        $stmt->bindParam(':title', $title);
    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':descr', $descr);
    $stmt->bindParam(':type', $type);
    $stmt->bindParam(':id', $id);
    // res echo
    $stmt->execute([
        "title"=>$title,
        "image"=>$image,
        "descr"=>$descr,
        "type"=>$type,
        "id"=>$id
    ]);


    }

}