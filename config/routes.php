<?php

use jantrik\Router;

// Маршрут для продуктов
Router::add('^product/(?P<alias>[a-z0-9-]+)/?$', ['controller' => 'Product', 'action' => 'view']);

// Маршрут для категорий
Router::add('^category/(?P<alias>[a-z0-9-]+)/?$', ['controller' => 'Category', 'action' => 'view']);

// Маршруты по умолчанию
Router::add('^admin$', ['controller' => 'Main', 'action' => 'index', 'prefix' => 'admin']);
Router::add('^admin/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['prefix' => 'admin']);

Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');