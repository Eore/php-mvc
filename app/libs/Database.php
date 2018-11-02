<?php

$dbConfig = yaml_parse_file($_SERVER['DOCUMENT_ROOT'].'/app/configs/database.yaml');
print_r($dbConfig);
echo 'lalalala';