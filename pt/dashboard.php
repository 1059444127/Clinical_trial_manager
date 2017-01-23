<?php
session_start();
//Load all functions
require_once('load.php');
include("phpgraphlib.php");
include("phpgraphlib_pie.php");
include("phpgraphlib_stacked.php");

login_check();
error_reporting(0);
ini_set('display_errors', 0);
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>
            <?php echo get_site_name();?>
        </title>
                <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<script src="http://canvasjs.com/assets/script/canvasjs.min.js"></script>
        <?php echo get_wp_head();?>
    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <?php echo get_wp_header();?>
                    <!-- page content -->
                    <div class="right_col" role="main">
                        <!-- top tiles -->
                        <div class="row tile_count">
                            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count"> <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
                                <div class="count">
                                    <?php echo count( get_tabledata(TBL_USERS,false));?>
                                </div> 
<!--                                <span class="count_bottom"><i class="green">4%</i> From last Week</span> -->
                            </div>
                            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count"> <span class="count_top"><i class="fa fa-user"></i> Total Hospitals</span>
                                <div class="count">
                                    <?php echo count( get_tabledata(TBL_HOSPITALS,false));?>
                                </div> 
<!--                                <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34%</i> From last Week</span> -->
                            </div>
                            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count"> <span class="count_top"><i class="fa fa-user"></i> Total Rooms</span>
                                <div class="count">
                                    <?php echo count( get_tabledata(TBL_ROOMS,false));?>
                                </div> 
<!--                                <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12%</i> From last Week</span> -->
                            </div>
                            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count"> <span class="count_top"><i class="fa fa-user"></i> Total Clinics</span>
                                <div class="count">
                                    <?php echo count('clinics');?>
                                </div> 
