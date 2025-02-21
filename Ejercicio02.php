<?php 
session_start();

$position = $_POST['position']; //guardamos la posicion y el valor en 2 variables
$value = $_POST['value'];

if (!isset($_SESSION['lista'])) {
    $_SESSION['lista'] = array(10, 20, 30);
}

if (isset($_POST['modify'])) { // modificamos la posicion
    $position = (int)$_POST['position'] - 1; 

    if ($position >= 0 && $position < count($_SESSION['lista'])) {
        $_SESSION['lista'][$position] = $value;
    } else {
        echo "Error: Posición fuera de rango.";
    }
}

if (isset($_POST['reset'])) { //reseteamos la sesion lista
    $_SESSION['lista'] = array(10, 20, 30);
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Supermarket Management</title>
</head>

<body>
    <h1>Modify array saved in session</h1>
    <form action="Ejercicio02.php" method="post"> 

        <label for="position">Position to modfiy:</label>
        <select name="position" value="<?php echo $position; ?>">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        </select>
        <br><br>

        <label for="value">New value:</label> 
        <input type="text" name="value" id="value">
        <br><br>
        

        <input type="hidden" name="index" value="<?php echo $index; ?>">
        <input type="submit" name="modify" value="Modify">
        <input type="submit" name="average" value="Average">
        <input type="submit" name="reset" value="Reset">
        <br><br>

        <?php
        $total = count($_SESSION['lista']);

        echo "Current array: "; //Mostramos el array actualmente
        foreach ($_SESSION['lista'] as $index => $value) {
            if ($index === $total-1){
                echo " $value <br><br>";
            }else{
                echo " $value, ";
            }
        }
        
        if (isset($_POST['average'])) {
            $count = count($_SESSION['lista']);
            
            if ($count > 0) {
                $total = array_sum($_SESSION['lista']);
                $average = $total / $count;
                echo "Average: $average";
            } else {
                echo "Error: No hay valores en la lista.";
            }
        }
        ?>

    </form>
    
</body>