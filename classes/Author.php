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


}