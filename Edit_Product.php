<?php
// Kết nối CSDL
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productId = $_POST['id'];
    $name = $_POST["name"];
    $manu_id = $_POST["manu_id"];
    $type_id = $_POST["type_id"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $feature = $_POST["feature"];

    // hình ảnh
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["fileUpload"]["name"]);
    move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file);

    $sql = "UPDATE products SET name='$name', manu_id='$manu_id', type_id='$type_id', description='$description', price='$price', pro_image='$target_file', feature='$feature' WHERE id='$productId'";

    if ($conn->query($sql) === TRUE) {
        echo '<script type="text/javascript">
                alert("Sửa Thành Công.");
                window.location.href = "index.php";
              </script>';
    } else {
        echo "Error:" . $conn->error;
    }
}

$conn->close();
?>