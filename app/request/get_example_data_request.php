<?php

/**
 * Example Request Class
 * LightWeightAPI Framework
 * Copyright (c) 2019-2026 Kamil Skoczylas
 * Licensed under the MIT License.
 * 
 * This class defines all the possible fields for the request to get example data. It also defines validation rules for each field.
 * Why it matters? 
 *   - automatic validation of the request data
 *   - clarity of the request structure
 *   - better IDE support, like autocompletion and type hinting
 * 
 * Convention naming
 * Get | Update | Delete | Create + Servicename + TypeOfData + Request
 * 
 * Why convention naming?
 *  - Auto loading of the class based on the request URL
 *  - Auto execution of the correct Service class method based on the request URL
 *  - Clarity of the code structure
 */

class GetExampleDataRequest extends BasicRequest {
    public $id;

    protected $propertiesValidationRules =
        array (
            'id' => array(
                'type' => 'int',
                'required' => true
                )
            );
}