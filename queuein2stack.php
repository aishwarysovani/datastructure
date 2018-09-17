<?php
include "utility.php";
function GetCalenderStack() {
	print"\n enter the month ";
	$month=readline();
	print"\n enter the year ";
	$year=readline();
	$months=array("", "January", "February", "March",
		"April", "May", "June", "July", "August", "September",
		"October", "November", "December");
	$days=array(0, 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);


	if($month == 2 && isLeapYear($year)) {
		$days[$month] = 29;
    }
    
    print "\n " . $months[$month] .  $year;
    
	// insert into 1st stack
    $st1= new Stack1();
    $a1=array("Su","Mo","Tu","We","Th","Fr","Sa");
    echo"\n";
	$st1->push($a1[0]);
	$st1->push($a1[1]);
	$st1->push($a1[2]);
	$st1->push($a1[3]);
	$st1->push($a1[4]);
	$st1->push($a1[5]);
	$st1->push($a1[6]);
	$d=Day($month, 1, $year);
	
	for ($i = 0; $i < $d; $i++) {
		$st1->push("\t");
	}
	for($i = 1; $i <= $days[$month]; $i++) {
		$typ = (int)($i);
		$s = (string)($typ);
		$st1->push($s);
	}
    
    // insert into 2nd stack
	$st2= new Stack1();
	for($i= 0; $i < 7; $i++) {
		$st2->push($st1->pop());
	}
	echo"\n";
	for($i = 0; $i < $d; $i++) {
		$element = $st1->pop();
		$st2->push($element);
	}
	for($i = 1;$i <= $days[$month]; $i++) {
		$element= $st1->pop();
		$st2->push($element);

	}
	// using second stack display calender
	for($i= 0;$i < 7; $i++) {
		echo "\t" . $st2->pop();
	}
	echo"\n";
	for ($i = 0; $i < $d; $i++) {
		$element= $st2->pop();
		echo "  " . $element;
	}
	for($i = 1; $i <= $days[$month]; $i++) {
		echo "\t" . $st2->pop();
		if ((($i+$d)%7 == 0) || ($i == $days[$month])) {
			echo"\n";
		}
	}
}


GetCalenderStack() ;


?>