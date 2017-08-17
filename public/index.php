<?php

//  load up the application and save its instance in variable
$app = include_once 'app/bootstrap.php';

//  run the application and print out result into the page
echo $app->run();

