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
            $divVal = ($newTot/2) - $r2[0]->qq;
            echo "Booked: ". $r2[0]->qq;
            echo "<br>";
echo $divVal;

for($i = 0; $i<$divVal; $i++){
    $vals[] = $c->KeyVal;
}
            echo "<br>";

        endforeach;
    


if(($a->ClinicsNum/2)>=$r4[0]->qq && $newTot % 2 == 0) {
shuffle($vals);
$new = implode("",$vals);
echo "NEW Randomised String: ". $new;
echo "<br>";
echo "<br>";
$sql = "UPDATE tbl_randomised SET RandomString=$new WHERE ID=$a->ID";
$result = $db->query($sql);
echo "UPDATED RANDOMISED STRING";
echo "<br>";
}
echo $a->ID;
endforeach;

?>
<!DOCTYPE html>
<html>

</html>