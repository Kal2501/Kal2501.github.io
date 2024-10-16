<?php
include "connectdb.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $jumlah = $_POST['jumlah'];
    $alamat = $_POST['alamat'];
    $price = $_POST['price'];
    $pembayaran = $_POST['pembayaran'];
    $gambar = $order['gambar'];

    if (isset($_FILES["gambar"]) && $_FILES["gambar"]["error"] == 0) {
        $targetDir = "uploads/";
        $timeStamp = date("Y-m-d H.i.s");
        $imageFileType = strtolower(pathinfo($_FILES["gambar"]["name"], PATHINFO_EXTENSION)); 
        $targetFile = $targetDir . $timeStamp . "." . $imageFileType;

        $uploadOk = 1;
        $check = getimagesize($_FILES["gambar"]["tmp_name"]);
        if ($check !== false) {
            if ($_FILES["gambar"]["size"] <= 5000000) {
                if ($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif") {
                    if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $targetFile)) {
                        echo "<script>alert('Gambar " . htmlspecialchars($gambar) . " berhasil diupload');</script>";
                        $gambar = $timeStamp . "." . $imageFileType;
                    } 
                    else{
                        echo "<script>alert('Maaf, terjadi kesalahan saat mengupload file.');</script>";
                    }
                } 
                else{
                    echo "<script>alert('Maaf, hanya file JPG, JPEG, PNG & GIF yang diperbolehkan.');</script>";
                    $uploadOk = 0;
                }
            } 
            else{
                echo "<script>alert('Maaf, ukuran file terlalu besar.');</script>";
                $uploadOk = 0;
            }
        } 
        else{
            echo "<script>alert('File bukan gambar.');</script>";
            $uploadOk = 0;
        }
    }

    $stmt = $conn->prepare("UPDATE orders SET nama = ?, jumlah = ?, alamat = ?, price = ?, pembayaran = ?, gambar = ? WHERE id = ?");
    $stmt->bind_param("sissssi", $nama, $jumlah, $alamat, $price, $pembayaran, $gambar, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Pesanan berhasil diupdate.'); window.location.href='orders.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM orders WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $order = $result->fetch_assoc();
    $stmt->close();
} else {
    header("Location: orders.php");
    exit();
}

include "template/navbar.php";
?>

<div class="form">
    <form action="edit.php" method="post" enctype="multipart/form-data">
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
                <label for="gambar" class="input-gambar-orders"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="#4a1791" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path fill="#4a1791" fill-opacity="0" stroke-dasharray="20" stroke-dashoffset="20" d="M12 15h2v-6h2.5l-4.5 -4.5M12 15h-2v-6h-2.5l4.5 -4.5"><animate attributeName="d" begin="1.5s" dur="4.5s" repeatCount="indefinite" values="M12 15h2v-6h2.5l-4.5 -4.5M12 15h-2v-6h-2.5l4.5 -4.5;M12 15h2v-3h2.5l-4.5 -4.5M12 15h-2v-3h-2.5l4.5 -4.5;M12 15h2v-6h2.5l-4.5 -4.5M12 15h-2v-6h-2.5l4.5 -4.5"/><animate fill="freeze" attributeName="fill-opacity" begin="2.1s" dur="1.5s" values="0;1"/><animate fill="freeze" attributeName="stroke-dashoffset" dur="1.2s" values="20;0"/></path><path stroke-dasharray="14" stroke-dashoffset="14" d="M6 19h12"><animate fill="freeze" attributeName="stroke-dashoffset" begin="1.5s" dur="0.6s" values="14;0"/></path></g></svg>Upload Design</label>
                <input type="file" name="gambar" id="gambar"  accept="image/*" required>
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
