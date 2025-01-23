<?php 
session_start();

?>

<!DOCTYPE html>
<html>

<head>
    <title>Supermarket Management</title>
</head>

<body>
    <h1>Supermarket Management</h1>
    <form action="Ejercicio01.php" method="post"> 
        <label for="name">Worker name:</label>
        <input type="text" name="name" id="name">
        <br>

        <h2>Choose product:</h2>
        <select name="product" value="<?php echo $product; ?>">
        <option>Soft drink</option>
        <option>Milk</option>
        </select>
        <br>

        <h2>Product quantity:</h2>
        <label for="quantity"></label>
        <input type="number" name="quantity" id="quantity" value="<?php echo $quantity; ?>">
        <br><br>

        <input type="hidden" name="index" value="<?php echo $index; ?>">
        <input type="submit" name="add" value="Add">
        <input type="submit" name="update" value="Remove">
        <input type="submit" name="reset" value="Reset">
        <br>
        <h2>Inventary: </h2>

        <?php 
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $_SESSION['name'] = $_POST['name'];
            $_SESSION['product'] = $_POST['product'];
            $_SESSION['quantity'] = $_POST['quantity'];
        }
        
        if (isset($_SESSION['name'])) {
            $name = $_SESSION['name'];
            $product = $_SESSION['product'];
            $quantity = $_SESSION['quantity'];
            echo "worker: $name <br><br>";
            echo "units milk: $product <br><br>";
            echo "units soft milk: $quantity<br><br>";
        } else {
            echo "<h1>No session data found!</h1>";
        }
        ?>

    </form>
    
</body>