<?php
include "connectdb.php";
// Hapus order
if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM orders WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    header("Location: orders.php");
    exit();
}

$result = $conn->query("SELECT * FROM orders");
include "template/navbar.php";
?>
<div class="orders-container">
    <h1>Orders</h1>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Jumlah</th>
                <th>Alamat</th>
                <th>Harga</th>
                <th>Pembayaran</th>
                <th>Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['nama']) ?></td>
                <td><?= htmlspecialchars($row['jumlah']) ?></td>
                <td><?= htmlspecialchars($row['alamat']) ?></td>
                <td>Rp<?= htmlspecialchars($row['price']) ?></td>
                <td><?= htmlspecialchars($row['pembayaran']) ?></td>
                <td>Rp<?= htmlspecialchars($row['total']) ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="white" ><path d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352z"/><path d="M19.846 4.318a2.2 2.2 0 0 0-.437-.692a2 2 0 0 0-.654-.463a1.92 1.92 0 0 0-1.544 0a2 2 0 0 0-.654.463l-.546.578l2.852 3.02l.546-.579a2.1 2.1 0 0 0 .437-.692a2.24 2.24 0 0 0 0-1.635M17.45 8.721L14.597 5.7L9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.5.5 0 0 0 .255-.145l4.778-5.06Z"/></g></svg></a>
                    <a href="orders.php?delete=<?= $row['id'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus order ini?');"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg></a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php
$conn->close();
include "template/footer.php";
?>
