<?php

require_once 'class/TODORepositoryFactory.php';
require_once 'class/TODORepository.php';
require_once 'class/TODORepositoryFactory.php';
require_once 'class/RequestToTODO.php';
require_once 'class/TODORepositoryFactory.php';

$repository = TODORepositoryFactory::create();

$repository->delete(RequestToTODO::convertDelete($_POST));

if (!$repository->add(RequestToTODO::convert($_POST))) {
    $dupulicationMessage = '同じTODOは登録できません';
}
$todoList = $repository->fetchAll();

include 'todo-view.php';
