<?php
include "utility.php";

$listlink = new LinkedList();

$file = fopen("num.txt", "r");
$tem="";
while (!feof($file)) {

    $tem=$tem . fgetc($file);
   
}
$number= explode(" ", $tem);
for ($i = 0; $i < sizeof($number); $i++) {
    if($number[$i]!=""){
    $listlink->insertLast($number[$i]);
    }
}

$listlink->sort();
echo "enter the element to add\n";
$search = readline();
if ($listlink->deleteNode($search) == 1){
    $listlink->insertLast($search);
}
    $f = fopen("num.txt", "r+");
    if ($f !== false) {
        ftruncate($f, 0);
        fclose($f);
    }
$filename ="num.txt";
$listlink->addToFile($filename);
$listlink->sort();
$listlink->readListInList();

?>