<!--                                <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34%</i> From last Week</span> -->
                            </div>
                        </div>
                        <div> </div>
                        <?php
                                        $args = (!is_admin()) ? array('hospital' => get_current_user_hospital()) : array();
                                        $results = get_tabledata(TBL_BOOKINGS,false,$args);
                    $results2 = get_tabledata(TBL_TRIALS,false,$args);
                 
                        
                        
                        
                    
                    ?>
                            <br />
                            
   

                       
                        
                        
                        
                               <?php
                                
                                 foreach($results2 as $data):
                                
                                echo "Trial: ".$data->ID;
                                                        echo "<br>";
                        $dr01 = "SELECT * FROM tbl_done WHERE TrialID = $data->ID";
                        $dr001 = $db->get_results($dr01);
                        
                        foreach($dr001 as $res01):
                                              $sum2 = 0;
                        echo "Hospital: ".$res01->HospitalID;
                                echo "<br>";
                        
                        $dr02 = "SELECT * FROM tbl_hospitals WHERE ID = $res01->HospitalID";
                        $dr002 = $db->get_results($dr02);
                        
                        foreach($dr002 as $res02):
                        
                        echo "Expected Clinics: ".$res02->ClinicsNum;
                        echo "<br>";
                        
                        
                         $sql2 = "SELECT * FROM tbl_clinics WHERE trial = $data->ID AND hospital = $res01->HospitalID";
                        $done2 = $db->get_results($sql2);
        $vaqq = 0;
                        foreach ($done2 as $dun2):
             
                    
                        $sql3 = "SELECT * FROM tbl_bookings WHERE status = 1 AND clinic = $dun2->ID";
                        $done3 = $db->query($sql3);
                  $vaqq+=1;      
                                           endforeach;
                        
                        

                        endforeach;
                        echo "Completed Clinics: ". $vaqq;
                        echo "<br>";
                                              

                        
                        $dr03 = "SELECT SUM(expected) as sum FROM tbl_clinics WHERE trial = $data->ID AND hospital = $res01->HospitalID";
                        $dr003 = $db->get_results($dr03);
                        echo "Expected Attendance: ".$dr003{0}->sum;
                        echo "<br>";
                        

                                           //gets Actual results
                        $sql2 = "SELECT * FROM tbl_clinics WHERE trial = $data->ID and hospital = $res01->HospitalID";
                        $done2 = $db->get_results($sql2);
                        $bun = 0;
                        foreach ($done2 as $dun2):
             
                    
                        $sql3 = "SELECT actual FROM tbl_bookings WHERE status = 1 AND clinic = $dun2->ID";
                        
                        $done3 = $db->get_results($sql3);
                                   foreach ($done3 as $dd):
                        $bun += $dd->actual;
                        endforeach;
                       
                        
                   endforeach;
                                                echo "Actual Attendance:". $bun."</td>"; 
                        echo "<br>";
                        
                        
                        $dr04 = "SELECT * FROM tbl_treatments WHERE trial = $data->ID";
                        $dr0004 = $db->query($dr04);
                        $dr004 = $db->get_results($dr04);
                        foreach($dr004 as $res04):
                        
                        
                        $dr05 = "SELECT * FROM tbl_key WHERE TreatmentID = $res04->ID AND hospitalID = $res01->HospitalID";
                        $dr005 = $db->get_results($dr05);
                        foreach($dr005 as $res05):
                        
       
                        $tots = 0;
                        $tats = 0;
                        $dr06 = "SELECT * FROM tbl_clinics WHERE treatment = $res05->KeyVal AND hospital = $res01->HospitalID AND trial = $data->ID";
                        $dr0006 = $db->query($dr06);
                        $dr006 = $db->get_results($dr06);
                        foreach($dr006 as $res06):
                        $tats += $res06->expected;
                        $dr07 = "SELECT * FROM tbl_bookings WHERE status = 1 AND clinic = $res06->ID";
                        $dr0007 = $db->query($dr07);
                        $dr007 = $db->get_results($dr07);
                        foreach($dr007 as $res07):
                        $tots += $res07->actual;
                        endforeach;
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        echo "EXPECTED: Expecte Clinics for Treatment - ".$res04->name." = ".$dr0006." Number of Participants: ".$tats."<br>";
                        
                        
                        echo "ACTUAL: Completed Clinics for Treatment - ".$res04->name." = ".$dr0007." Number of Participants: ".$tots."<br>";
                       
                      
                        
                        
                        endforeach;
                        endforeach;
                        endforeach;
                        
                        $blbl = $res02->ClinicsNum-$vaqq;
                        
                        if( $blbl/$dr0004 % 2 == 0){
                        ?>
                                                    <form method="post">
                                                        <input type="hidden" name="num2" value="<?php echo $data->ID; ?>">
                                                        <input type="hidden" name="num3" value="<?php echo $res01->HospitalID; ?>">
                                                        
                                                        <input type="submit" value="RANDOMISE"> </form>
                                                    <?
                        }
                                                                                if($_SERVER['REQUEST_METHOD'] == "POST"){
                                                            $hosp;
                                                                $val2 = $_POST['num2'];
                                                                $val3 = $_POST['num3'];
                                                                                    
                                                                                
                                                                                    
                                                                                    $dr08 = "SELECT * FROM tbl_randomised WHERE TrialID = $val2 AND HospitalID = $val3";
                                                                                    $dr008 = $db->get_results($dr08);
                                                                                    foreach($dr008 as $res08):
                                                                                    
                                                                                    
                                                                                                              unset($merged);
        $merged=array();
        $va43=0;
                                                                                    echo $cq;
                                                                                    echo "<br>";
                                      foreach(range(0, $cq) as $i) {
                                          unset(${'a'.$i});
                                        ${'a'.$i}  = array();
                              }   
                                                                                    
                                                                                    $dr09 = "SELECT * FROM tbl_treatments WHERE trial = $val2";
                                                                                    $dr0009 = $db->query($dr09);
                                                                                    $dr009 = $db->get_results($dr09);
                                                                                    $cq = 0;
                                                                                    foreach($dr009 as $res09):
                                                                                    
                                                                                 $dr10 = "SELECT * FROM tbl_key WHERE TreatmentID = $res09->ID AND TrialID = $val2 AND HospitalID = $val3";
                                                                                    $dr010 = $db->get_results($dr10);
                                                                                    foreach($dr010 as $res10):
                                                                                    $cq+=1;
                                                                                    $dr11 = "SELECT * FROM tbl_clinics WHERE trial = $val2 and treatment = $res10->KeyVal AND hospital = $val3";
                                                                                    $dr011 = $db->get_results($dr11);
                                                                                    $cut = 0;
                                                                                    foreach($dr011 as $res11):
                                                                                    
                                                                                    $dr12 = "SELECT * FROM tbl_bookings WHERE clinic = $res11->ID and status = 1";
                                                                                    $dr012 = $db->get_results($dr12);
                                                                                    foreach($dr012 as $res12):
                                                                                    
                                                                                    $cut += 1;
                                                                                    
                                                                                    endforeach;
                                                                                    endforeach;

                                                                                    
                                                                                         
                          
                                                                                    $half1 = $res08->ClinicsNum/$dr0009;
                                                                                    $half = $half1-$cut;
                                                                                    
                                                                                    
                                                                                  
                        
                                                                                    endforeach;
                                                                                    
                                                                                    
                                                                                    echo "Treatment NAME: ".$res09->name." REMAINING: ".$half;

                                                                                    echo "<br>";
                                                                                    echo "COUNT: ".$cq;
                                                                                    echo "<br>";
                                                                                    
                                                                                                foreach(range(1,$half)as $x){
                                                                                                    ${'a'.$cq}[] = $cq; 
                                                                                                    
                                 
                                                                                    
                                                                                                                             }
                                                                                    
                                                                                    
                                                                                    endforeach;
                                             
                                                                                    
                                                                          
                                                                            
                                                                                    endforeach;
                                                                                             foreach(range(1, $cq) as $i) {
                                                                                                 print_r(${'a'.$i});
                                                                                                 echo "<br>";
                                  
                                                                                                                             }
                                                                                    
                                                                                     $merged[] = 0;
                              foreach(range(1,$cq)as $p){
                                  
                                  $merged = array_merge(${'a'.$p},$merged);

                            
}
      shuffle($merged);
                              $new123 = array_filter($merged);
                              
                              
   
                              
$values  = implode(", ", $new123);
$b = str_replace( ',', '', $values );
                              

                                                            
                              $b = preg_replace('/\s+/', '', $b);  
                        $sql1 = "UPDATE tbl_randomised SET RandomString = $b WHERE HospitalID = $val3 AND TrialID = $val2";              
                          $resultz = $db->query($sql1);
echo $b;
                                                                                    echo "<br>";
                                                            
                                                    
                                                
                                                            
                                                            echo "<script>";
                                                            echo "window.onload = function() {
                                                            if(!window.location.hash) {
                                                            window.location = window.location + '#loaded';
                                                            window.location.reload();
                                                            }
                                                            }";
                                                            echo "</script>";
                                                        }
                                
                         echo "<br>";                               
                                


                        endforeach;
                 
                                                        endforeach;
    ?>
                        
                        
                        
                        
                      
                        

                         
                        
                        
                        
                        
                        
                        
                        <div class="col-md-6 col-sm-6 col-xs-12">
									<div class="x_panel">
										<div class="x_title">
											<h2>Current Trials <small>Progeess</small></h2>
											<ul class="nav navbar-right panel_toolbox">
												<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
												</li>
												<li class="dropdown">
													<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
													<ul class="dropdown-menu" role="menu">
														<li><a href="#">Settings 1</a>
														</li>
														<li><a href="#">Settings 2</a>
														</li>
													</ul>
												</li>
												<li><a class="close-link"><i class="fa fa-close"></i></a>
												</li>
											</ul>
											<div class="clearfix"></div>
										</div>
										<div class="x_content">
											
											
                                            
                                            
                                                                    <?php
                    $qa1 = "SELECT * FROM tbl_trials";
                        
                        $qa11 = $db->get_results($qa1);
                        $num = 0;
                        foreach($qa11 as $res01):

                        
                        $num+=1;
                         
                        
                                                           $sum41 = 0;
                        
                        $to = $res01->participants;
                        
                        
                        $qa2 = "SELECT * FROM tbl_clinics WHERE trial = $res01->ID";
                        $qa22 = $db->get_results($qa2);
                        

                        foreach($qa22 as $res02):
                        
                         $qa3 = "SELECT * FROM tbl_bookings WHERE clinic = $res02->ID";
                        $qa33 = $db->get_results($qa3);

                        foreach($qa33 as $res03):
                        $sum41 += $res03->actual;
                        
                        
                        
                        endforeach;               
                        endforeach;               
                        
              
                        
                        //${'a'.$num}[] = $cq;
                        $subway = $res01->participants - $sum41;                               
        $dataPoints = array(
            
            array("y" => $subway, "label" => "TODO"),
            array("y" => $sum41, "label" => "DONE")
        );
                        
                        ?>
                        
                          <script type="text/javascript">
 
            $(function () {
                var chart = new CanvasJS.Chart("chartContainer<?php echo $num;?>", {
                    theme: "theme2",
                    animationEnabled: true,
              title: {
                text: "<?php echo $res01->name;?>"
            },
                    data: [
                    {
                        type: "pie",                
                        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                    }
                    ]
                });
                chart.render();
            });
        </script>
                          <?php 
                                                     foreach(range(1,$num)as $x){
                                                      echo "<br>";   
                                                     }
                                                     ?>


                                                <div id ="chartContainer<?php echo $num;?>">
                                                    

                                                
                                                
                        </div>

                        
                        
                        
                        <?php
                        echo "<br>";
                        echo "<br>";
                        echo "<br>";
                        echo "<br>";
                        echo "<br>";
                        echo "<br>";
                        echo "<br>";
                        echo "<br>";
                        echo "<br>";
                        echo "<br>";
                        echo "<br>";
                        echo "<br>";
                        echo "<br>";
                        echo "<br>";
                        echo "<br>";
                        echo "<br>";
                        echo "<br>";
                        echo "<br>";
                        echo "<br>";
                        echo "<br>";
                        endforeach;                        
                        ?>
                                            
                                            
                                            
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
                        
                        
                        
                        
                        
                        
                        
                        
                        <div class="row">




								<!-- Start to do list -->
								<div class="col-md-6 col-sm-6 col-xs-12">
									<div class="x_panel">
										<div class="x_title">
											<h2>Current Trials <small>Treatment Distribution</small></h2>
											<ul class="nav navbar-right panel_toolbox">
												<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
												</li>
												<li class="dropdown">
													<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
													<ul class="dropdown-menu" role="menu">
														<li><a href="#">Settings 1</a>
														</li>
														<li><a href="#">Settings 2</a>
														</li>
													</ul>
												</li>
												<li><a class="close-link"><i class="fa fa-close"></i></a>
												</li>
											</ul>
											<div class="clearfix"></div>
										</div>
										<div class="x_content">

											<div class="">
												  <div id="chartContainer"></div>

