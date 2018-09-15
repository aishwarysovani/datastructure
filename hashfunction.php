<?php
include "utility.php";

$obj[11] = new LinkedList();

for ($i = 0; $i < count($obj); $i++) {
    $obj[$i] = null;
}

$file = fopen("hash.txt", "r");
$tem = "";
while (!feof($file)) {

    $tem = $tem . fgetc($file);

}
$name = explode(" ", $tem);
for ($i = 0; $i < sizeof($name); $i++) {
    if ($name[$i] != "") {
        $readarray = (int) $name[$i];
        $reminder = $readarray % 11;

        if ($obj[$reminder] == null) {
            $obj[$reminder] = new LinkedList();
            $obj[$reminder]->insertLast($readarray);
        } else {
            $obj[$reminder]->insertLast($readarray);
        }
    }
}
for ($i = 0; $i < 11; $i++) {
    echo "[" . $i . "] ";
    if ($obj[$i] != null) {
        $obj[$i]->readListInList();
        //echo "\n";
    } else {
        echo "None \n";
    }

}

echo "enter the element to search \n";
$listlink = new LinkedList();
$search = $listlink->getInt();
$rem = $search % 11;
if ($obj[$rem] == null) {
    $obj[$rem] = new LinkedList();
    if ($obj[$rem]->deleteNode1($search)) {
        $null =null;
        $obj[$rem]->insertLast($search);
        $fname = "hash.txt";
        $fhandle = fopen($fname, "r");
        $content = fread($fhandle, filesize($fname));

        $content = str_replace($search . " ", "", $content);

        $fhandle = fopen($fname, "w");
        fwrite($fhandle, $content);
        fclose($fhandle);
    } else {
        $obj[$rem]->insertLast($search);

        $File = "hash.txt";
        $fh = fopen($File, 'a');
        $Data = " " . $search;
        fwrite($fh, $Data);
        fclose($fh);
   }   }
else{

    if ($obj[$rem]->deleteNode1($search)) {
       
        $fname = "hash.txt";
        $fhandle = fopen($fname, "r");
        $content = fread($fhandle, filesize($fname));

        $content = str_replace($search . " ", "", $content);

        $fhandle = fopen($fname, "w");
        fwrite($fhandle, $content);
        fclose($fhandle);
    } else {
        $obj[$rem]->insertLast($search);

        $File = "hash.txt";
        $fh = fopen($File, 'a');
        $Data = " " . $search;
        fwrite($fh, $Data);
        fclose($fh);
   }  
}

for ($i = 0; $i < 11; $i++) {
    echo "[" . $i . "] ";
    if ($obj[$i] != NULL ) {
        $obj[$i]->readListInList();
        //echo "\n";
    } else {
        echo "None \n";
    }

}

?>



