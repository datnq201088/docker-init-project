<?php 

$envVars = [
  "MYSQL_USER",
  "MYSQL_DATABASE",
  "MYSQL_PASSWORD",
  "MYSQL_ROOT_PASSWORD",
];
foreach ($envVars as $envVar) {
  $envValue = getenv($envVar);
  echo nl2br("<b>{$envVar}</b>: {$envValue}\n");
}
?>
