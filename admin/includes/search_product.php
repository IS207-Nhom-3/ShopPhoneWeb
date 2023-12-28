<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web";

$conn = new mysqli($servername, $username, $password, $dbname, '3305');
if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

// Kiểm tra xem có từ khóa được gửi lên không
if (isset($_GET['keyword'])) {
    // Lấy từ khóa từ tham số GET
    $keyword = $_GET['keyword'];

    // Tạo truy vấn SQL sử dụng từ khóa trong mệnh đề WHERE
    $sql = "SELECT * FROM product WHERE ProductName LIKE '%$keyword%'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        //Output data of each row
        while ($row = $result->fetch_assoc()) {
            //Return result back to client
            $regular_price = number_format($row["RegularPrice"], 0, '', ',') . '<sup>đ</sup>';
            $sale_price = number_format($row["SalePrice"], 0, '', ',') . '<sup>đ</sup>';
            echo '<div class= "col-md-3 col-sm-6 col-xs-12 thumbnail">';
            echo '<img class="img-responsive" src="' . $row['ImageLink'] . '">';
            echo '<h6>' . $row['ProductName'] . '</h6>';
            echo '<p>' . $sale_price . '<s>' . $regular_price . '</s></p>';
            echo '<a href="' . $row['ProductLink'] . '" class="btn btn-danger">Buy Now</a>';
            echo '</div>';  
        }
    } else {
        echo "0 results";
    }
}
?>