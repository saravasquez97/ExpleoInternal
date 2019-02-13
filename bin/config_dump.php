<?php

require_once ("../src/lib/ConfigurationInterface.php");

$configuration = ConfigurationInterface::getInterface();

echo "<pre>";
print_r($configuration->getSystemConfig());
print_r($configuration->getDatabaseConfig());
echo "</pre>";
echo CONFIG['env']['version'];
