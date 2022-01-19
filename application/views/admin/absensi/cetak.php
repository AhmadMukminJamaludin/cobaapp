<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <title>print-<?= date('Y-m-d'); ?></title>
  </head>
  <body>
  <table cellspacing="0" cellpadding="2" border="0" width="900px;">
        <tr>
          <td rowspan="5" width="100">
              <img src="<?= base_url('assets/images/logo.png') ?>" style="width:150px;height:150px;">
          </td>
          <td align="center">
            <h4>YAYASAN WALISONGO PECANGAAN JEPARA</h4> 
          </td>
        </tr>
        <tr>
          <td align="center">
            <h4>MADRASAH ALIYAH WALISONGO</h4>
          </td>
        </tr>
        <tr>
          <td align="center">
            <h4>PECANGAAN JEPARA</h4>
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
    <hr>

    <h3 align="center">REKAPITULASI ABSENSI SISWA</h3>
        <div class="table-responsive">
            <table class="table table-bordered table-hover js-basic-example dataTable">
                <thead class="bg-red">
                    <tr>
                        <th>No</th>
                        <th>NISN</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Masuk</th>
                        <th>Sakit</th>
                        <th>Ijin</th>                                          
                        <th>Terlambat</th>                                          
                        <th>Tanpa Keterangan</th>                                          
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($absen as $a) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $a['nisn']?></td>
                        <td><?= $a['username']?></td>
                        <td><?= $a['position_name']?></td>
                        <td><?= $a['masuk'] ?></td>
                        <td><?= $a['sakit'] ?></td>
                        <td><?= $a['ijin'] ?></td>
                        <td><?= $a['terlambat'] ?></td>
                        <td><?= ($hari-4)-($a['masuk']-$a['terlambat'])-$a['sakit']-$a['ijin']; ?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    <script>  
        window.print();
    </script>

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>