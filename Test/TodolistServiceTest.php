<?php

require_once __DIR__ . "/../Entity/Todolist.php";
require_once __DIR__ . "/../Repository/TodolistRepository.php";
require_once __DIR__ . "/../Service/TodolistService.php";

use Entity\Todolist;
use Service\TodolistServiceImpl;
use Repository\TodolistRepositoryImpl;


function testShowTodolist()
{
    $todolistRepository = new TodolistRepositoryImpl();
    $todolistRepository->todolist[1] = new Todolist("Belajar PHP");
    $todolistRepository->todolist[2] = new Todolist("Belajar PHP OOP");
    $todolistRepository->todolist[3] = new Todolist("Belajar PHP Database");

    /**
     * stepnya, dibuat dulu objectnya menggunakan class TodolistRepositoryImpl.
     * di insert datanya, data yang di insert pun bentuknya object.  
     * objectnya dikirim pakai fungsi constructor TodolistServiceImpl
     * lalu dicek satu satu di fungsi showTodoList() yang ada di TodolistServiceImpl
     * dikembalikan nilainya.
     */

    $todolistService = new TodolistServiceImpl($todolistRepository);
    $todolistService->showTodoList();
}

function testAddTodolist()
{
    $todolistRepository = new TodolistRepositoryImpl();
    $todolistService = new TodolistServiceImpl($todolistRepository);
    $todolistService->addTodoList("Belajar PHP");
    $todolistService->addTodoList("Belajar PHP OOP");
    $todolistService->addTodoList("Belajar PHP Database");
    $todolistService->addTodoList("Belajar PHP Laravel");
    $todolistService->showTodoList();
}

function testRemoveTodolist()
{
    $todolistRepository = new TodolistRepositoryImpl();
    $todolistService = new TodolistServiceImpl($todolistRepository);
    $todolistService->addTodoList("Belajar PHP");
    $todolistService->addTodoList("Belajar PHP OOP");
    $todolistService->addTodoList("Belajar PHP Database");
    $todolistService->showTodoList();
    $todolistService->removeTodoList(4);
    $todolistService->showTodoList();
}

testAddTodolist();
