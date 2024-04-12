<?php

require_once __DIR__ . "/Feature.php";


class Author extends Feature 
{
    

    /**
     * delete author game from table game_author_list
     * 
     * @param int $id
     * @return bool
     */
    public function deleteAuthorGame (int $id): bool 
    {

        $query= "DELETE FROM game_author_list WHERE id_game = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
       
        return $stmt->execute();
    }

    
    /**
     * insert new row in game_author_list 
     * 
     * @param int $gameId
     * @param int $authorId
     * @return bool
     */
    public function addGameAuthorList (int $gameId, int $authorId): bool
    {

        $query = "INSERT INTO game_author_list (id_game, id_author) VALUES (:id_game, :id_author)";  
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_game', $gameId, PDO::PARAM_INT);
        $stmt->bindValue(':id_author', intval($authorId), PDO::PARAM_INT);
        
        return $stmt->execute();
    }


}