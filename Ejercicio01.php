<?php 
session_start();

if(!isset($_SESSION['soft'])) {
    $_SESSION['soft'] = 0;
}

if(!isset($_SESSION['milk'])) {
    $_SESSION['milk'] = 0;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $product= $_POST['product'];
    $quantity= $_POST['quantity'];

    $_SESSION['name'] = $name;

    if (isset($_POST['add'])) {
        if($product == "Milk"){
            $_SESSION['milk'] += $quantity;
        }else{
            $_SESSION['soft'] += $quantity;
        }
    }
    if (isset($_POST['update'])) {
        if($product == "Milk"){
            if($_SESSION['milk']>0){
                $_SESSION['milk'] -= $quantity;
            }else{
                echo "No tienes mas productos para eliminar";
            }
        }else{
            if($_SESSION['soft']>0){
                $_SESSION['soft'] -= $quantity;
            }else{
                echo "<h3>No tienes mas productos para eliminar!<h3>";
            }
        }
    }

    if (isset($_POST['reset'])) {
        $_SESSION['soft'] = 0;
        $_SESSION['milk'] = 0;
        $_SESSION['name'] = "";
    }
}


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
        
        if (isset($_SESSION['name'])) {
            $name = $_SESSION['name'];
            $quantitymilk = $_SESSION['milk'];
            $quantitysoft = $_SESSION['soft'];
            echo "worker: $name <br><br>";
            echo "units milk: $quantitymilk <br><br>";
            echo "units soft milk: $quantitysoft<br><br>";
        } else {
            echo "<h1>No session data found!</h1>";
        }
        ?>

    </form>
    
</body>