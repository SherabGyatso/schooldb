<?php
/* entry for student, staff and result record */

require_once 'includes/config.php';
require_once 'classes/class.main.php';
require_once 'classes/class.db.php';
require_once 'classes/class.school.php';
require_once 'classes/class.student.php';
require_once 'classes/class.class.php';


$db = new database();
$school = new school($db);

$sch_head = new main_class($db);
$sch = new school($db);
$dls = $sch_head->get_deadline();

#$schools = $school->get_school();

include('includes/header1.php');
error_reporting(E_ALL);
#h_school = $school->get_student_total_by_schools();

?>


<table class="table table-bordered table-striped table-hover table-condensed table-responsive">
    <thead>
        <tr rowspan="">
            <td colspan="21" align="center">
                <h2>School Wise Student Enrolment As On</h2> 
                <?php
                    if(isset($_POST['dl']) && $_POST['dl'] !='') {
                        $dl_cond = $_POST['dl'];
                    }
                ?>


                <form action="" method="POST" class="print_disable">
                    <label> Select Date</label>
                    <select name="dl" style="font-size: 18px;">
                        <?php

                        if (is_array($dls) && count($dls)) {
                            foreach ($dls as $dl) {
                        # echo "<option value='{$dl['deadline']}'>{$dl['deadline']}</option>";

                                echo "<option value='{$dl['deadline']}'";
                                if ( ( $dl['deadline'] == $dl_cond ) && !empty( $dl_cond ) ) { 
                                    echo ' selected';
                                }
                               echo ">{$dl['deadline']}</option>" . "\n";
                            }
                        }
                        ?>
                    </select>
                    <input type="submit" value="Choose" />
                </form>
                </td>
            </tr>
             <tr>

                <th rowspan="2" >S.no</th>
                <th rowspan="2" align="center">School Name</th>
                <th colspan="3" align="center">Tibetan</th>
                <th colspan="3" align="center">Indian </th>
                <th colspan="3" align="center">Himalayan </th>
                <th colspan="3" align="center">Dayscholar </th>
                <th colspan="3" align="center">Boarder</th>
                <th colspan="3" align="center">Grand Total</th>
                <!--<th rowspan="2" width="9%">Dead Line</th>-->

            </tr>
            <tr>   

                <th>Boys </th>
                <th>Girls </th>
                <th>Total </th>
                <th>Boys</th>
                <th>Girls</th>
                <th>Total </th>
                <th>Boys</th>
                <th>Girls</th>
                <th>Total </th>
                <th>Boys</th>
                <th>Girls</th>
                <th>Total </th>
                <th>Boys</th>
                <th>Girls</th>
                <th>Total</th>
                <th>Boys</th>
                <th>Girls</th>
                <th>Total</th>

            </tr>
        
           
            </thead>

     
        <?php

           $h_student_data = $school->get_student_total_by_schools($dl_cond);
           $schools = $sch->get_school_list();

           $i = 1; $totboy = 0; $totgirl = 0; $totaltib = 0 ; $tothboy = 0; $tothgirl = 0; $totalhim = 0; $totiboy = 0;     $totigirl = 0; $totindian = 0;  $totdboy = 0; $totdgirl = 0; $totday = 0; $totbboy = 0; $totbgirl = 0; $totboard = 0; $totalboy = 0; $totalgirl = 0; $grandtot = 0;


           if (is_array($h_student_data) && count($h_student_data)) {
               foreach ($h_student_data as $row) {


                     $tboy = $row['tibetanboys'];
                     $tgirl = $row['tibetangirls'];
                     $tottib = $row['total1'];
                     $hboy = $row['himalayanboys'];
                     $hgirl = $row['himalayangirls'];
                     $tothim = $row['total2'];
                     $iboy = $row['Indianboys'];
                     $igirl = $row['Indiangirls'];
                     $totind = $row['total3'];
                     $dboy = $row['Dayboys'];
                     $dgirl = $row['Daygirls'];
                     $totd = $row['total4'];
                     $bboy = $row['boardingboys'];
                     $bgirl = $row['boardinggirls'];
                     $totb = $row['total5'];
                     $totby = $row['TotalBoy'];
                     $totgl = $row['TotalGirl'];
                     $gtot = $row['Grand Total'];


                     $totboy += $tboy;
                     $totgirl += $tgirl;
                     $totaltib += $tottib;
                     $tothboy += $hboy;
                     $tothgirl += $hgirl;
                     $totalhim += $tothim;
                     $totiboy += $iboy;
                     $totigirl += $igirl;
                     $totindian += $totind;
                     $totdboy += $dboy;
                     $totdgirl += $dgirl;
                     $totday += $totd;
                     $totbboy += $bboy;
                     $totbgirl += $bgirl;
                     $totboard += $totb;
                     $totalboy += $totby;
                     $totalgirl += $totgl;
                     $grandtot += $gtot;


                   ?>



                    <tr>

                        <td><?php echo $i; ?></td>

                        <td><?php echo $row['SchoolName']; ?></td>
                        <td><?php echo $row['tibetanboys']; ?></td>
                        <td><?php echo $row['tibetangirls']; ?></td>
                        <td><?php echo $row['total1']; ?></td>
                        <td><?php echo $row['himalayanboys']; ?></td>
                        <td><?php echo $row['himalayangirls']; ?></td>
                        <td><?php echo $row['total2']; ?></td>
                        <td><?php echo $row['Indianboys']; ?></td>
                        <td><?php echo $row['Indiangirls']; ?></td>
                        <td><?php echo $row['total3']; ?></td>
                        <td><?php echo $row['Dayboys']; ?></td>
                        <td><?php echo $row['Daygirls']; ?></td>
                        <td><?php echo $row['total4']; ?></td>
                        <td><?php echo $row['boardingboys']; ?></td>
                        <td><?php echo $row['boardinggirls']; ?></td>
                        <td><?php echo $row['total5']; ?></td>
                        <td><?php echo $row['TotalBoy']; ?></td>
                        <td><?php echo $row['TotalGirl']; ?></td>
                        <td><?php echo $row['Grand Total']; ?></td>
                        <!--<td><?php //echo $row['deadline']; ?></td>-->

                    </tr>

                    <?php

                    $i++; 

                }
            }

            ?>


                   <tr>
            <td colspan="2">GRAND TOTAL</td>
            <td><?php echo $totboy ?></td> 
            <td><?php echo $totgirl ?></td>
            <td><?php echo $totaltib ?></td>
            <td><?php echo $tothboy?></td>
            <td><?php echo $tothgirl ?></td>
            <td><?php echo $totalhim ?></td>
            <td><?php echo $totiboy ?></td>
            <td><?php echo $totigirl ?></td>
            <td><?php echo $totindian ?></td>
            <td><?php echo $totdboy ?></td>
            <td><?php echo $totdgirl ?></td>
            <td><?php echo $totday ?></td>
            <td><?php echo $totbboy ?></td>
            <td><?php echo $totbgirl ?></td>
            <td><?php echo $totboard ?></td>
            <td><?php echo $totalboy ?></td>
            <td><?php echo $totalgirl ?></td>
            <td><?php echo $grandtot ?></td>
    
        </div>
