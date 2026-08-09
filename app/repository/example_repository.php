<?php

/**
 * Example Repository
 * LightWeightAPI Framework
 * Copyright (c) 2019-2026 Kamil Skoczylas
 * Licensed under the MIT License.
 * 
 */

class ExampleRepository extends BasicRepository {
    
    function Read(Basic_dto $exampleDto) {

        $data = null;

        try {
            $data = parent::Read($exampleDto);
        } catch (PDOException $e) {
            throw new Exception('Database connection error: ' . $e->getMessage());
        }
            
        return $data;
    }
}