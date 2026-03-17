<?php

define("PAJAK", 0.10);

$barang = array(
    "Keyboard" => 150000,
    "Mouse" => 50000,
    "Monitor" => 2000000
);

$nama_barang = "Keyboard";
$harga_satuan = $barang[$nama_barang];

$jumlah_beli = 2;

$total_sebelum_pajak = $harga_satuan * $jumlah_beli;
$pajak = $total_sebelum_pajak * PAJAK;
$total_bayar = $total_sebelum_pajak + $pajak;

echo "Perhitungan Total Pembelian (Dengan Array)\n";
echo "------------------------------------------\n";
echo "Nama Barang : " . $nama_barang . "\n";
echo "Harga Satuan : Rp " . number_format($harga_satuan,0,',','.') . "\n";
echo "Jumlah Beli : " . $jumlah_beli . "\n";
echo "Total Harga (Sebelum Pajak) : Rp " . number_format($total_sebelum_pajak,0,',','.') . "\n";
echo "Pajak (10%) : Rp " . number_format($pajak,0,',','.') . "\n";
echo "Total Bayar : Rp " . number_format($total_bayar,0,',','.') . "\n";
?>