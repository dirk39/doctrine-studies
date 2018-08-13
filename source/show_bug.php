<?php

require_once "bootstrap.php";

$id = (int)$argv[1];
$bug = $entityManager->find("Bug", $id);

echo "Bug: ".$bug->getDescription()."\n";
echo "Engineer: ".$bug->getEngineer()->getName()."\n";