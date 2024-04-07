<?php

require_once __DIR__ . '/Productcontent.php';


class GameContent extends ProductContent
{
    

    /**
     * Give all products content list 
     */
    public function getAllContent(object $db): array
    {

        $stmt = $db->prepare("SELECT * FROM game");
        $stmt->execute();
        $gameList = $stmt->fetchAll(PDO::FETCH_ASSOC);


        return $gameList;
    }


    /**
     * Find one product content by id
     */
    public function getAllContentById(object $db, int $id): array
    {
        
        $stmt = $db->prepare("SELECT * FROM game WHERE game_id = $id");
        $stmt->execute();
        $game = $stmt->fetch(PDO::FETCH_ASSOC);


        return $game;

    }


    /**
     * 
     * Find features content for a game by id
     */
    public function getFeatureContentById(object $db, int $id, string $feature): array
    {
        $column = $feature . '_name';
        $tableJoin = 'game_' . $feature . '_list';
        $columnTableJoin = 'id_' . $feature;
        $columnFeature = $feature . '_id';

        $stmt = $db->prepare("SELECT $column FROM $tableJoin INNER JOIN $feature ON $columnFeature = $columnTableJoin WHERE id_game = $id");
        $stmt->execute();
        $featureList = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $featureList;

    }


    /**
     * 
     * Give all content of a given feature name 
     */
    public function getAllContentFeature(object $db, string $feature): array
    {

        $stmt = $db->prepare("SELECT * FROM $feature");
        $stmt->execute();
        $featureList = $stmt->fetchAll(PDO::FETCH_ASSOC);
        asort($featureList);

        return $featureList;

    }


}

