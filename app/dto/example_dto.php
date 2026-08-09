<?php

/**
 * Example DTO
 * LightWeightAPI Framework
 * Copyright (c) 2019-2026 Kamil Skoczylas
 * Licensed under the MIT License.
 * 
 * Defines simple object structure, known as a Data Transfer Object. It's fields may automatically map to database table columns.
 * It is known by all the layers of the application, and is used to transfer data between them.
 * 
 * Convention naming
 * id_prefix: id_ (for primary keys)
 * field_name_id: _id (for foreign keys)
 * 
 * Why object, not associative array? Because object is more strict which is proffesional and less error-prone.
 * It also allows for better IDE support, like autocompletion and type hinting.
 */

class ExampleDTO extends Basic_dto {

    function __construct(){
      $this->table_name = 'example_table';
      parent::__construct();
    }
    
    // id_ must be on begginning for PRIMARY KEYS
    public $id_example;
    public $title;
    public $description;
}