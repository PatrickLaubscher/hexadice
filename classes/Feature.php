<?php


class Feature 
{
    public function __construct (
        protected object $db
    ){}

    
    /**
     * create new feature in the related table
     * 
     * @param string $tableTitle name of the table's feature
     * @param string $feature name of the feature
     * @return bool
     */
    public function createNewFeature (string $tableTitle, string $feature): bool 
    {
        $column = $tableTitle . '_name';

        $query = "INSERT INTO $tableTitle ($column) VALUES (:feature)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':feature', $feature, PDO::PARAM_STR);
            
        return $stmt->execute();
    }


    /**
     * return all content of a given feature name
     * 
     * @param string $feature  
     * @return array  
     */
    public function getAllContentFeature(string $feature): array
    {

        $stmt = $this->db->prepare("SELECT * FROM $feature");
        $stmt->execute();
        $featureList = $stmt->fetchAll(PDO::FETCH_ASSOC);
        asort($featureList);

        return $featureList;

    }


    /**
     * return list of content feature names
     * 
     * @param string $feature  
     * @return array  
     */
    public function getAllNameFeature(string $feature): array
    {
        $column = $feature . "_name";
        $stmt = $this->db->prepare("SELECT $column FROM $feature");
        $stmt->execute();
        $featureList = $stmt->fetchAll(PDO::FETCH_COLUMN);
        asort($featureList);

        return $featureList;

    }

}