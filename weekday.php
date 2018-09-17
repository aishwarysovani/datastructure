<?php
include "utility.php";
function GetCalender() 
{
	print"enter the month ";
	$month=readline();
	print"enter the year ";
	$year=readline();
    $months=array("", "January", "February", "March",
		"April", "May", "June", "July", "August", "September",
		"October", "November", "December");
	$days=array(0, 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);

	if($month == 2 && isLeapYear($year)) {
		$days[$month] = 29;
	}
	print "\n " . $months[$month] .  $year;
    $list=new queue1();
    $a=array("Su","Mo","Tu","We","Th","Fr","Sa");
    echo"\n";
    $list->Enqueue($a[0]);
	$list->Enqueue($a[1]);
	$list->Enqueue($a[2]);
	$list->Enqueue($a[3]);
	$list->Enqueue($a[4]);
	$list->Enqueue($a[5]);
	$list->Enqueue($a[6]);
	$d=Day($month, 1, $year);

	for ($i = 0; $i < $d; $i++) {
		$list->Enqueue("\t");
	}
	for($i = 1; $i <= $days[$month]; $i++) {
		$typ = (int)($i);
		$s = (string)($typ);
		$list->Enqueue($s);
	}
	for($i= 0; $i < 7; $i++) {
		echo "\t" . $list->Dqueue();
	}
	echo"\n";
	for($i = 0; $i < $d; $i++) {
		$element= $list->Dqueue();
		echo "" . $element;
	}
	for($i = 1; $i <= $days[$month]; $i++) {
		echo "\t" . $list->Dqueue();
		if ((($i+$d)%7 == 0) || ($i == $days[$month])) {
			echo"\n";
		}
	}

}

GetCalender();
?>