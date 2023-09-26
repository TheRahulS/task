<?php
include 'connection.php';

// Fetch categories from the database
// $sql = "SELECT id, category_name, status, created_at, updated_at FROM categories";
$sql = "SELECT * FROM categories";
$query = mysqli_query($conn, $sql);

if (!$query) {
    echo "Error executing the SQL query: " . mysqli_error($conn);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Categories</title>
</head>

<body>
    <h1>Categories</h1>
    <button> <a href="category.php">add category</a></button>
    <!-- <button>   <a href="views.php">Active category</a></button> -->
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Category Name</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Action</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($query)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['category_name'] . "</td>";
            echo "<td>" . $row['status'] . "</td>";
            echo "<td>" . $row['created_at'] . "</td>";
            echo "<td>" . $row['updated_at'] . "</td>";
            echo '<td><a href="update.php?id=' . $row['id'] . '">Update</a></td>';
            echo "</tr>";
        }
        ?>
    </table>

    <?php
    include 'views.php'; ?>
</body>

</html>