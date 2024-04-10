<?php 
    include_once("./admin_header.php") 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Manage Dishes</title>
    <link rel="stylesheet" href="./admin_styles/manage_dishes.css">
</head>
<body>
    <div class="add_dish">
        <h1 class="managedishes">Manage Dishes</h1>
        <form action="./ADMIN_INCLUDES/manage_dishes_inc.php" method="post" enctype="multipart/form-data">
            <label for="dishName">Dish Name:</label>
            <input type="text" id="dishName" name="input_dish_name" required>

            <label for="price">Price:</label>
            <input type="text" id="price" name="input_price" required>

            <label for="category">Category:</label>
            <input type="text" id="category" name="input_category" required>

            <label for="image">Dish Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required>

            <button type="submit">Add Dish</button>
        </form>

        <h2 class="remove_dish_h2">Remove Dishes</h2>
        <?php include_once("./ADMIN_INCLUDES/display_dishes.php"); ?>
    </div>

    <script>
        function removeDish(dishId) {
            if (confirm("Are you sure you want to remove this dish?")) {
                fetch('./ADMIN_INCLUDES/remove_dish.php?dish_id=' + dishId, {
                    method: 'GET'
                })
                .then(response => response.text())
                .then(message => {
                    alert(message);
                    window.location.href = "./manage_dishes.php";
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }
        }
    </script>
</body>
</html>

<?php 
    include_once("./admin_footer.php") 
?>