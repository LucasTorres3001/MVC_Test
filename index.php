<?php

    use CoffeeCode\Router\Router;

    include __DIR__.'/vendor/autoload.php';

    $router = new Router(URL);
    /**
     * USER
     * Controller
     */
    $router->namespace('Source\App\Controllers');
    /**
     * USER
     * Group
     */
    $router->group(null);
    /**
     * USER
     * Login page
     */
    $router->get('/','WebController:index');
    /**
     * USER
     * Add users
     */
    $router->post('/add','UserController:add');
    /**
     * USER
     * Add page
     */
    $router->get('/add_page','WebController:add');
    /**
     * USER
     * Registered page
     */
    $router->get('/create','UserController:create');
    /**
     * USER
     * Dashboard page
     */
    $router->get('/dashboard','WebController:dashboard');
    /**
     * USER
     * Delete users
     */
    $router->delete('/edit/{id}','UserController:destroy');
    /**
     * USER
     * Edit page
     */
    $router->get('/edit/{id}','UserController:edit');
    /**
     * USER
     * Update user data
     */
    $router->put('/edit/{id}','UserController:update');
    /**
     * USER
     * Welcome page
     */
    $router->get('/home','WebController:home');
    /**
     * USER
     * Search users
     */
    $router->get('/home/{lyric}','UserController:search');
    /**
     * USER
     * Login user
     */
    $router->post('/login','UserController:login');
    /**
     * USER
     * Logout
     */
    $router->get('/logout','WebController:logout');
    /**
     * USER
     * Insert users
     */
    $router->post('/register','UserController:store');
    /**
     * USER
     * Show page
     */
    $router->get('/show/{id}','WebController:show');
    /**
     * ERRORS
     * Group
     */
    $router->group('ooops');
    /**
     * USER
     * Errors page
     */
    $router->get('/{errcode}','WebController:notFound');

    $router->dispatch();

    if ($router->error())
    :
        $router->redirect("/ooops/{$router->error()}");
    endif;