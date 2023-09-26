<?php
include 'connection.php';
if(isset($_POST['submit'])){
    $category_name=$_POST['category_name'];
    $status=$_POST['status'];
    $sql="select category_name from categories where category_name='$category_name'";
    $query=mysqli_query($conn,$sql);
    $result=mysqli_num_rows($query);
    if($result>0){
        echo "category_name is already exists";

    }
    else{
        $sql1="insert into categories(category_name,status) values('$category_name','$status')";
        $result1=mysqli_query($conn,$sql1);
        if($result1){
            echo 'data inserted successfully';

            header("refresh:2;URL=view.php");
        }else{
            echo "category not added successfully";
        }
    }
}



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <title>Document</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
<label for="category">Category</label>
    <input type="text" name="category_name" id="" required><br><br>
  <label for="status">status</label>
   <select name="status" id="" required>
    <option value="select">select</option>
    <option value="active">active</option>
    <option value="inactive">inactive</option>

</select><br><br><br>
<input type="submit" value="categoryadd" name="submit">  
</form>  
</body>
</html>