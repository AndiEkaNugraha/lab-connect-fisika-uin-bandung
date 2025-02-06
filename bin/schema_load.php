<?php
require_once __DIR__ . "/../bootstrap.php";
use Core\App;

$db = App::get("database");
$schemaFile = __DIR__ ."/../initDatabase/schema.sql";
$sql = file_get_contents($schemaFile);

// throw new Exception("testing exception handling!");


$parts = array_filter(explode (separator:";", string: $sql));
// var_dump($parts);die;
foreach ($parts as $sqlPart) {
    $db->query($sqlPart);
}
echo "Schema loaded successfully\n";