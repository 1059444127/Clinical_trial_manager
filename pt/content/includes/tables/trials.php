<?php 
// if accessed directly than exit
if (!defined('ABSPATH')) exit;

global $db;
$args = (!is_admin()) ? array('hospital' => get_current_user_hospital()) : array();
$results = get_tabledata(TBL_TRIALS,false,$args);
if( !user_can('view_trial') ):
	echo page_not_found('Oops ! You are not allowed to view this page.','Please check other pages !');
elseif(!$results):
	echo page_not_found("Oops! There is no trials record found",'  ',false);
else:
?>
    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap datatable-buttons" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Type</th>
                <th>No. of Hospitals participating</th>
                <th>Created On</th>
                <th>Activation status</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php 
			if($results):
				foreach($results as $data):
				$type = get_tabledata(TBL_TRIAL_TYPES,true, array('ID' => $data->type));
				$hospital = get_tabledata(TBL_HOSPITALS,true, array('ID' => $data->hospital));
			?>
                <tr>
                    <td>
                        <?php echo stripslashes($data->name);?>
                    </td>
                    <td>
                        <?php echo short_text(stripslashes($data->description));?>
                    </td>
                    <td>
                        <?php echo stripslashes($type->name);?>
                    </td>
                    <td align="center">
                        <?php 
                    $sql1 = "SELECT COUNT(*)FROM tbl_done WHERE ID = $data->ID";
                    $result = $db->query($sql1);
                    
                    print_r($result);
                    ?>
                    </td>
                    <td>
                        <?php echo date('M d,Y',strtotime($data->created_on));?>
                    </td>
                    <td>
                        <?php 
                        
                        
                        if($data->randomised<1){
    


                            
                      
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        
        
        $val2 = $_POST['num2'];
        

        
        
        
        
        $dr01 = "SELECT * FROM tbl_trials WHERE ID = $val2 AND randomised = 0";
        $dr011 = $db->get_results($dr01);
        foreach($dr011 as $res01):
        
        
        $t = "SELECT ID FROM tbl_treatments WHERE trial = $val2";
        $treatVal = $db->query($t);
        
        $treat = $db->get_results($t);
        
        
        
        $dr02 = "SELECT * FROM tbl_done WHERE TrialID = $res01->ID";
        $dr002 = $db->get_results($dr02);
        foreach($dr002 as $res02):
        
        
        
        

        
        $dr03 = "SELECT ClinicsNum FROM tbl_hospitals WHERE ID = $res02->HospitalID";
        $dr033 = $db->get_results($dr03);
        
                $ClinNum =  $dr033{0}->ClinicsNum; 

        
        foreach(range(1,$treatVal)as $i){
            $TreatID = $treat{$i-1}->ID;
            
     
            $dr04 = "SELECT * FROM tbl_key WHERE TreatmentID = $TreatID AND TrialID = $val2 AND HospitalID = $res02->HospitalID";
            $dr004 = $db->query($dr04);
            
            if($dr004 == 0){
                
                
                $dr05= "INSERT INTO tbl_key (KeyVal, TreatmentID, TrialID, HospitalID) VALUES ($i, $TreatID, $val2, $res02->HospitalID)";
                $dr005 = $db->query($dr05);
                
                
            }
        }

        
                          unset($merged);
        $merged=array();
        $va43=0;
                                      foreach(range(1, $treatVal) as $i) {
                                          unset(${'a'.$i});
                                        ${'a'.$i}  = array();
                              }                

        
        $half = $ClinNum/$treatVal;
                        
        foreach(range(1, $treatVal) as $i) {
                          $resultz = $db->query($sql1);
                                  foreach(range(1,$half)as $x){
                                      ${'a'.$i}[] = $i;
                                 
                                  }
                                  
                              }
 
        $merged[] = null;
        foreach(range(1,$treatVal)as $o){
            $merged = array_merge(${'a'.$o},$merged);
        }
         shuffle($merged);
                              $new123 = array_filter($merged);
                              
                              
   
                              
$values  = implode(", ", $new123);
$b = str_replace( ',', '', $values);
        $b = str_replace( ' ', '', $b);

        $dr06 = "SELECT * FROM tbl_randomised WHERE HospitalID =$res02->HospitalID AND TrialID = $val2";
        $dr006 = $db->query($dr06);
        if($dr006==0){
            
            $dr07 = "INSERT INTO tbl_randomised (HospitalID, TrialID, TotTreat, ClinicsNum, RandomString) VALUES ($res02->HospitalID, $val2, $treatVal, $ClinNum, $b)";
            $dr007 = $db->query($dr07);
        }
        
        
        
        endforeach;
        endforeach;
        
        $val = 1;
  $sql = "UPDATE tbl_trials SET randomised=$val WHERE ID = $val2";
$result = $db->query($sql);

              
                        

        
        
        
        
        
        
        
    echo "<script>";
        echo "window.onload = function() {
    if(!window.location.hash) {
        window.location = window.location + '#loaded';
        window.location.reload();
    }
}";
        echo "</script>";
                  
        }          
                  
                  
                  

              
    ?>
                            <form method="post">
                                <input type="hidden" name="num2" value="<?php echo $data->ID; ?>">
                                <input type="submit" value="ACTIVATE"> 
                        </form>
                            <?
  }
                    else{
    
    echo "ACTIVE";
}
                    ?>
                    </td>
                    <td class="text-center">
                        <br>
                        <?php if( user_can('view_treatment') ): ?> <a href="<?php echo site_url();?>/treatments/?trial_id=<?php echo $data->ID;?>" class="btn btn-success btn-xs"><i class="fa fa-cog"></i> Configure</a>
                            <?php endif; ?>
                                <?php if( user_can('edit_trial') ): ?> <a href="<?php echo site_url();?>/edit-trial/?id=<?php echo $data->ID;?>" class="btn btn-dark btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                    <?php endif; ?>
                                        <?php if( user_can('delete_trial') ): ?> <a href="#" class="btn btn-danger btn-xs" onclick="javascript:delete_function(this);" data-id="<?php echo $data->ID;?>" data-action="delete_trial"><i class="fa fa-trash"></i> Delete</a>
                                            <?php endif; ?>
                    </td>
                </tr>
                <?php
            
				endforeach;
			endif;
			?>
        </tbody>
    </table>
    <?php endif; ?>