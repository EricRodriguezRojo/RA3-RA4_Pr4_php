<?php 
session_start();

?>

<!DOCTYPE html>
<html>

<head>
    <title>Supermarket Management</title>
</head>

<body>
    <h1>Modify array saved in session</h1>
    <form action="Ejercicio01.php" method="post"> 

        <h2>Position to modify</h2>
        <select name="product" value="<?php echo $product; ?>">
        <option>1</option>
        <option>2</option>
        </select>
        <br>

        <label for="name">Worker name:</label>
        <input type="text" name="name" id="name">
        <br>
        

        <input type="hidden" name="index" value="<?php echo $index; ?>">
        <input type="submit" name="modify" value="Modify">
        <input type="submit" name="average" value="Average">
        <input type="submit" name="reset" value="Reset">
        <br>
        <h2>Inventary: </h2>

        <?php
        
        ?>

    </form>
    
</body>