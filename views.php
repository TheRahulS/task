<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Active Categories</title>
</head>
<body>
    <h1>Active Categories</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category Name</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'connection.php';       
            // Fetch active categories from the database
            $sql = "SELECT id, category_name FROM categories WHERE status='active'";
            $query = mysqli_query($conn, $sql);

            // Check if there are active categories
            if (mysqli_num_rows($query) > 0) {
                while ($row = mysqli_fetch_assoc($query)) {
                    $categoryId = $row['id'];
                    $categoryName = $row['category_name'];
                    
                    // Output each active category as a table row
                    echo "<tr>";
                    echo "<td>$categoryId</td>";
                    echo "<td>$categoryName</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'>No active categories found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
