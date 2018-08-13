<?php

require_once 'bootstrap.php';

$id = $argv[1];
/** @var Bug $bug */
$bug = $entityManager->find("Bug", $id);

if( null === $bug) {
  echo "Bug not found with id ".$id."\n";
  exit(1);
}

$bug->close();

$entityManager->flush();

