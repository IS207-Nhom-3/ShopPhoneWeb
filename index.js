// Kiểm tra xem có đang chạy trong môi trường có DOM (ví dụ: trình duyệt) hay không
//Hiển Thị sản phẩm
shopLink.addEventListener('click', function (event) {
    event.preventDefault();
    console.log('Shop link clicked.');
    getProductsAndRender();
});
if (typeof window !== 'undefined' && typeof document !== 'undefined') {
  // Mã tương tác với DOM
      document.addEventListener('DOMContentLoaded', function () {
      const shopLink = document.getElementById('shopLink');
      const productListElement = document.getElementById('productList');

      shopLink.addEventListener('click', function (event) {
          event.preventDefault(); // Ngăn chặn hành động mặc định của liên kết

          // Gọi hàm để lấy danh sách và hiển thị sản phẩm từ Bitrix 24
          getProductsAndRender();
      });

      async function getProductsAndRender() {
          try {
              const products = await getProductsFromBitrix(); // Hàm lấy sản phẩm từ Bitrix 24

              // Xóa các phần tử hiện tại trong danh sách sản phẩm
              productListElement.innerHTML = '';

              // Duyệt qua danh sách sản phẩm và hiển thị thông tin
              products.forEach(product => {
                  const productItem = document.createElement('div');

                  // Hiển thị tên sản phẩm
                  const productName = document.createElement('h3');
                  productName.textContent = product.NAME;
                  productItem.appendChild(productName);

                  // Hiển thị mô tả sản phẩm
                  const productDescription = document.createElement('p');
                  productDescription.textContent = product.DESCRIPTION;
                  productItem.appendChild(productDescription);

                  // Thêm sản phẩm vào danh sách
                  productListElement.appendChild(productItem);
              });
          } catch (error) {
              console.error('Lỗi khi lấy và hiển thị sản phẩm:', error);
          }
      }

      async function getProductsFromBitrix() {
          // Sử dụng axios hoặc thư viện HTTP client khác để gọi Bitrix 24 API và lấy thông tin về sản phẩm
          const bitrixApiUrl = 'https://b24-hdyn9i.bitrix24.vn/rest/1/kwe7anc2m4ytf0sf/crm.product.list.json';

          try {
              const response = await axios.get(bitrixApiUrl);
              // Xử lý dữ liệu từ response.data
              const productList = response.data.result;
              console.log('Danh sách sản phẩm:', productList);
              // Trả về danh sách sản phẩm
              return productList;
          } catch (error) {
              console.error('Lỗi khi lấy danh sách sản phẩm từ Bitrix 24:', error);
              throw error;
          }
      }
  });
}else {
    // Mã không liên quan đến DOM trong môi trường khác (Node.js, ...).
    console.error('Code is not running in a browser environment.');
  
    // Các dòng mã không liên quan đến DOM trong môi trường khác
  }


  // Thêm sản phẩm 
  
// index.js

function addProduct() {
    const productName = document.getElementById('productName').value;
    const productPrice = document.getElementById('productPrice').value;
    const productImageInput = document.getElementById('productImage');
    
    // Lấy tệp tin đã chọn
    const productImageFile = productImageInput.files[0];
    
    if (!productImageFile) {
        alert('Vui lòng chọn một tệp tin hình ảnh.');
        return;
    }

    const bitrixApiUrl = 'https://b24-hdyn9i.bitrix24.vn/rest/1/deg6doiiq1pxv8eo/crm.product.add.json';

    // Tạo FormData để chứa dữ liệu sản phẩm
    const formData = new FormData();
    formData.append('fields[NAME]', productName);
    formData.append('fields[PRICE]', productPrice);
    formData.append('fields[PREVIEW_PICTURE]', productImageFile);

    // Gửi POST request lên Bitrix 24 API để thêm sản phẩm mới
    axios.post(bitrixApiUrl, formData, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    })
        .then(response => {
            console.log('Sản phẩm đã được thêm thành công:', response.data);
            
            // Hiển thị thông báo thành công
            const successMessage = document.getElementById('successMessage');
            successMessage.style.display = 'block';

            // Cập nhật giao diện hoặc thực hiện các tác vụ khác nếu cần
        })
        .catch(error => {
            console.error('Lỗi khi thêm sản phẩm:', error);
            // Xử lý lỗi và hiển thị thông báo cho người dùng
        });
}




