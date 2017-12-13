<?php
session_start();
//Load all functions
require_once('load.php');

$s1 = "SELECT * FROM tbl_randomised";
$r1 = $db->get_results($s1);
/**
Conditions to enable Randomisation...
1. Randomised string should be halfway or more 
2. The current number of booked clinics should be even (divisible by 2)
**/
foreach($r1 as $a):

    $hospital = get_tabledata(TBL_HOSPITALS,true, array('ID' => $a->HospitalID));
    $trial = get_tabledata(TBL_TRIALS,true, array('ID' => $a->TrialID));
    echo "Hospital: ".$hospital->name;
    echo "<br>";
    echo "Trial: ".$trial->name;
    echo "<br>";
    echo "Current String: ".$a->RandomString;
    echo "<br>";
    $s3 = "SELECT * FROM tbl_key WHERE HospitalID = $a->HospitalID AND TrialID = $a->TrialID";
    $r3 = $db->get_results($s3);
    $num = "SELECT COUNT(*) AS qq FROM tbl_clinics WHERE booked=1 AND hospital = $a->HospitalID AND trial = $a->TrialID";
    $r4 = $db->get_results($num);
    $newTot = $r4[0]->qq + $a->ClinicsNum;
//
$vals = array();
        foreach($r3 as $c):
            $treatment = get_tabledata(TBL_TREATMENTS,true, array('ID' => $c->TreatmentID));
            echo "Treatment: ".$treatment->name;
            echo "<br>";
            $s2 = "SELECT COUNT(*) AS qq FROM tbl_clinics WHERE booked=1 AND hospital = $a->HospitalID AND trial = $a->TrialID AND treatment=$c->KeyVal";
            $r2 = $db->get_results($s2);
            $s5 = "SELECT COUNT(*) AS pp FROM tbl_treatments WHERE trial = $a->TrialID";
            $r5 = $db->get_results($s5);
            $divVal = ($newTot/$r5[0]->pp) - $r2[0]->qq;
            echo "Booked: ". $r2[0]->qq;
            echo "<br>";
            echo "HALF: ".$divVal;
if($divVal>40){
    $divVal=40;
        echo "HALFWAY EXCEEDS 40, SETTING MAX TO 40";
}
            echo "<br>";
            echo "NEW TOT: ".$newTot;
            echo "<br>";

            for($i = 0; $i<$divVal; $i++){
                $vals[] = $c->KeyVal;
            }


        endforeach;
    



if($newTot % 2 == 0) {
shuffle($vals);
$new = implode("",$vals);
echo "NEW Randomised String: ". $new;
echo "<br>";
$sql = "UPDATE tbl_randomised SET RandomString=$new WHERE ID=$a->ID";
$result = $db->query($sql);
echo "UPDATED DATABASE RANDOMISED STRING";
echo "<br>";
}

echo $a->ID;
echo "<br>";
endforeach;

?>
<!DOCTYPE html>
<html>

</html>