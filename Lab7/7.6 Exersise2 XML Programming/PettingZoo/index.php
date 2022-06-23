<?php

    // set name of XML file
$file = "pet.xml";// load file
$xml = simplexml_load_file($file) or die ("Unable to load XML file!");
// access XML data
echo "Name: " . $xml->name . "<br>";
echo "Age: " . $xml->age . "<br>";
echo "Species: " . $xml->species . "<br>";
echo "Parents: " . $xml->parents->mother . " and " . $xml->parents->father . "<br>";
?>