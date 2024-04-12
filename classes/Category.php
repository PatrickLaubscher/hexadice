<?php

require_once __DIR__ . "/Feature.php";


class Category extends Feature 
{
    

    /**
     * delete category's game from table game_category_list
     * 
     * @param int $id
     * @return bool
     */
    public function deleteCategoryGame (int $id): bool 
    {

        $query= "DELETE FROM game_category_list WHERE id_game = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
       
        return $stmt->execute();
    }


    /**
     * insert new row in game_category_list 
     * 
     * @param int $gameId
     * @param int $categoryId
     * @return bool
     */
    public function addGameCategoryList (int $gameId, int $categoryId): bool
    {

        $query = "INSERT INTO game_category_list (id_game, id_category) VALUES (:id_game, :id_category)";  
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_game', $gameId, PDO::PARAM_INT);
        $stmt->bindValue(':id_category', intval($categoryId), PDO::PARAM_INT);
        
        return $stmt->execute();
    }

    
}