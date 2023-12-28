<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <ul>
        <li><a href="#" id="shopLink">Shop</a></li>
    </ul>
    <!--Tạo Form -->
    <form id="productForm">
        <label for="productName">Tên sản phẩm:</label>
        <input type="text" id="productName" name="productName" required>

        <label for="productPrice">Giá sản phẩm:</label>
        <input type="number" id="productPrice" name="productPrice" required>

        <label for="productImage">Chọn ảnh sản phẩm:</label>
        <input type="file" id="productImage" name="productImage" accept="img/*" required>

        <button type="button" onclick="addProduct()">Thêm Sản Phẩm</button>

        <div id="successMessage" style="display: none; color: green;">
        Sản phẩm đã được thêm thành công!
        </div>
    </form>

    <div id="productList">
        <!-- Danh sách sản phẩm sẽ được hiển thị ở đây -->
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="index.js"></script>
    
</body>
</html>