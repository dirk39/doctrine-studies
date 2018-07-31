<?php

require_once "bootstrap.php";

$id = $argv[1];
$newName = $argv[2];
/** @var Product $product */
$product = $entityManager->find("Product", $id);

if(null === $product) {
  echo "Product not found with id ".$id;
  exit(1);
}

$product->setName($newName);
$entityManager->flush($product);