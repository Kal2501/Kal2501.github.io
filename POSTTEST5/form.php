<?php
include "connectdb.php";

if (isset($_GET['name'])){
    $name = $_GET['name'];
    $price = $_GET['price'];
    $image = $_GET['image'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $nama = $_POST['nama'];
    $jumlah = $_POST['jumlah'];
    $alamat = $_POST['alamat'];
    $price = $_POST['price'];
    $pembayaran = $_POST['pembayaran'];

    var_dump($_POST);

    $stmt = $conn->prepare("INSERT INTO orders (nama, jumlah, alamat, price, pembayaran) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sisss", $nama, $jumlah, $alamat, $price, $pembayaran);

    if ($stmt->execute()){
        echo "Pesanan berhasil disimpan.";
    } 
    else{
        echo "Error: " . $stmt->error; 
    }

    $stmt->close();
}

include "template/navbar.php";
?>
<div class="form">
    <form action="summary.php" method="post"> 
        <div class="container-form">
            <img src="img/<?=$image?>" alt="">
            <div>
                <h1><?=$name?></h1>
                <p>Rp<?=$price?></p>
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" required>
                <label for="jumlah">Jumlah</label>
                <input type="number" name="jumlah" id="jumlah" required min="1">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat" required>
                <input type="hidden" name="price" id="price" value="<?=$price?>">
            </div>
        </div>
        <div class="confirm">
            <div>
                <input type="radio" name="pembayaran" id="GoPay" value="GoPay" required>
                <label for="GoPay">GoPay</label>
                <input type="radio" name="pembayaran" id="DANA" value="DANA" required>
                <label for="DANA">DANA</label>
            </div>
            <button type="submit" class="order">Pesan</button>
        </div>
    </form>
</div>
<?php
include "template/footer.php";
?>
