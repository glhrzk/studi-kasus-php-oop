<?php

/**
 * Ini adalah halaman utama dari sebuah Aplikasi
 */

require_once __DIR__ . "/Entity/Todolist.php";
require_once __DIR__ . "/Helper/InputHelper.php";
require_once __DIR__ . "/Repository/TodolistRepository.php";
require_once __DIR__ . "/Service/TodolistService.php";
require_once __DIR__ . "/View/TodolistView.php";

use Repository\TodolistRepositoryImpl;
use Service\TodolistServiceImpl;
use view\TodolistView;

$todolistRepository = new TodolistRepositoryImpl();
$todolistService = new TodolistServiceImpl($todolistRepository);
$todolistView = new TodolistView($todolistService);

$todolistView->showTodoList();

echo "Aplikasi Todolist" . PHP_EOL;
