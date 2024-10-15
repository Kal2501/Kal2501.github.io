<?php
session_start();
include "connectdb.php";
$nama = $_SESSION['nama'];
$jumlah = $_SESSION['jumlah'];
$alamat = $_SESSION['alamat'];
$price = $_SESSION['price'];
$pembayaran = $_SESSION['pembayaran'];
include "template/navbar.php";
?>
<div class="header-summary">
    <svg xmlns="http://www.w3.org/2000/svg" width="96" height="96" viewBox="0 0 24 24">
        <g fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
            <path d="M3 12c0 -4.97 4.03 -9 9 -9c4.97 0 9 4.03 9 9c0 4.97 -4.03 9 -9 9c-4.97 0 -9 -4.03 -9 -9Z"/>
            <path stroke-dasharray="14" stroke-dashoffset="14" d="M8 12l3 3l5 -5">
                <animate fill="freeze" attributeName="stroke-dashoffset" dur="0.6s" values="14;0"/>
            </path>
        </g>
    </svg>
    <h1>Pemesanan Berhasil!</h1>
    <p>Pesanan anda akan diproses</p>
</div>
<div class="order-details">
    <div>
        <p class="key">Nama</p>
        <p><?php echo htmlspecialchars($nama); ?></p>
    </div>
    <div>
        <p class="key">Alamat</p>
        <p><?php echo htmlspecialchars($alamat); ?></p>
    </div>
    <div>
        <p class="key">Metode Pembayaran</p>
        <p><?php echo htmlspecialchars($pembayaran); ?></p>
    </div>
    <div>
        <p class="key">Harga</p>
        <p>Rp<?php echo htmlspecialchars($price); ?></p>
    </div>
</div>
<?php
include "template/footer.php";
?>
