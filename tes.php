<?php
//error_reporting(0);
/*
Yudha T. Putra
*/
require('pdf/tcpdf.php');
$link = mysql_connect('localhost', 'root', '');
$db		= mysql_select_db('hadirhadir');

	$bulan = '3';
	$tahun = '2018';

	$tgl = 1;
	$jumtgl = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun); // dapat jumlah tanggal

	// create new PDF document
	$pdf = new TCPDF('L', PDF_UNIT, 'A3', true, 'UTF-8', false);

	// set document information
	$pdf->SetTitle('Laporan Bulanan Pegawai');
	$pdf->SetSubject('Laporan Bulanan Pegawai');

	// set margins
	$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
	$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
	$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

	// set auto page breaks
	$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    // add a page
	$pdf->AddPage();

	$pdf->SetFont('helvetica', 'B', 16);
	$pdf->Write(0, 'Laporan Bulanan Pegawai', '', 0, 'C', true, 0, false, false, 0);
	$pdf->Write(0, '', '', 0, 'L', true, 0, false, false, 0);

	$pdf->SetFont('helvetica', '', 10);
	$pdf->Write(0, 'Periode Kehadiran  : '.$bulan. ' - '.$tahun.'', '', 0, 'L', true, 0, false, false, 0);
	$pdf->Write(0, '', '', 0, 'L', true, 0, false, false, 0);
	$pdf->Write(0, '', '', 0, 'L', true, 0, false, false, 0);

	$pdf->SetFont('helvetica', '', 8);

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

			$tbl = <<<EOD
				<table border="0.5">
				<tr>
					<th><b>No </b></th>
					<th><b>ID </b></th>
					<th valign='top' style='white-space:nowrap'><b>Nama Pegawai </b></th>
EOD;
			//dinamis, sesuai tanggal pada bulan tsb
			while($tgl <= $jumtgl) {
			$tbl .= "<th><b>".$tgl."</b></th>";
				$tgl++;
			}

			//end header kolom
			$tbl .= "</tr>";

			//isinya
			$no = 1;
			while ($isi = mysql_fetch_array($sql)) {
				$tbl.="
					<tr>
						<td>".$no."</td>
						<td>".$isi['nip']."</td>
						<td valign='top' style='white-space:nowrap'>".$isi['nama']."</td>";

						$coba1 = explode(',', $isi['1']);
						$tbl.="<td>".current($coba1)." --- ".end($coba1)."</td>";

						$coba2 = explode(',', $isi['2']);
						$tbl.="<td>".current($coba1)." --- ".end($coba1)."</td>";

						$coba3 = explode(',', $isi['3']);
						$tbl.="<td>".current($coba3)." --- ".end($coba3)."</td>";

						$coba4 = explode(',', $isi['4']);
						$tbl.="<td>".current($coba4)." --- ".end($coba4)."</td>";

						$coba5 = explode(',', $isi['5']);
						$tbl.="<td>".current($coba5)." --- ".end($coba5)."</td>";

						$coba6 = explode(',', $isi['6']);
						$tbl.="<td>".current($coba6)." --- ".end($coba6)."</td>";

						$coba7 = explode(',', $isi['7']);
						$tbl.="<td>".current($coba7)." --- ".end($coba7)."</td>";

						$coba8 = explode(',', $isi['8']);
						$tbl.="<td>".current($coba8)." --- ".end($coba8)."</td>";

						$coba9 = explode(',', $isi['9']);
						$tbl.="<td>".current($coba9)." --- ".end($coba9)."</td>";

						$coba10 = explode(',', $isi['10']);
						$tbl.="<td>".current($coba10)." --- ".end($coba10)."</td>";

						$coba11 = explode(',', $isi['11']);
						$tbl.="<td>".current($coba11)." --- ".end($coba11)."</td>";

						$coba12 = explode(',', $isi['12']);
						$tbl.="<td>".current($coba12)." --- ".end($coba12)."</td>";

						$coba13 = explode(',', $isi['13']);
						$tbl.="<td>".current($coba13)." --- ".end($coba13)."</td>";

						$coba14 = explode(',', $isi['14']);
						$tbl.="<td>".current($coba14)." --- ".end($coba14)."</td>";

						$coba15 = explode(',', $isi['15']);
						$tbl.="<td>".current($coba15)." --- ".end($coba15)."</td>";

						$coba16 = explode(',', $isi['16']);
						$tbl.="<td>".current($coba16)." --- ".end($coba16)."</td>";

						$coba17 = explode(',', $isi['17']);
						$tbl.="<td>".current($coba17)." --- ".end($coba17)."</td>";

						$coba18 = explode(',', $isi['18']);
						$tbl.="<td>".current($coba18)." --- ".end($coba18)."</td>";

						$coba19 = explode(',', $isi['19']);
						$tbl.="<td>".current($coba19)." --- ".end($coba19)."</td>";

						$coba20 = explode(',', $isi['20']);
						$tbl.="<td>".current($coba20)." --- ".end($coba20)."</td>";

						$coba21 = explode(',', $isi['21']);
						$tbl.="<td>".current($coba21)." --- ".end($coba21)."</td>";

						$coba22 = explode(',', $isi['22']);
						$tbl.="<td>".current($coba22)." --- ".end($coba22)."</td>";

						$coba23 = explode(',', $isi['23']);
						$tbl.="<td>".current($coba23)." --- ".end($coba23)."</td>";

						$coba24 = explode(',', $isi['24']);
						$tbl.="<td>".current($coba24)." --- ".end($coba24)."</td>";

						$coba25 = explode(',', $isi['25']);
						$tbl.="<td>".current($coba25)." --- ".end($coba25)."</td>";

						$coba26 = explode(',', $isi['26']);
						$tbl.="<td>".current($coba26)." --- ".end($coba26)."</td>";

						$coba27 = explode(',', $isi['27']);
						$tbl.="<td>".current($coba27)." --- ".end($coba27)."</td>";

						$coba28 = explode(',', $isi['28']);
						$coba29 = explode(',', $isi['29']);
						$coba30 = explode(',', $isi['30']);
						$coba31 = explode(',', $isi['31']);

						switch ($jumtgl) {

						case 28:
						$tbl.="<td>".current($coba28)." --- ".end($coba28)."</td>";
							break;

						case 29:
							$tbl.="<td>".current($coba28)." --- ".end($coba28)."</td>
								     <td>".current($coba29)." --- ".end($coba29)."</td>";
							break;

						case 30:
							$tbl.="<td>".current($coba28)." --- ".end($coba28)."</td>
									 	<td>".current($coba29)." --- ".end($coba29)."</td>
										<td>".current($coba30)." --- ".end($coba30)."</td>";
							break;

						case 31:
						$tbl.="<td>".current($coba28)." --- ".end($coba28)."</td>
									<td>".current($coba29)." --- ".end($coba29)."</td>
									<td>".current($coba30)." --- ".end($coba30)."</td>
									<td>".current($coba31)." --- ".end($coba31)."</td>";
							break;
						default:
							//nothing
							break;
				}
					$tbl .="</tr>";
					$no++;
				}
			$tbl.="</table>";
			$pdf->writeHTML($tbl, true, false, false, false, '');

			$namaPDF = 'Laporan Bulanan Pegawai_'.$bulan.'_'.$tahun.'.pdf';
			$pdf->Output($namaPDF,'I');
?>
