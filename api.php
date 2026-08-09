<?php

/*
    LightWeightAPI Framework
    Copyright (c) 2019-2026 Kamil Skoczylas
    Licensed under the MIT License.

    Purpose: Service based framework for simple JSON/File responses.
    Goal: As small as possible, as simple as possible, as fast as possible. Keeping clean architecture and separation of concerns. 
          No external dependencies. No frameworks. No libraries. Just pure PHP.
          
    Features: 
        - CRUD (Create, Read, Update, Delete) for custom entities
        - MySQL & MariaSQL via PDO integration
        - Basic validation of requests and responses
        - Easier automated tests for CRUD operations

    Convention Naming:
        Requests:
            Get,Update,Delete,Create + ServiceName + Operation + Request

        Responses:
            Get,Update,Delete,Create + ServiceName + Operation + Response

    Layers:
        1. Request - validate input data
        2. Service - implement business logic
        3. Repository - implement database access
        4. Response - validate output data

    Requirements:
        PHP 8 or higher
        PDO extension enabled

    Step by step guide:
        1. Create dto class in app/dto folder (map SQL table to dto class)
        2. Create request class in app/request folder, add validation rules
        3. Create response class in app/response folder, add validation rules
        4. Create service class in app/service folder and implement custom method
        5. Create repository class in app/repository folder

    Call:
        GET: api.php?request=GetUserMainRequest&user_id=1
        GET: api.php?request=GetUserAllRequest
        POST: api.php?request=CreateUserRequest 
              payload: {"user_name":"John Doe","user_email":"john.doe@example.com"}
*/

# ini_set('display_errors', 1);
# ini_set('display_startup_errors', 1);
# error_reporting(E_ALL);

# Change this directories when you move them to private location.
# For example, you can move the app folder outside of the public_html folder
#
# It significantly increases security, because the app folder contains sensitive data 
# like database connection settings and SQL queries.
#    
# When PHP parser gets broken, it can display the source code of the PHP files 
# in the app folder, which can lead to data leaks.

define('APP_DIR', __DIR__ . '/app');
define('LIB_DIR', __DIR__ . '/lib');


include LIB_DIR . '/api_header.php';


if (isset($_GET['request'])){
    $service = new ServiceBuilder($_GET['request'], new Response());
    $service->Execute();
}


