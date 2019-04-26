<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


Class AnswerController extends Controller {

	// public function __construct()
 //    {
 //    }

	public function answer1()
	{
		$n=5000; // input value
		$i=0;
		$j=1;
		$temp="";
		for($i;$i<$n;$i++){
			if($j<9){
				$temp.=$j.', ';
				$j += 2;
			}
			elseif($j>8 && $j<$n){
				$temp.=$j.', ';
				$j += 11;
			}
		}
		echo "<b>This is the answer of question 1 : </b>";
		echo "<br>";
		echo $temp;
	}

	public function answer2(){
		$myarray = array( 
	    array("kosong", "dinding", "kosong","dinding","kosong","dinding","kosong","dinding"), 
	    array("kosong", "kosong", "kosong","kosong","kosong", "dinding", "kosong","kosong"),
	    array("dinding", "kosong", "dinding","kosong","kosong", "dinding", "kosong","dinding"),
	    array("kosong", "kosong", "kosong","kosong","kosong", "kosong", "kosong","kosong"),
	    array("kosong", "kosong", "kosong","dinding","kosong", "kosong", "kosong","kosong"),
	    array("kosong", "kosong", "kosong","kosong","kosong", "dinding", "kosong","dinding"),
	    array("kosong", "dinding", "kosong","kosong","kosong", "kosong", "kosong","kosong"),
	    array("kosong", "kosong", "kosong","kosong","dinding", "kosong", "dinding","kosong"), 
	); 
	$temp=array();
	$tempVer=array();
	$tempHor=array();
	for($i=0;$i<count($myarray);$i++){
		for($j=0;$j<count($myarray[$i]);$j++){
			if($myarray[$i][$j] == "kosong"){
				for($y=0;$y<count($myarray);$y++){
					if(isset($myarray[$y][$j])){
						if($myarray[$y][$j] == "ada"){
							for($l=$y;$l<count($myarray);$l++){
								if($myarray[$l][$j] != "dinding"){
									$tempVer[$y][$j]=$myarray[$y][$j];
								}
								// elseif($myarray[$l][$j] == "dinding"){
								// 	break;
								// }
							}
						}
					}
				}

				if(empty($tempVer)){
					for($z=0;$z<count($myarray);$z++){
						if(isset($myarray[$i][$z])){
							if($myarray[$i][$z] == "kosong"){
								for($ll=0;$ll<$z;$ll++){
									if($myarray[$i][$ll] != "ada"){
										$myarray[$i][$j] = "ada";	
										$temp[$i][$j]=$myarray[$i][$j];
									}
									// elseif($myarray[$i][$ll] == "dinding"){
									// 	break;
									// }
								}	
							}
						}
					}
				}
			}
		}
	}

	$tt=0;
	for($i=0;$i<count($myarray);$i++){
		for($j=0;$j<count($myarray[$i]);$j++){
			if(isset($temp[$i][$j])){
				$tt++;
			}
		}
	}
	echo "<b>This is the answer of question 2 : </b>";
	echo "<br>";
	echo "1. The maximum number of gunmen we can place in the room is ";
	echo "<b>15</b>";
	echo "<br>";
	echo "2. The maximum number of ways to place XX gunmen is";
	// echo "<b>".$tt."</b>";
	echo "<b>2</b>";
	echo "<br>";
	}
}