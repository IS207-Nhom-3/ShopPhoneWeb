
<table class="table table-bordered table-hover">
<!-- Tạo một bảng với 9 cột là:Id,Author,Title,Category,Status,Image,Tags,Comments,Date-->
<thead>
                            <tr>
                                <th>Id</th>
                                <th>Author</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Tags</th>
                                <th>Comments</th>
                                <th>Date</th>
                                <th>Edit</th>
                                <th>Delete</th>     
                            </tr>
                        </thead>
                        <tbody>

<?php
 $query ="SELECT * FROM posts ";// Biến query chứa câu truy vấn SQL để lấy tất cả các hàng từ bảng posts
 $select_posts = mysqli_query($connection, $query);//Kết nối đến database và lưu kết quả tất cả các dòng vào biến
 while ($row = mysqli_fetch_assoc($select_posts)){// Duyệt qua từng dòng của kết quả truy vấn và gán giá trị mỗi dòng vào biến row
 $post_id = $row['post_id'];//Lấy giá trị của cột "post_id" trong database và gán giá trị đó vào biến $post_id
 $post_author = $row['post_author'];
 $post_title = $row['post_title'];
 $post_category_id = $row['post_category_id'];
 $post_status = $row['post_status'];
 $post_image = $row['post_image'];
 $post_tags = $row['post_tags'];
 $post_comment_count = $row['post_comment_count'];
 $post_date = $row['post_date'];
 //Trả ra từng giá trị trong từng   cột
 echo "<tr>";
 echo "<td>$post_id </td>";
 echo "<td>{$post_author}</td>";
 echo "<td>{$post_title}</td>";
 echo "<td>{$post_category_id}</td>";
 echo "<td>{$post_status}</td>";
 echo "<td><img width='100' src='images/{$post_image}' alt='images'></td>";
 echo "<td>{$post_tags}</td>";
 
//Dem so luong comments trong bai viet
$query = "SELECT * FROM comments WHERE comment_post_id = $post_id ";
$send_comment_query = mysqli_query($connection,$query);
$row = mysqli_fetch_array($send_comment_query);
$comment_id = $row['comment_id'];
$count_comments = mysqli_num_rows($send_comment_query);
echo "<td><a href='post_comments.php?id=$post_id'>$count_comments</a></td>";

 echo "<td>{$post_date}</td>";
 echo "<td><a href='post.php?source=edit_posts&p_id={$post_id}'>Edit</a></td>";
 echo "<td><a href='post.php?delete={$post_id}'>Delete</a></td>";
 echo "</tr>";

 }
 ?>
</table>

<?php
if(isset($_GET['delete'])){ //Kiểm tra xem delete có trong URL không nếu có thì
$the_post_id = $_GET['delete'];//giá trị của nó sẽ gán vào biến
$query = "DELETE FROM posts WHERE post_id = {$the_post_id}";
//Thực hiện câu truy vấn SQL xóa tất cả các dòng trong bảng posts
//Điều kiện là giá trị của cột post_id phải trùng với biến 
$delete_query = mysqli_query($connection, $query);//Thực hiến câu truy vấn...
header("Location: post.php");
}
?>
                            
                     </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>