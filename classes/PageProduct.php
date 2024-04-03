<?php

class PageProduct
{
    private int $id;
    
    public function __construct
    (
        private array $productsList
    )
    {
        if (!isset($_GET['id'])) {
            echo "ID obligatoire";
            exit;
        } elseif (intval($_GET['id']) == 0) {
            echo 'Merci de renseigner un id valide';
            exit;

        } else {
            $this->id = $_GET['id'];
        }
        
    }

    /**
     * Find product content with id, return array or error if product not found
     */
    function getContent (): array 
    {
        $productFound = null;

        foreach ($this->productsList as $product) {
            if ($product["id"] == $this->id) {
                $productFound = $product;
            } 
        }

        if ($productFound === null) {
            http_response_code(404);
            echo "Profile not found";
            exit;
        } else {
            return $productFound;
        } 
    }

}

