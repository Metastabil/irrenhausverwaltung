<?php

/**
 * @author Julius Derigs
 * @version 1.0.0
 */

$routes[] = ['BaseController', 'welcome'];

// Users
$routes['users'] = ['Users', 'index'];
$routes['create-user'] = ['Users', 'create'];
$routes['show-user/:id'] = ['Users', 'show'];
$routes['update-user/:id'] = ['Users', 'update'];
$routes['delete-user/:id'] = ['Users', 'delete'];

return $routes;