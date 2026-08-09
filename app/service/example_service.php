<?php

/**
 * Example Service Class
 * LightWeightAPI Framework
 * Copyright (c) 2019-2026 Kamil Skoczylas
 * Licensed under the MIT License.
 * 
 * Interface and executes business logic
 */

    class ExampleService extends BasicService {

        private $example_repository;

        function __construct() {
            parent::__construct();

            $this->example_repository = new ExampleRepository();
        }
        
        function GetData(GetExampleDataRequest $getExampleRequest){

                $dto = new ExampleDTO();
                $dto->id_example = $getExampleRequest->id;

                try {
                    $example_data = $this->example_repository->Read($dto);

                    return $this->Response(
                        array('data' => $example_data)
                    );

                } 
                catch (Exception $e) {
                    return $this->ErrorResponse(
                        array('data' => $e->getMessage())
                    );
                }
                
                
                
                
            
        }
    }