<?php

require_once "bootstrap.php";

$id = $argv[1];

$product = $entityManager->find("Product", $id);

if( null === $product) {
  echo "Product not found with id ".$id."\n";
  exit(1);
}

echo sprintf("-%s\n",$product->getName());