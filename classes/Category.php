<?php

require_once __DIR__ . "/Feature.php";


class Category extends Feature 
{
    

    /**
     * delete category game from table game_category_list
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


}