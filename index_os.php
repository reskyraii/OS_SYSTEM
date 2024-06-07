<!DOCTYPE html>
<?php
require_once("con.php");

$sql = mysqli_query($conn, "SELECT * FROM tb_nonhis");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1px">
        <thead>
            <tr>
                <th><b>NO</b></th>
                <th>NIPP (NO IZIN PRINSIP PEGAWAI)</th>
                <th>ID PEGAWAI</th>
                <th>NIK KTP (16 Digit Angka)</th>
                <th>NAMA LENGKAP SESUAI KTP (tanpa gelar)</th>
                <th>TEMPAT LAHIR</th>
                <th>TANGGAL LAHIR (dd/mm/yyyy)</th>
                <th>JENIS KELAMIN</th>
                <th>STATUS PEGAWAI</th>
                <th>JENIS KONTRAK</th>
                <th>NO KONTRAK</th>
                <th>JABATAN</th>
                <th>UNIT</th>
                <th>COST CENTRE</th>
                <th>LOKASI APOTEK ATAU UNIT BISNIS TEMPAT KERJA</th>
                <th>TGL MULAI BEKERJA (dd/mm/yyyy)</th>
                <th>TINGKAT PENDIDIKAN TERAKHIR</th>
                <th>JURUSAN PENDIDIKAN TERAKHIR</th>
                <th>NAMA BANK</th>
                <th>NAMA PEMILIK REKENING</th>
                <th>NO. REKENING</th>
                <th>HONORIUM</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
        <?php  
        $no = 1;
        while ($row = mysqli_fetch_assoc($sql)) {
        ?>
            <tr>
                <td><b><?php echo $no++; ?></b></td>
                <td><?php echo htmlspecialchars($row["nip"]); ?></td>
                <td><?php echo "NONHISKFA-0".htmlspecialchars($row["id_nonhis"]); ?></td>
                <td><?php echo htmlspecialchars($row["no_ktp"]); ?></td>
                <td><?php echo htmlspecialchars($row["nama_pg"]); ?></td>
                <td><?php echo htmlspecialchars($row["tempat_lh"]); ?></td>
                <td><?php echo htmlspecialchars(date("d/m/Y", strtotime($row["tgl_lh"]))); ?></td>
                <td><?php echo htmlspecialchars($row["jenis_kl"]); ?></td>
                <td><?php echo htmlspecialchars($row["status_pg"]); ?></td>
                <td><?php echo htmlspecialchars($row["jenis_kn"]); ?></td>
                <td><?php echo htmlspecialchars($row["no_kontrak"]); ?></td>
                <td><?php echo htmlspecialchars($row["jabatan"]); ?></td>
                <td><?php echo htmlspecialchars($row["unit"]); ?></td>
                <td><?php echo htmlspecialchars($row["cost_centre"]); ?></td>
                <td><?php echo htmlspecialchars($row["lokasi_krj"]); ?></td>
                <td><?php echo htmlspecialchars(date("d/m/Y", strtotime($row["tgl_mulai"]))); ?></td>
                <td><?php echo htmlspecialchars($row["tingkat_pdd"]); ?></td>
                <td><?php echo htmlspecialchars($row["jurusan_pdd"]); ?></td>
                <td><?php echo htmlspecialchars($row["nama_bank"]); ?></td>
                <td><?php echo htmlspecialchars($row["nama_pemilik"]); ?></td>
                <td><?php echo htmlspecialchars($row["norek"]); ?></td>
                <td><?php echo "Rp." .number_format($row["honorium"]).",-"; ?></td>
                <td>
                    <form method="POST" action="archive.php" onsubmit="return confirm('Archive Data : <?php echo htmlspecialchars($row['nama_pg'])?>')">
                        <input type="hidden" name="id_nonhis" value="<?php echo $row['id_nonhis']; ?>">
                        <button type="submit">ARSIPKAN</button>
                    </form>
                </td>
            </tr>
        <?php 
        }
        ?>
        </tbody>
    </table>    
</body>
</html>
