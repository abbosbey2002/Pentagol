<?php

include_once "config/bootstrap.php";

    class Game{

        public static $pdo;
        
        // add games
        public function addGame($data){
            // clear data 
            $clear=new P();
            $data['liga_name']=$clear->clearData($data["liga_name"]);
            $data['liga_id']=$clear->clearData($data["liga_id"]);
             $data['firstTeam']=$clear->clearData($data["firstTeam"]);
             $data['secondTeam']=$clear->clearData($data["secondTeam"]);
             $data['image1']=$clear->clearData($data["image1"]);
             $data['image2']=$clear->clearData($data["image2"]);
             $data['score1']=$clear->clearData($data["score1"]);
             $data['score2']=$clear->clearData($data["score2"]);
             $data['games1']=$clear->clearData($data["games1"]);
             $data['games2']=$clear->clearData($data["games2"]);
             $data['goal1']=$clear->clearData($data["goal1"]);
             $data['goal2']=$clear->clearData($data["goal2"]);
             $time=$clear->clearData($data['time']); 
             $formatted_time = date('Y-m-d H:i:s', strtotime($time));
             echo $formatted_time;
            $query="INSERT INTO games (liga_name, liga_id, firstTeam, secondTeam, image1, image2, score1, score2, games1, games2, goal1, goal2, time)
                                VALUE (:liga_name, :liga_id, :firstTeam, :secondTeam, :image1, :image2, :score1, :score2, :games1, :games2, :goal1, :goal2, :time)";
             $stmt=self::$pdo->prepare($query);
             $stmt->execute([
                'liga_name'=>$data['liga_name'],
                'liga_id'=>$data['liga_id'],
                'firstTeam'=>$data['firstTeam'],
                'secondTeam'=>$data['secondTeam'],
                'image1'=>$data['secondTeam'],
                'image2'=>$data['secondTeam'],
                'score1'=>$data['score1'],
                'score2'=>$data['score2'],
                'games1'=>$data['games1'],
                'games2'=>$data['games2'],
                'goal1'=>$data['goal1'],
                'goal2'=>$data['goal2'],
                'time'=>$formatted_time
            ]);
        }

        // update games
        public function updateGame($id, $data){
            // clear data 
            $clear=new P();

            $liga_name=$clear->clearData($data["liga_name"]);
            $liga_id=$clear->clearData($data["liga_id"]);
             $firstTeam=$clear->clearData($data["firstTeam"]);
             $secondTeam=$clear->clearData($data["secondTeam"]);
             $image1=$clear->clearData($data["image1"]);
             $image2=$clear->clearData($data["image2"]);
             $score1=$clear->clearData($data["score1"]);
             $score2=$clear->clearData($data["score2"]);
             $games1=$clear->clearData($data["games1"]);
             $games2=$clear->clearData($data["games2"]);
             $goal1=$clear->clearData($data["goal1"]);
             $goal2=$clear->clearData($data["goal2"]);
             $time=$clear->clearData($data['time']); 
             $formatted_time = date('Y-m-d H:i:s', strtotime($time));

             echo $formatted_time;

             $query = 'UPDATE ' . 'games' . "
                          SET liga_name = :liga_name, liga_id = :liga_id, firstTeam = :firstTeam, secondTeam = :secondTeam, image1 = :image1, image2 = :image2, score1 = :score1, score2 = :score2, games1 = :games1, games2 = :games2, goal1 = :goal1, goal2=:goal2, time=:time
                          WHERE id = :id";
                          $stmt = self::$pdo->prepare($query);
                          
                          $stmt->bindParam(':liga_name', $liga_name);
            $stmt->bindParam(':liga_id', $liga_id);
            $stmt->bindParam(':firstTeam', $firstTeam);
            $stmt->bindParam(':secondTeam', $secondTeam);
            $stmt->bindParam(':image1', $image1);
            $stmt->bindParam(':image2', $image2);
            $stmt->bindParam(':score1', $score1);
            $stmt->bindParam(':score2', $score2);
            $stmt->bindParam(':games1', $games1);
            $stmt->bindParam(':games2', $games2);
            $stmt->bindParam(':goal1', $goal1);
            $stmt->bindParam(':goal2', $goal2);
            $stmt->bindParam(':time', $time);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        }
    }

