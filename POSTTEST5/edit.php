<?php
include "connectdb.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $jumlah = $_POST['jumlah'];
    $alamat = $_POST['alamat'];
    $price = $_POST['price'];
    $pembayaran = $_POST['pembayaran'];

    $stmt = $conn->prepare("UPDATE orders SET nama = ?, jumlah = ?, alamat = ?, price = ?, pembayaran = ? WHERE id = ?");
    $stmt->bind_param("sisssi", $nama, $jumlah, $alamat, $price, $pembayaran, $id);

    if ($stmt->execute()){
        echo "<script>alert('Pesanan berhasil diupdate.'); window.location.href='orders.php';</script>";
    } 
    else{
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

if (isset($_GET['id'])){
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM orders WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $order = $result->fetch_assoc();
    $stmt->close();
} 
else{
    header("Location: orders.php");
    exit();
}

include "template/navbar.php";
?>

<div class="form">
    <form action="edit.php" method="post">
        <div class="container-form orders">
            <div>
                <h1>Edit Detail Pesanan</h1>
                <input type="hidden" name="id" value="<?= $order['id'] ?>">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" required value="<?= htmlspecialchars($order['nama']) ?>">
                <label for="jumlah">Jumlah</label>
                <input type="number" name="jumlah" id="jumlah" required min="1" value="<?= htmlspecialchars($order['jumlah']) ?>">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat" required value="<?= htmlspecialchars($order['alamat']) ?>">
                <input type="hidden" name="price" value="<?= htmlspecialchars($order['price']) ?>">
            </div>
        </div>
        <div class="confirm">
            <div>
                <input type="radio" name="pembayaran" id="GoPay" value="GoPay" required <?= ($order['pembayaran'] == 'GoPay') ? 'checked' : '' ?>>
                <label for="GoPay">GoPay</label>
                <input type="radio" name="pembayaran" id="DANA" value="DANA" required <?= ($order['pembayaran'] == 'DANA') ? 'checked' : '' ?>>
                <label for="DANA">DANA</label>
            </div>
            <button type="submit" class="order">Update</button>
        </div>
    </form>
</div>

<?php
$conn->close();
include "template/footer.php";
?>
