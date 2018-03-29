<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>MRI ATTENDANCE</title>

  </head>
  <body>

<div class="container">


<br/><br/>

<table id="example" class="table table-striped table-hovered table-bordered display">
  <thead>
    <tr>
    <th>No</th>
    <th>User ID</th>
    <th>Nama</th>

    <?php
      require_once("koneksi.php");

      $tanggalb = mysql_query("SELECT
                                DATE(CHECKTIME) AS tanggalaja
                              FROM
                                checkinout
                              WHERE
                                CHECKTIME >= now() - INTERVAL 1 MONTH
                              GROUP BY
                                tanggalaja
                              ORDER BY
                                CHECKTIME ASC");

      while ($tgl = mysql_fetch_array($tanggalb)) {
        echo "<th>".$tgl['tanggalaja']."</th>";
      }
    ?>
  </tr>
  </thead>

  <tbody>

    <?php

      $n = 1;
      $select2 = mysql_query("SELECT USERID,name FROM userinfo ORDER BY USERID");
        while($c=mysql_fetch_array($select2)){
          echo "<tr>";
          echo "<td>".echo $n++."</td>";
          echo "<td>".$c['USERID']."</td>";
          echo "<td>".$c['name']."</td>";

          $date = mysql_query("SELECT min(TIME(CHECKTIME)) AS awal,
            max(TIME(CHECKTIME)) AS akhir,
            DATE(CHECKTIME) AS DateOnly
            FROM checkinout
            WHERE USERID = '117' AND CHECKTIME >= now()-interval 1 month
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

</div>


<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable( {
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );

                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );

                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );
} );
</script>

</body>
</html>
