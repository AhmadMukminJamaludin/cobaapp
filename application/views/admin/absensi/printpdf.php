<style>
table {
    width: 500px;
    border: solid 1px black;
}

table td {
    text-align: center;
    vertical-align: middle;
    padding: 5px;
    position: relative;
}

table td img {
    width: 50px;
    vertical-align: middle;
    display: inline-block;
}

table td p {
    display: inline-block;
    width: 430px;
    background: #ccc;
    vertical-align: middle
}
</style>
<?php
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->SetPrintHeader(false);
    $pdf->SetPrintFooter(false);
    $pdf->SetTitle('Print - '.date('Y-m-d'));
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Jamaludin');
    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
    $pdf->SetTopMargin(5);
    $pdf->setFooterMargin(20);
    $pdf->SetAutoPageBreak(true);
    $pdf->SetDisplayMode('real', 'default');
    
    // Page 1
    $pdf->AddPage();
    $header = '
    <table cellspacing="0" cellpadding="2" border="0" width="900px;">
        <tr>
          <td rowspan="5" width="100">
              <img src="assets/images/logo.png" style="width:100px;height:100px;">
          </td>
          <td align="center">
            YAYASAN WALISONGO PECANGAAN JEPARA 
          </td>
        </tr>
        <tr>
          <td align="center">
            MADRASAH ALIYAH WALISONGO
          </td>
        </tr>
        <tr>
          <td align="center">
            PECANGAAN JEPARA
          </td>
        </tr>
        <tr>
          <td align="center">
            <small>
              Alamat : Jl. Kauman No. 01 Pecangaan Jepara Kode Pos.  59462
            </small>
          </td>
        </tr>
        <tr>
          <td align="center">
            <small>
              Email : ma_wali9@yahoo.co.id  Web : http://mawalisongopecangaan.blogspot.com
            </small>
          </td>
        </tr>
    </table>
    ';
    $pdf->writeHTML($header, true, false, false, false, '');

    // Line
    $style  = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => '0', 'color' => array(0, 0, 0));
    $pdf->Line(5, 42, 205, 42, $style);
    
    // Judul
    $judul = '<table border="0">
        <tr>
          <th align="center" style="line-height: 5%;">
            <div style="vertical-align: middle;">
              <h2>REKAPITULASI PRESENSI SISWA</h2>
            </div>
          </th>
        </tr>
    </table>
    ';
    $pdf->writeHTML($judul, true, false, false, false, '');

    // $pdf->Cell(27,8 ,'Bulan :',0,0,'C');
    // $pdf->Cell(5,8 ,bulan(date('m')).' '.date('Y'),0,0,'C');

    $pdf->SetY(68);
    $tabelJadwal     = '
                        <table cellspacing="0" cellpadding="1" border="1" width="1900px;">
                            <tr>
                                <td align="center" width="35px;">No</td>
                                <td align="center">Nama</td>
                                <td align="center" width="70px;">Kelas</td>
                                <td align="center" width="40px;">Hadir</td>
                                <td align="center" width="40px;">Sakit</td>
                                <td align="center" width="40px;">Ijin</td>
                                <td align="center" width="40px;">Terlambat</td>
                                <td align="center" width="40px;">Tanpa Ket.</td>
                            </tr>';
                            $no = 1 ;
                            foreach ($absen as $data) {
                            $tabelJadwal .='<tr>
                            <td align="center">'.$no++.'</td>
                            <td align="left">'.$data['username'].'</td>
                            <td align="center">'.$data['position_name'].'</td>
                            <td align="center">'.$data['masuk'].'</td>
                            <td align="center">'.$data['sakit'].'</td>
                            <td align="center">'.$data['ijin'].'</td>
                            <td align="center">'.$data['terlambat'].'</td>
                            <td align="center">'.(($hari-'4')-(($data['masuk']-$data['terlambat'])-$data['sakit']-$data['ijin'])).'</td>
                            </tr>';}
                            $tabelJadwal .= '</table>';
    $pdf->writeHTML($tabelJadwal, true, false, false, false, '');

    $pdf->SetY(200);
    $pdf->Cell(300,8 ,'Pecangaan, '.date('d M Y'),0,0,'C');
    $pdf->SetY(207);
    $pdf->Cell(284,8 ,'Kepala Sekolah',0,0,'C');
    $pdf->SetY(235);
    $pdf->Cell(282,8 ,'Drs. Santoso',0,0,'C');

    // Render Output
    ob_clean();
    $pdf->Output(APPPATH.'..\print-'.date('Y-m-d').'.pdf', 'FI');
?>