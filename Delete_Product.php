<?php
// Kết nối CSDL
include 'db_connect.php';

// Kiểm tra
if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Xóa sản phẩm
    $sql = "DELETE FROM products WHERE id = $productId";

    if ($conn->query($sql) === TRUE) {
        echo '<script type="text/javascript">
                alert("Xoá Sản Phẩm Thành Công");
                window.location.href = "index.php";
              </script>';
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Error.";
}

$conn->close();
?>
