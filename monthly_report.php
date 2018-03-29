<?php
$link = mysql_connect('localhost', 'root', '');
$db = mysql_select_db('hadirhadir');

if(isset($_POST['submit'])){

$bulan=$_POST['bulan'];
$tahun=$_POST['tahun'];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <title>MRI Monthly Report ATTENDANCE</title>
  </head>
  <body>

<div class="container">

  <h3><center>MRI Monthly ATTENDANCE Report <?php echo $bulan." - ".$tahun; ?></center></h3>

  <div class="responsive-table">
    <table id="example" class="table table-striped table-hovered table-bordered display">

      <thead>
        <?php
        $tgl = 1;
        $jumtgl = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
        ?>

        <tr>
        <?php
        $sql = mysql_query("SELECT A.USERID as nip, A.name as nama,
      				group_concat(A.1) as '1', group_concat(A.2) as '2',
      				group_concat(A.3) as '3', group_concat(A.4) as '4',
      				group_concat(A.5) as '5', group_concat(A.6) as '6',
      				group_concat(A.7) as '7', group_concat(A.8) as '8',
      				group_concat(A.9) as '9', group_concat(A.10) as '10',
      				group_concat(A.11) as '11', group_concat(A.12) as '12',
      				group_concat(A.13) as '13', group_concat(A.14) as '14',
      				group_concat(A.15) as '15', group_concat(A.16) as '16',
      				group_concat(A.17) as '17', group_concat(A.18) as '18',
      				group_concat(A.19) as '19', group_concat(A.20) as '20',
      				group_concat(A.21) as '21', group_concat(A.22) as '22',
      				group_concat(A.23) as '23', group_concat(A.24) as '24',
      				group_concat(A.25) as '25', group_concat(A.26) as '26',
      				group_concat(A.27) as '27', group_concat(A.28) as '28',
      				group_concat(A.29) as '29', group_concat(A.30) as '30',
      				group_concat(A.31) as '31'
      				from v_monthly_report as A
      				WHERE MONTH(tanggal) = '".$bulan."' AND YEAR(tanggal) = '".$tahun."' group by A.USERID");
        ?>
          <th>No</th>
          <th>UserID</th>
          <th>Nama Pegawai</th>

        <?php

        while($tgl <= $jumtgl){
          echo "<th><b>".$tgl."</b></th>";
          $tgl++;
        }
        ?>
        </tr>
      </thead>

      <tbody>
          <?php
          $no = 1;
          while ($isi = mysql_fetch_array($sql)){

          echo "<tr>
						<td>".$no."</td>
						<td>".$isi['nip']."</td>
						<td valign='top' style='white-space:nowrap'>".$isi['nama']."</td>";

						$coba1 = explode(',', $isi['1']);
						echo "<td>".current($coba1)." --- ".end($coba1)."</td>";

						$coba2 = explode(',', $isi['2']);
						echo "<td>".current($coba2)." --- ".end($coba2)."</td>";

						$coba3 = explode(',', $isi['3']);
						echo "<td>".current($coba3)." --- ".end($coba3)."</td>";

						$coba4 = explode(',', $isi['4']);
						echo "<td>".current($coba4)." --- ".end($coba4)."</td>";

						$coba5 = explode(',', $isi['5']);
						echo "<td>".current($coba5)." --- ".end($coba5)."</td>";

						$coba6 = explode(',', $isi['6']);
						echo "<td>".current($coba6)." --- ".end($coba6)."</td>";

						$coba7 = explode(',', $isi['7']);
						echo "<td>".current($coba7)." --- ".end($coba7)."</td>";

						$coba8 = explode(',', $isi['8']);
						echo "<td>".current($coba8)." --- ".end($coba8)."</td>";

						$coba9 = explode(',', $isi['9']);
						echo "<td>".current($coba9)." --- ".end($coba9)."</td>";

						$coba10 = explode(',', $isi['10']);
						echo "<td>".current($coba10)." --- ".end($coba10)."</td>";

						$coba11 = explode(',', $isi['11']);
						echo "<td>".current($coba11)." --- ".end($coba11)."</td>";

						$coba12 = explode(',', $isi['12']);
						echo "<td>".current($coba12)." --- ".end($coba12)."</td>";

						$coba13 = explode(',', $isi['13']);
						echo "<td>".current($coba13)." --- ".end($coba13)."</td>";

						$coba14 = explode(',', $isi['14']);
						echo "<td>".current($coba14)." --- ".end($coba14)."</td>";

						$coba15 = explode(',', $isi['15']);
						echo "<td>".current($coba15)." --- ".end($coba15)."</td>";

						$coba16 = explode(',', $isi['16']);
						echo "<td>".current($coba16)." --- ".end($coba16)."</td>";

						$coba17 = explode(',', $isi['17']);
						echo "<td>".current($coba17)." --- ".end($coba17)."</td>";

						$coba18 = explode(',', $isi['18']);
						echo "<td>".current($coba18)." --- ".end($coba18)."</td>";

						$coba19 = explode(',', $isi['19']);
						echo "<td>".current($coba19)." --- ".end($coba19)."</td>";

						$coba20 = explode(',', $isi['20']);
						echo "<td>".current($coba20)." --- ".end($coba20)."</td>";

						$coba21 = explode(',', $isi['21']);
						echo "<td>".current($coba21)." --- ".end($coba21)."</td>";

						$coba22 = explode(',', $isi['22']);
						echo "<td>".current($coba22)." --- ".end($coba22)."</td>";

						$coba23 = explode(',', $isi['23']);
						echo "<td>".current($coba23)." --- ".end($coba23)."</td>";

						$coba24 = explode(',', $isi['24']);
						echo "<td>".current($coba24)." --- ".end($coba24)."</td>";

						$coba25 = explode(',', $isi['25']);
						echo "<td>".current($coba25)." --- ".end($coba25)."</td>";

						$coba26 = explode(',', $isi['26']);
						echo "<td>".current($coba26)." --- ".end($coba26)."</td>";

						$coba27 = explode(',', $isi['27']);
						echo "<td>".current($coba27)." --- ".end($coba27)."</td>";

						$coba28 = explode(',', $isi['28']);
						$coba29 = explode(',', $isi['29']);
						$coba30 = explode(',', $isi['30']);
						$coba31 = explode(',', $isi['31']);

						switch ($jumtgl) {

						case 28:
						echo "<td>".current($coba28)." --- ".end($coba28)."</td>";
							break;

						case 29:
							echo "<td>".current($coba28)." --- ".end($coba28)."</td>
								     <td>".current($coba29)." --- ".end($coba29)."</td>";
							break;

						case 30:
							echo "<td>".current($coba28)." --- ".end($coba28)."</td>
									 	<td>".current($coba29)." --- ".end($coba29)."</td>
										<td>".current($coba30)." --- ".end($coba30)."</td>";
							break;

						case 31:
						echo "<td>".current($coba28)." --- ".end($coba28)."</td>
									<td>".current($coba29)." --- ".end($coba29)."</td>
									<td>".current($coba30)." --- ".end($coba30)."</td>
									<td>".current($coba31)." --- ".end($coba31)."</td>";
							break;
						default:
							//nothing
							break;
				}
					echo "</tr>";
					$no++;

        } }?>
      </tbody>

      <tfoot>
        <?php
        $tgl = 1;
        $jumtgl = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
        ?>

        <tr>
        <?php
        $sql = mysql_query("SELECT A.USERID as nip, A.name as nama,
      				group_concat(A.1) as '1', group_concat(A.2) as '2',
      				group_concat(A.3) as '3', group_concat(A.4) as '4',
      				group_concat(A.5) as '5', group_concat(A.6) as '6',
      				group_concat(A.7) as '7', group_concat(A.8) as '8',
      				group_concat(A.9) as '9', group_concat(A.10) as '10',
      				group_concat(A.11) as '11', group_concat(A.12) as '12',
      				group_concat(A.13) as '13', group_concat(A.14) as '14',
      				group_concat(A.15) as '15', group_concat(A.16) as '16',
      				group_concat(A.17) as '17', group_concat(A.18) as '18',
      				group_concat(A.19) as '19', group_concat(A.20) as '20',
      				group_concat(A.21) as '21', group_concat(A.22) as '22',
      				group_concat(A.23) as '23', group_concat(A.24) as '24',
      				group_concat(A.25) as '25', group_concat(A.26) as '26',
      				group_concat(A.27) as '27', group_concat(A.28) as '28',
      				group_concat(A.29) as '29', group_concat(A.30) as '30',
      				group_concat(A.31) as '31'
      				from v_monthly_report as A
      				WHERE MONTH(tanggal) = '".$bulan."' AND YEAR(tanggal) = '".$tahun."' group by A.USERID");
        ?>
          <th>No</th>
          <th>UserID</th>
          <th>Nama Pegawai</th>

        <?php

        while($tgl <= $jumtgl){
          echo "<th><b>".$tgl."</b></th>";
          $tgl++;
        }
        ?>
        </tr>
      </tfoot>

    </table>

<br/>

<a href="tes.php"><button type="button" class="btn btn-danger">Cetak Sebagai PDF</button></a>

<br><br>

<a href="index.php"><button type="button" class="btn btn-default">Kembali</button></a>

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
