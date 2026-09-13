<?php 
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed'); 

/**
 * -------------------------------------------------------------------
 * URI ROUTING
 * -------------------------------------------------------------------
 */

/** @var object $router **/

require_once APP_DIR . 'middlewares/AuthMiddleware.php'; 

get_config([ 
    'middlewares' => [ 
        'AuthMiddleware' => new AuthMiddleware(), 
    ], 
]); 

// ---------------------------------------------------------
// AUTH ROUTES
// Public - walang middleware
// ---------------------------------------------------------

$router->get('/', 'AuthController::login'); 

$router->get('/login', 'AuthController::login'); 
$router->post('/login', 'AuthController::login'); 

$router->get('/logout', 'AuthController::logout'); 


// ---------------------------------------------------------
// PRODUCT ROUTES
// Protected by AuthMiddleware
// ---------------------------------------------------------

$router->group(['middleware' => 'AuthMiddleware'], function ($router) { 

    $router->get('/products', 'ProductController::index'); 

    $router->get('/products/create', 'ProductController::create'); 
    $router->post('/products/create', 'ProductController::create'); 

    $router->get('/products/edit/{id}', 'ProductController::edit')
        ->where_number('id'); 

    $router->post('/products/edit/{id}', 'ProductController::edit')
        ->where_number('id'); 

    $router->get('/products/delete/{id}', 'ProductController::delete')
        ->where_number('id'); 
});