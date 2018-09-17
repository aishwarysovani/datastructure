<?php
echo "enter any month(1-jan 2-feb 3-mar etc.):";
$month=readline();
echo "enter any year:";
$year=readline();
$months =array ("","January", "February", "March","April", "May", "June","July", "August", "September","October", "November", "December");
$days=array(0, 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
if ($month == 2 && isLeapYear($year)) 
    $days[$month] = 29;
echo "\n   " . $months[$month] . " " . $year;
echo"\n";
echo "\n\tS\tM\tTu\tW\tTh\tF\tS\n";
$d = day($month, 1, $year);
    for ($i = 0; $i < $d; $i++)
        print"\t";
    for ($i = 1; $i <= $days[$month]; $i++) {
        print"\t" . $i;
        if ((($i + $d) % 7 == 0) || ($i == $days[$month])) 
            echo"\n ";
        }
        echo"\n";
    
function day($month,$day,$year) {
            $y = $year - floor((14 - $month) / 12);
            $y=(int)$y;
            $x = $y + floor($y/4) - floor($y/100) + floor($y/400);
            $x=(int)$x;
            $m = $month + (12 * floor((14 - $month) / 12)) - 2;
            $m=(int)$m;
            $d = ($day + $x + floor((31*$m)/12)) % 7;
            $d=(int)$d;
            return $d;
}

function isLeapYear($year) {
    if  (($year % 4 == 0) && ($year % 100 != 0)) 
        return true;
    if  ($year % 400 == 0) 
        return true;
    return false;
}
    
?>