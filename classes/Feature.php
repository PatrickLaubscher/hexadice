<?php


class Feature 
{
    public function __construct (
        protected object $db
    ){}

    
    /**
     * Give all content of a given feature name
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

}