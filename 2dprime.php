<?php
include "utility.php";
$a=1000;
$ar=array();
echo"prime numbers:";
echo"\n \t100\t200\t300\t400\t500\t600\t700\t800\t900\t1000";
for($i=2;$i<=$a;$i++)
 {
        if(prime($i))
        {
            echo " \n" . $i;
            $ar[$i]=$i;
        } 
        if($i%100==0)
            echo"\t";
    
}



?>