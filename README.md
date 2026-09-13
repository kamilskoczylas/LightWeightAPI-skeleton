# LightWeightAPI

A lightweight, dependency-free PHP API framework for building simple JSON and file-response APIs quickly.

## Purpose

A service-based framework designed for rapid development of PHP APIs with clean architecture and clear separation of concerns.

## Philosophy

- **As small as possible** — minimal codebase
- **As simple as possible** — easy to understand and maintain
- **As fast as possible** — optimized for performance
- **No external dependencies** — pure PHP only
- **No frameworks. No libraries.** — just clean architecture

## Features

- CRUD (Create, Read, Update, Delete) operations for custom entities
- MySQL and MariaDB support via PDO integration
- Basic request and response validation
- Simplified automated testing for CRUD operations

## Requirements

- PHP 8 or higher
- PDO extension enabled

## Installation

The project uses `LightWeightAPI-framework` as a Git submodule located in the `lib` directory.

After creating or cloning the project, the `lib` directory may not contain the framework source yet. To initialize and fetch the submodule, run:

```bash
git submodule update --init --recursive
```

If you are cloning the project for the first time, you can fetch the submodule automatically with:

```bash
git clone --recurse-submodules https://github.com/kamilskoczylas/LightWeightAPI-skeleton
```

If the project has already been cloned without `--recurse-submodules`, use:

```bash
git submodule update --init --recursive
```

Update the `lib` dependencies to the latest version of the framework:

```bash
git submodule update --remote lib
```

## Architecture

The framework follows a four-layer architecture pattern:

1. **Request** — validates input data
2. **Service** — implements business logic
3. **Repository** — handles database access
4. **Response** — validates output data

Optional:
5. **Adapter** — adapter classes help separate third-party dependencies from your code
6. **Mapper** — mapper classes translate requests to DTOs and vice versa

## Convention Naming

### Requests
```
Get|Update|Delete|Create + ServiceName + Operation + Request
```

Works automatically.

### Responses
```
Get|Update|Delete|Create + ServiceName + Operation + Response
```

You must create a constructor for the Response object, which accepts an associative array. Example:

```php
$responseData = [
    'email' => 'test-email@test-domain.test',
    'age' => 100,
    'name' => 'John'
];
return new GetExampleResponse($responseData);
```

For nested objects, you need to pass nested Response objects, like:

```php
$nestedData = [new GetNestedResponse($responseData), new GetNestedResponse($responseData)];
$nestedResponseObject = [
    'fields' => $nestedData
];
return new GetExampleNestedResponse($nestedResponseObject);
```

Each request and response object should define `propertiesValidationRules`, which describes the automatic validation rules. Example:

```php
protected $propertiesValidationRules = array(
    # property $email will automatically throw ValidationException if the object does not receive the expected 'email' key
    'email' => array(
        'type' => 'email',
        'required' => true
    ),
    'age' => array(
        'type' => 'int',
        'required' => true
    ),
    'name' => array(
        'type' => 'text',
        'min_length' => 2,
        'max_length' => 50,
        'required' => false
    ),
    'fields' => array(
        'type' => 'class',
        'is_array' => true,
        'required' => false
    )
);
```

## Getting Started

### Step-by-Step Guide

1. Create a DTO class in the `app/dto` folder (map a SQL table to a DTO class)
2. Create a request class in the `app/request` folder with validation rules
3. Create a response class in the `app/response` folder with validation rules
4. Create a service class in the `app/service` folder and implement business logic
5. Create a repository class in the `app/repository` folder for database access

### Usage Examples

```text
GET:  api.php?request=GetUserMainRequest&user_id=1
GET:  api.php?request=GetUserAllRequest
POST: api.php?request=CreateUserRequest
      payload: {"user_name":"John Doe","user_email":"john.doe@example.com"}
```

## License

Licensed under the MIT License (2019-2026)
