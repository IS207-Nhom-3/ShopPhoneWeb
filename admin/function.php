
<?php 
function username_exists($username){
    global $connection;
    $query = "SELECT username FROM users WHERE username = '$username'";
    $result = mysqli_query($connection,$query);
    if(mysqli_num_rows($result) > 0 ){
        return true;
    } else{
        return false;
    }
}

function email_exists($email){
    global $connection;
    $query = "SELECT user_email FROM users WHERE user_email = '$email'";
    $result = mysqli_query($connection,$query);
    if(mysqli_num_rows($result) > 0 ){
        return true;
    } else{
        return false;
    }
}

function register_user($username,$email,$password){
    global $connection;
    
    $username = mysqli_real_escape_string($connection,$username);
    $email = mysqli_real_escape_string($connection,$email);
    $password = mysqli_real_escape_string($connection,$password);
    //Sử dụng mysqli_real_escape_string để bảo vệ trước các tấn công SQL injection 
    //bằng cách chuẩn bị các giá trị dữ liệu cho truy vấn SQL.

    $query = "INSERT INTO users (username,user_email,user_password,user_role) ";
    //Truy vấn chèn dữ liệu người dùng mới vào bảng users.
    $query .= "VALUES ('{$username}','{$email}','{$password}','subscriber')";
    $registration_user_query = mysqli_query($connection,$query);
    } 
    
    function insert_categories(){
        global $connection;
        if(isset($_POST['submit'])){
            $cat_title = $_POST['cat_title'];
            if($cat_title == "" || empty($cat_title)){
                echo "This field should not be empty";
            } else {    
                $query = "INSERT INTO categories(cat_title)";
                $query .= "VALUE('{$cat_title}')";
                $create_category_query = mysqli_query($connection,$query);
                if(!$create_category_query){
                    die('QUERY Failed' . mysqli_error($connection));
                }
            } 
        }
    }
    
    function findAllCategories(){
        global $connection;
        $query ="SELECT * FROM categories";
    $select_categories = mysqli_query($connection, $query);
    
    while ($row = mysqli_fetch_assoc($select_categories)){
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];
    
    echo "<tr>";
    echo "<td>{$cat_id}</td>";
    echo "<td>{$cat_title}</td>";
    echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
    echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
    echo "</tr>";
    }
    }
    
    function deleteCategories(){
        global $connection;
        if(isset($_GET['delete'])){
            $the_cat_id = $_GET['delete'];
            $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id}";
            $delete = mysqli_query($connection,$query);
            header("Location: categories.php");
         }
    }

    function recordCount($table){
        global $connection;
        $query = "SELECT * FROM " .$table;
        $select_all_post = mysqli_query($connection,$query);
        $result = mysqli_num_rows($select_all_post);
        return $result;
    }
?>

