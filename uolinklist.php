<?php
include "utility.php";
$listlink = new LinkedList();
$file = fopen("info.txt", "r");
$name = array();
$tem="";
while (!feof($file)) {

    $tem=$tem . fgetc($file);
}
$name = explode(" ", $tem);
for ($i = 0; $i < sizeof($name); $i++) {
    $listlink->insertLast($name[$i]);
}
$mydata = $listlink->readList();
$store = $mydata;
echo "------------read a file---------------\n";
for ($i = 0; $i < count($mydata); $i++) {
    echo $mydata[$i] . " ";
}
echo "\n enter the word to search ";
$search = readline();
$listlink->deleteNode($search);
$delete = $listlink->readList();
echo "---after serached see the file content---\n";
if (count($delete) < count($store)) {
    for ($i = 0; $i < count($delete); $i++) {
        echo $delete[$i] . " ";
    }
    $fname = "info.txt";
    $fhandle = fopen($fname, "r");
    $content = fread($fhandle, filesize($fname));

    $content = str_replace($search . " ", "", $content);

    $fhandle = fopen($fname, "w");
    fwrite($fhandle, $content);
    fclose($fhandle);
} else {
    $listlink->insertLast($search);
    $newdata = $listlink->readList();
    for ($i = 0; $i < count($newdata); $i++) {
        echo $newdata[$i] . " ";
    }
    $File = "info.txt";
    $fh = fopen($File, 'a');
    $Data = " " . $search;
    fwrite($fh, $Data);
    fclose($fh);
}
fclose($file);
?>
