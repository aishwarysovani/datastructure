<?php
include "utility.php";
$linklist = new LinkedList();
$file = fopen("num.txt", "r");
$number = array();
$tem="";
while (!feof($file)) {

    $tem=$tem . fgetc($file);
}
$number = explode(" ", $tem);
for ($i = 0; $i < sizeof($number); $i++) {
    $linklist->insertLast($number[$i]);
}
$mydata = $linklist->readList();
$store = $mydata;
echo "------------read a file---------------\n";
for ($i = 0; $i < count($mydata); $i++) {
    echo $mydata[$i] . " ";
}
echo "\n enter the number to add ";
$add = readline();
$linklist->insertLast($add);
$add = $linklist->readList();
echo "-----after added see the file content------\n";
    for ($i = 0; $i < count($add); $i++) {
        echo $add[$i] . " ";
    }
echo"\n ----------after sorting------------";
//$sort=$linklist->sort($add);
$sort=$linklist->sort();
$sort=$linklist->readList();
for ($i = 0; $i < feof($file); $i++) {
    echo $sort[$i] . " ";
}
    $File = "num.txt";
    $fh = fopen($File, 'a');
    $Data = " " . $sort;
    fwrite($fh, $Data);
    fclose($fh);

fclose($file);
?>