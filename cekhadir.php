<?php

//error_reporting(0);

?>


  <table id="example" class="table table-striped table-hovered table-bordered display">
    <thead>
      <tr>
      <th>No</th>
      <th>User ID</th>
      <th>Nama</th>

      <?php

// $currentdays = intval(date("t"));
// $i = 0;
// while ($i++ < $currentdays)
//
//       {
//         echo "<th>".$i."</th>";
//       }



// $start  = new DateTime('first day of this month');
// $end    = new DateTime('first day of this month + 1 month');
// $period = new DatePeriod($start, new DateInterval('P1D'), $end);
//
// foreach($period as $day){
// echo $day->format('Y-M-d')."\n";

$tanggalb = mysql_query("SELECT DATE(CHECKTIME) AS tanggalaja FROM checkinout WHERE CHECKTIME >= now()-interval 1 month GROUP BY tanggalaja ORDER BY CHECKTIME ASC");
while($go=mysql_fetch_array($tanggalb)){

?>

      <th><?php echo $go['tanggalaja']; ?></th>


<?php


}
?>
    </tr>
    </thead>

    <tbody>

        <?php

include "koneksi.php";
$n=1;



        $select2=mysql_query("SELECT USERID,name FROM userinfo ORDER BY USERID");
        while($c=mysql_fetch_array($select2)){

         ?>

        <tr>
          <td><?php echo $n++ ?></td>
          <td><?php echo $c['USERID']; ?></td>
          <td><?php echo $c['name']; ?></td>
          <?php



            // $date = mysql_query("SELECT min(TIME(CHECKTIME)) AS timeonly,max(TIME(CHECKTIME)) AS timeonly2, DATE(CHECKTIME) AS DateOnly FROM checkinout WHERE USERID = $c[USERID] AND CHECKTIME >= now()-interval 1 month GROUP BY DateOnly ORDER BY CHECKTIME ASC");

     $date = mysql_query("SELECT min(TIME(CHECKTIME)) AS timeonly,
                                  max(TIME(CHECKTIME)) AS timeonly2,
                                  DATE(CHECKTIME) AS DateOnly
                                  FROM checkinout
                                                WHERE USERID = $c[USERID] AND CHECKTIME >= now()-interval 1 month
                                                GROUP BY DateOnly
                                                ORDER BY CHECKTIME ASC");

            while($row_date = mysql_fetch_array($date)){

              echo "<td>".date('H:i', strtotime($row_date['timeonly'])). " s/d " .date('H:i', strtotime($row_date['timeonly2'])). "</td>";

            }
          ?>
        </tr>

      <?php  }?>

    </tbody>

    <tfoot>
      <tr>
      <th>No</th>
      <th>User ID</th>
      <th>Nama</th>
      <?php
// $currentdays = intval(date("t"));
// $i = 0;
// while ($i++ < $currentdays)
//
//       {
//         echo "<th>".$i."</th>";
//       }
$start  = new DateTime('first day of this month');
$end    = new DateTime('first day of this month + 1 month');
$period = new DatePeriod($start, new DateInterval('P1D'), $end);

foreach($period as $day){

?>


      <th><?php echo $day->format('Y-M-d')."\n"; ?></th>

<?php
}
?>
    </tr>
    </tfoot>
  </table>
