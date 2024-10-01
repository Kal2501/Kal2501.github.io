<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nama = $_POST['nama'];
  $jumlah = $_POST['jumlah'];
  $alamat = $_POST['alamat'];
  $price = $_POST['price'];
  $pembayaran = $_POST['pembayaran'];
}
$total = $jumlah* $price;
include "template/navbar.php";
?>
<div class="header-summary">
  <svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 -960 960 960" width="50px" fill="#e8eaed"><path d="M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q65 0 123 19t107 53l-58 59q-38-24-81-37.5T480-800q-133 0-226.5 93.5T160-480q0 133 93.5 226.5T480-160q133 0 226.5-93.5T800-480q0-18-2-36t-6-35l65-65q11 32 17 66t6 70q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm-56-216L254-466l56-56 114 114 400-401 56 56-456 457Z"/></svg>
  <h1>
    Pemesanan Berhasil!
  </h1>
  <p>
    Pesanan akan dikirim ke alamat anda
  </p>
</div>
<div class="order-details">
  <div>
    <p class="key">
      Nama
    </p>
    <p><?php
    echo $nama;
    ?></p>
  </div>
  <div>
    <p class="key">
      Alamat
    </p>
    <p><?php
    echo $alamat;
    ?></p>
  </div>
  <div>
    <p class="key">
      Metode Pembayaran
    </p>
    <p><?php
    echo $pembayaran;
    ?></p>
  </div>
  <div>
    <p class="key">
      Total
    </p>
    <p>Rp<?php
    echo $total;
    ?></p>
  </div>
</div>
<?php
include "template/footer.php";
?>