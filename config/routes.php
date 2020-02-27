<?php

use FW\Routing\Router;


Router::add('products/(?P<slug>[a-z0-9-]+)/?', ['controller' => 'products', 'action' => 'show']);
Router::add('categories/(?P<slug>[a-z0-9-]+)/?', ['controller' => 'categories', 'action' => 'show']);

Router::add('/', ['controller' => 'main']);
Router::add('categories', ['controller' => 'Categories']);
Router::add('(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?');