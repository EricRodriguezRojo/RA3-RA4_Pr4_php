<?php
session_start();

if (!isset($_SESSION['list'])) {
    $_SESSION['list'] = [];
}

$name = $quantity = $price = "";
$index = -1;
$error = $message = "";
$totalValue = 0;


if (isset($_POST['add'])) {
    if (!empty($_POST['name']) && !empty($_POST['quantity']) && !empty($_POST['price'])) {
        $item = [
            'name' => $_POST['name'],
            'quantity' => $_POST['quantity'],
            'price' => $_POST['price']
        ];
        $_SESSION['list'][] = $item;
        $message = "Item añadido correctmanete!";
    } else {
        $error = "Porfavor rellena todo para poder añadir!";
    }
}

if (isset($_POST['edit'])) {
    $index = $_POST['index'];
    $name = $_SESSION['list'][$index]['name'];
    $quantity = $_SESSION['list'][$index]['quantity'];
    $price = $_SESSION['list'][$index]['price'];
}

if (isset($_POST['update'])) {
    $index = $_POST['index'];
    if ($index != -1 && !empty($_POST['name']) && !empty($_POST['quantity']) && !empty($_POST['price'])) {
        $_SESSION['list'][$index] = [
            'name' => $_POST['name'],
            'quantity' => $_POST['quantity'],
            'price' => $_POST['price']
        ];
        $message = "Item actualizado correctamente!";
    } else {
        $error = "Porfavor rellena todo para poder actualizar!";
    }
}

if (isset($_POST['delete'])) {
    $index = $_POST['index'];
    unset($_SESSION['list'][$index]);
    $_SESSION['list'] = array_values($_SESSION['list']);
    $message = "Item eliminado correctamente!";
}

if (isset($_POST['total'])) {
    foreach ($_SESSION['list'] as $item) {
        $totalValue += $item['quantity'] * $item['price'];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shopping list</title>
    <style>
        table, th, td { border: 1px solid black; border-collapse: collapse; }
        th, td { padding: 5px; }
    </style>
</head>
<body>
    <h1>Shopping list</h1>
    <form method="post" action="">
        <label for="name">name:</label>
        <input type="text" name="name" id="name" value="<?php echo $name; ?>">
        <br>
        <label for="quantity">quantity:</label>
        <input type="number" name="quantity" id="quantity" value="<?php echo $quantity; ?>">
        <br>
        <label for="price">price:</label>
        <input type="number" name="price" id="price" value="<?php echo $price; ?>">
        <br>
        <input type="hidden" name="index" value="<?php echo $index; ?>">
        <input type="submit" name="add" value="Add">
        <input type="submit" name="update" value="Update">
        <input type="submit" name="reset" value="Reset">
    </form>
    <p style="color:red;"><?php echo $error; ?></p>
    <p style="color:green;"><?php echo $message; ?></p>
    <table>
        <thead>
            <tr>
                <th>name</th>
                <th>quantity</th>
                <th>price</th>
                <th>cost</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($_SESSION['list'] as $index => $item) { ?>
                <tr>
                    <td><?php echo $item['name']; ?></td>
                    <td><?php echo $item['quantity']; ?></td>
                    <td><?php echo $item['price']; ?></td>
                    <td><?php echo $item['quantity'] * $item['price']; ?></td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="index" value="<?php echo $index; ?>">
                            <input type="submit" name="edit" value="Edit">
                            <input type="submit" name="delete" value="Delete">
                        </form>
                    </td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan="3" align="right"><strong>Total:</strong></td>
                <td><?php echo $totalValue; ?></td>
                <td>
                    <form method="post">
                        <input type="submit" name="total" value="Calculate total">
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>
