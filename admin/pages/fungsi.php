<?php
function tahun_spp()
{
    include('../koneksi.php');
    $sql = "SELECT * FROM spp ";
    $hasil = mysqli_query($koneksi, $sql);
    while ($row = mysqli_fetch_array($hasil)) {
        return $row["tahun"];
    }
}
function ambil_spp()
{
    include('../koneksi.php');
    $sql = "SELECT * FROM spp";
    $hasil = mysqli_query($koneksi, $sql);
    while ($row = mysqli_fetch_array($hasil)) {
        return $row["tahun"];
    }
}
