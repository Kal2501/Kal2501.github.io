<?php
include "connectdb.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $jumlah = $_POST['jumlah'];
    $alamat = $_POST['alamat'];
    $price = $_POST['price'];
    $pembayaran = $_POST['pembayaran'];

    $total = $jumlah * $price;

    $stmt = $conn->prepare("INSERT INTO orders (nama, jumlah, alamat, price, pembayaran, total) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sisssi", $nama, $jumlah, $alamat, $price, $pembayaran, $total);

    if ($stmt->execute()){
        $stmt->close();
    } 
    else{
        echo "Error: " . $stmt->error;
        $stmt->close();
        exit();
    }
}
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
        <p class="key">Total</p>
        <p>Rp<?php echo number_format($total, 2, ',', '.'); ?></p>
    </div>
</div>
<?php
include "template/footer.php";
?>
