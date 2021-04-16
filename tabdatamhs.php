<?php
    $namaFile = "datamhs.dat";
    $myfile = fopen($namaFile, "r") or die("Tidak bisa buka file!");

    function umur($tglLhr){
        $birthDate = new DateTime($tglLhr);
        $now = new DateTime("today");
        $umur = $now->diff($birthDate)->y;
        return $umur;
    }

    echo "<center>";
    echo "<h1>DATA MAHASISWA</h1>";
    echo "<table border='1'>";
    echo "<tr align=center>
    <td>No</td>
    <td>NIM</td>
    <td>Nama Mahasiswa</td>
    <td>Tanggal Lahir</td>
    <td>Tempat Lahir</td>
    <td>Usia</td>
    </tr>";
    $n = 0;
    while(!feof($myfile)) {
        $isi = fgets($myfile);
        $pisah = explode("|", $isi);
        $i = 0;
        $n++;
        echo "<tr>
        <td align=center>$n</td>";
        while ($i < count($pisah)){
            echo "<td>$pisah[$i]</td>";
            $i++;
        }
        echo "<td align=center>".umur($pisah[2])."</td>";
        echo "</tr>";
    }
    echo "<br>";
    echo "<p>Jumlah Data : ".$n."</p>";
    echo "</center>";
    fclose($myfile);
?>