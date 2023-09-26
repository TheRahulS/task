<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_GET['id'];
    $category_name = $_POST['category_name'];
    $status = $_POST['status'];

    $checkSql1 = "SELECT id FROM categories WHERE category_name='$category_name' AND id != '$id'";
    $checkQuery = mysqli_query($conn, $checkSql1);

    if (mysqli_num_rows($checkQuery) > 0) {
        echo "Category name already exists. Please choose a different name.";
    } else {
   
        $updateSql = "UPDATE categories SET category_name='$category_name', status='$status', updated_at=NOW() WHERE id='$id'";
        $updateQuery = mysqli_query($conn, $updateSql);

        if ($updateQuery) {
            echo "Category updated successfully.";
            header("refresh:2;URL=view.php");
        } else {
            echo "Error updating category: " . mysqli_error($conn);
        }
    }
}

// Fetch the category details for the given ID
$id = $_GET['id'];
$sql = "SELECT category_name, status FROM categories WHERE id='$id'";
$query = mysqli_query($conn, $sql);
if ($row = mysqli_fetch_assoc($query)) {
    $category_name = $row['category_name'];
    $status = $row['status'];
} else {
    echo "Category not found.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $id; ?>" method="post">
        <label for="category_name">Category Name</label>
        <input type="text" name="category_name" id="category_name" value="<?php echo $category_name ?>"><br><br>

        <label for="status">Status</label>
        <select name="status" id="status">
            <option value="select">Select</option>
            <option value="active" <?php if ($status == 'active')
                echo 'selected'; ?>>Active</option>
            <option value="inactive" <?php if ($status == 'inactive')
                echo 'selected'; ?>>Inactive</option>
        </select><br><br>

        <input type="submit" value="Update Category">
    </form>
</body>

</html>