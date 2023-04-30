<?php

include "config/bootstrap.php";

class Teams extends P{
    public static $pdo;
    

    public function addTeam($data){
        $name=$data["name"];
        $image=$data["image"];
        $liga_id=$data["liga_id"];
        $liga_name=$data["liga_name"];
        $score=$data["score"];
        $plays=$data["plays"];

        $query="INSERT INTO teams (name, image, liga_id, liga_name, score, plays) VALUE (:name, :image, :liga_id, :liga_name, :score, :plays)";
        $stmt=self::$pdo->prepare($query);
        $stmt->execute([
            "name"=>$name,
            "image"=>$image,
            "liga_id"=>$liga_id,
            "liga_name"=>$liga_name,
            "score"=>$score,
            "plays"=>$plays,
        ]);
    }

    


}