<?php 
                                                $do1 = "SELECT * FROM tbl_trials";
                                                $do11 = $db->get_results($do1);
                                                foreach($do11 as $res1):
                                                
                                                
                                                $do2 = "SELECT * FROM tbl_treatments WHERE trial = $res1->ID";
                                                $do22 = $db->get_results($do2);

                                                foreach($do22 as $res2):
$val1 = 0;                                                
    
                                                
                                                $do3 = "SELECT * FROM tbl_key WHERE TreatmentID = $res2->ID";
                                                $do33 = $db->get_results($do3);
                                                foreach($do33 as $res3):
                                                

                                                
                                                $do4 = "SELECT * FROM tbl_clinics WHERE trial = $res1->ID AND treatment = $res3->KeyVal";
                                                $do44 = $db->get_results($do4);
                                                foreach($do44 as $res4):

                                                
                                                $do5 = "SELECT * FROM tbl_bookings WHERE clinic = $res4->ID";
                                                $do55 = $db->get_results($do5);
                                                foreach($do55 as $res5):
                                                
                                                
$val1+=$res5->actual;
                                                echo "TRIAL: ".$res1->ID." TREATMENT: ".$res2->ID." PARTICIPANTS: ".$res5->actual;
                                                echo "<br>";
                                                echo "<br>";
                                                
                                                
                                                
                                                endforeach;
                                                endforeach;
                                                endforeach;

                                                echo "TOTOL: ".$val1/2;
                                                echo "<br>";     
                                                endforeach;
                                                                                           
                                                endforeach;
                                                
                                                ?>
                                                
											</div>
										</div>
									</div>
								</div>
                </div>

								
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                </div>
                
                
                    </div>
                    <!-- /page content -->
                    <!-- footer content -->
                    <?php echo get_wp_footer();?>
                        <!-- /footer content -->
            </div>
        </div>
    </body>

    </html>