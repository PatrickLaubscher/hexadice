<?php

interface ProductContent
{

    /**
     * Find all product content
     */
    public function getAllContent(): array; 


    /**
     * Find product content by id
     */
    public function getAllContentById(int $id): array; 


}

