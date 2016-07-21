<?php
require_once dirname(__FILE__) . '/class/view/TODOViewElems.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <title>TODO List</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    </head>
</head>
<body>
    <?php
    if (isset($dupulicationMessage)) {
        echo "<span>${dupulicationMessage}</span>";
    }
    foreach ($todoList as $todo) {
        echo '<div>' . $todo->get() . '</div>';
    }
    ?>

    <form action="todo.php" method="post">
        <input type="text" name="<?php echo TODOViewElems::TODO ?>" size="40">
        <input type="submit" value="登録">
    </form>
</body>
</html>

