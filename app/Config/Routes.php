<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/api/auth', 'Auth::login');


$routes->post('/api/tickets', 'Tickets::getTickets');