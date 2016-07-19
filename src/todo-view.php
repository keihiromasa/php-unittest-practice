<?php
require_once dirname(__FILE__) . '/class/view/TODOViewElems.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <title>TODO List</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
        foreach ($todoList as $todo) {
            echo '<div>' . $todo->get() . '</div>';
        }
        ?>

        <form action="todo.php" method="post">
            <input type="text" name="<?php echo TODOViewElems::TODO ?>" size="40">
            <input type="submit" value="登録">
            </p>
        </form>
    </body>
</html>

