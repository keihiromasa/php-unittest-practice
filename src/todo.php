<?php

require_once 'class/TODORepositoryFactory.php';
require_once 'class/TODORepository.php';
require_once 'class/TODORepositoryFactory.php';
require_once 'class/RequestToTODO.php';
require_once 'class/TODORepositoryFactory.php';

$repository = TODORepositoryFactory::create();
$repository->add(RequestToTODO::convert($_POST));
$todoList = $repository->fetchAll();

include 'todo-view.php';
