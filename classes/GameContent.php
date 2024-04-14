<?php

require_once __DIR__ . '/Productcontent.php';


class GameContent implements ProductContent
{
    
    public function __construct(
        private object $db
    ){

    }


    /**
     * Insert new game in table game
     * 
     * 
     * @return bool 
     */
    public function createNewGame (
        string $name, 
        string $description, 
        string $short, 
        string $price, 
        int $stock, 
        string $age, 
        string $duration,
        string $player,
        string $language,
        string $editor
        ): bool 
    {
        $query = "INSERT INTO game (
            game_name, game_description, game_short, game_price, game_quantity, id_age_mini, id_duration, 
            id_player_nb, id_languages, id_editor) 
            VALUES (:game_name, :game_description, :game_short, :game_price, :game_quantity, :id_age_mini, :id_duration, 
            :id_player_nb, :id_languages, :id_editor)";
            
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':game_name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':game_description', $description, PDO::PARAM_STR);
        $stmt->bindValue(':game_short', $short, PDO::PARAM_STR);
        $stmt->bindValue(':game_price', $price, PDO::PARAM_STR);
        $stmt->bindValue(':game_quantity', $stock, PDO::PARAM_INT);
        $stmt->bindValue(':id_age_mini', intval($age), PDO::PARAM_INT);
        $stmt->bindValue(':id_duration', intval($duration), PDO::PARAM_INT);
        $stmt->bindValue(':id_player_nb', intval($player), PDO::PARAM_INT);
        $stmt->bindValue(':id_languages', intval($language), PDO::PARAM_INT);
        $stmt->bindValue(':id_editor', intval($editor), PDO::PARAM_INT);
        
        return $stmt->execute();

    }



    /**
     * Give all products content list 
     * 
     * @return array
     */
    public function getAllContent(): array
    {

        $stmt = $this->db->prepare("SELECT * FROM game");
        $stmt->execute();
        $gameList = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $gameList;
    }


    /**
     * Find one product content by id
     * 
     * @param int $id
     * @return array
     */
    public function getAllContentById(int $id): array
    {
        
        $stmt = $this->db->prepare("SELECT * FROM game WHERE game_id = $id");
        $stmt->execute();
        $game = $stmt->fetch(PDO::FETCH_ASSOC);


        return $game;

    }


    /**
     * Find features content for a game by id
     * 
     * 
     */
    public function getFeatureContentById(int $id, string $feature): array
    {
        $column = $feature . '_name';
        $tableJoin = 'game_' . $feature . '_list';
        $columnTableJoin = 'id_' . $feature;
        $columnFeature = $feature . '_id';

        $stmt = $this->db->prepare("SELECT $column FROM $tableJoin INNER JOIN $feature ON $columnFeature = $columnTableJoin WHERE id_game = $id");
        $stmt->execute();
        $featureList = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $featureList;

    }


    /**
     * Find id product by name
     * 
     * @return int $id
     */
    public function getIdByName (string $name): int
    {
        
        $stmt = $this->db->prepare("SELECT game_id FROM game WHERE game_name = '$name'");
        $stmt->execute();
        $gameId = $stmt->fetch(PDO::FETCH_COLUMN);

        return $gameId;

    }



    /** 
     * find games containing given string and return a list of game id founded
     * 
     * 
     * @param string $name
     * @return array $gameListResult
    */
    public function findGamesByName (string $name): array 
    {
        $stmt = $this->db->prepare("SELECT * FROM game WHERE game_name LIKE '%$name%'");
        $stmt->execute();
        $gameListResult = $stmt->fetchAll(PDO::FETCH_ASSOC);
        asort($gameListResult);

        return $gameListResult;
    }




    /**
     * Find games based on searching values & features 
     * 
     * @param array $paramList associative array of parameters and values
     * @return array list of game found
     */
    public function findGamesGlobalSearch (array $paramList): array|bool 
    {

        $query = 'SELECT * FROM';

        $searchParams = $paramList;

        if(isset($searchParams['category'])) {
            $query .= " game_category_list INNER JOIN category ON category_id = id_category"; 
        }

        if(!empty($searchParams['game_name']) && count($searchParams) == 1) {
            $query .= " game";
        } else {
            $query .= " INNER JOIN game on game_id = id_game";
        }
        
        foreach ($searchParams as $param => $value) {
            if($param != "game_name" && $param != "category")
            $query .= " INNER JOIN " . $param . " ON " . $param . "_id = id_" . $param;
        }

        $query .= " WHERE ";

        foreach ($searchParams as $param => $value) {

            $value = addslashes($value);

            if(!empty($searchParams['game_name'] && $param =='game_name')) {
                $query .= "game_name LIKE '%$value%' AND ";
            } 

            if($param != 'game_name'){
            $query .= $param . "_name LIKE '$value' AND ";
            }  
            
        }
        $query = rtrim($query, " AND ");

        $stmt = $this->db->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }




    /**
     * insert picture sticker filename for a product
     * 
     * 
     * @param string $filename
     * @param int $id
     * @return bool
     */
    public function setStickerGame (string $filename, int $id ): bool
    {
        $query= "UPDATE game SET game_sticker = :game_sticker WHERE game_id = '$id'";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':game_sticker', $filename, PDO::PARAM_STR);
        
        return $stmt->execute();

    }


    /**
     * insert picture sticker filename for a product
     * 
     * 
     * @param int $pictureNb (1-5)
     * @param string $filename
     * @param int $id
     * @return bool
     */
    public function setPictureGame (int $pictureNb, string $filename, int $id ): bool
    {
        $pictureColumn = 'game_picture' . $pictureNb;

        $query= "UPDATE game SET $pictureColumn = :game_sticker WHERE game_id = '$id'";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':game_sticker', $filename, PDO::PARAM_STR);
        
        return $stmt->execute();

    }


    /**
     * delete game from table game
     * 
     * @param int $id
     * @return bool
     */
    public function deleteGame (int $id): bool 
    {

        $query= "DELETE FROM game WHERE game_id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
       
        return $stmt->execute();
    }



    /**
     * update column content in game table
     * 
     * 
     * @param $id
     * @param $column
     * @param $value
     * @return bool
     */
    public function updateGameContentById (int $id, string $column, string|int $value): bool
    {
        $query= "UPDATE game SET $column = :column WHERE game_id = '$id'";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':column', $value, PDO::PARAM_STR);

        return $stmt->execute();
    }



}

