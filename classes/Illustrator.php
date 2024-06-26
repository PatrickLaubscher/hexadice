<?php

require_once __DIR__ . "/Feature.php";


class Illustrator extends Feature 
{
    

    /**
     * delete illustrator game from table game_illustrator_list
     * 
     * @param int $id
     * @return bool
     */
    public function deleteIllustratorGame (int $id): bool 
    {

        $query= "DELETE FROM game_illustrator_list WHERE id_game = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
       
        return $stmt->execute();
    }


    /**
     * insert new row in game_illustrator_list 
     * 
     * @param int $gameId
     * @param int $illustratoId
     * @return bool
     */
    public function addGameIllustratorList (int $gameId, int $illustratorId): bool
    {

        $query = "INSERT INTO game_illustrator_list (id_game, id_illustrator) VALUES (:id_game, :id_illustrator)";  
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_game', $gameId, PDO::PARAM_INT);
        $stmt->bindValue(':id_illustrator', $illustratorId, PDO::PARAM_INT);
        
        return $stmt->execute();
    }



    /**
     * update table game_illustrator_list by game id
     * 
     * @param int $gameId
     * @param int $illustratoId
     * @return bool
     */
    public function updateGameIllustratorList (int $gameId, int $illustratorId): bool
    {

        $query = "UPDATE game_illustrator_list SET id_illustrator = :id_illustrator WHERE id_game = :game_id";  
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':game_id', $gameId, PDO::PARAM_INT);
        $stmt->bindValue(':id_illustrator', $illustratorId, PDO::PARAM_INT);
        
        return $stmt->execute();
    }



}