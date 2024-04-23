<?php
// Kết nối CSDL
include 'db_connect.php';

// Lấy dữ liệu Form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $manu_id = $_POST["manu_id"];
    $type_id = $_POST["type_id"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $feature = $_POST["feature"];

    // Tải ảnh
    $target_dir = "images/"; // Thư mục lưu trữ ảnh
    $target_file = $target_dir . basename($_FILES["fileUpload"]["name"]);
    move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file);

    // Thêm sản phẩm
    $sql = "INSERT INTO products (name, manu_id, type_id, description, price, pro_image, feature) 
            VALUES ('$name', '$manu_id', '$type_id', '$description', '$price', '$target_file', '$feature')";

    if ($conn->query($sql) === TRUE) {
        echo '<script type="text/javascript">
                alert("Thêm Sản Phẩm Thành Công.");
                window.location.href = "index.php";
              </script>';
    } else {
        echo "Error adding product: " . $conn->error;
    }
}

$conn->close();
?>
