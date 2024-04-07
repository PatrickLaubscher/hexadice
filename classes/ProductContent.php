<?php

abstract class ProductContent
{
    


    /**
     * Find all product content
     */
    abstract public function getAllContent(object $db): array; 


    /**
     * Find product content by id
     */
    abstract public function getAllContentById(object $db, int $id): array; 


}

