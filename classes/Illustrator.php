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


}