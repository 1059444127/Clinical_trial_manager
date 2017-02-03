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
        <script src="<?php echo JS_URL;?>jquery-1.12.4.min.js"></script>
        <script src="<?php echo JS_URL;?>canvasjs.min.js"></script>
        
        <?php echo get_wp_head();?>
    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <?php echo get_wp_header();?>
                    <!-- page content -->
                    <div class="right_col" role="main">
                        <!-- top tiles -->
                        
                        <?php if(is_admin()): ?>
                        <div class="row tile_count">
                            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count"> <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
                                <div class="count">
                                    <?php echo count( get_tabledata(TBL_USERS,false));?>
                                </div>
                                <!--                                <span class="count_bottom"><i class="green">4%</i> From last Week</span> --></div>
                            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count"> <span class="count_top"><i class="fa fa-user"></i> Total Hospitals</span>
                                <div class="count">
                                    <?php echo count( get_tabledata(TBL_HOSPITALS,false));?>
                                </div>
                                <!--                                <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34%</i> From last Week</span> --></div>
                            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count"> <span class="count_top"><i class="fa fa-user"></i> Total Rooms</span>
                                <div class="count">
                                    <?php echo count( get_tabledata(TBL_ROOMS,false));?>
                                </div>
                                <!--                                <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12%</i> From last Week</span> --></div>
                            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count"> <span class="count_top"><i class="fa fa-user"></i> Total Clinics</span>
                                <div class="count">
                                    <?php echo count('clinics');?>
                                </div>
                            </div>
                        </div>
                        <?php endif;?>
                        <div> </div>
                        <?php
                        
            
                        
                    
                    ?>
                            <br />
                        <?php if(is_admin()): ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Current Trials <small>Progeess</small></h2>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
                                            <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="#">Settings 1</a> </li>
                                                    <li><a href="#">Settings 2</a> </li>
                                                </ul>
                                            </li>
                                            <li><a class="close-link"><i class="fa fa-close"></i></a> </li>
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
                                                        theme: "theme2"
                                                        , animationEnabled: true
                                                        , title: {
                                                            text: "<?php echo $res01->name;?>"
                                                        }
                                                        , data: [
                                                            {
                                                                type: "pie"
                                                                , dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
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
                                                <div id="chartContainer<?php echo $num;?>"> </div>
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
                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
                                                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li><a href="#">Settings 1</a> </li>
                                                        <li><a href="#">Settings 2</a> </li>
                                                    </ul>
                                                </li>
                                                <li><a class="close-link"><i class="fa fa-close"></i></a> </li>
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

                                                
                                                
                                                
                                                endforeach;
                                                endforeach;
                                                endforeach;
                                                endforeach;                                           
                                                endforeach;
                                                
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                                        <?php endif; ?>
                                
                                
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2>Current Trials <small>Treatment Distribution</small></h2>
                                            <ul class="nav navbar-right panel_toolbox">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
                                                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li><a href="#">Settings 1</a> </li>
                                                        <li><a href="#">Settings 2</a> </li>
                                                    </ul>
                                                </li>
                                                <li><a class="close-link"><i class="fa fa-close"></i></a> </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">
                                            <div class="">
                                                

                                                <?php 
                                                
                                                
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