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
    <div class="jumbotron">
        <div class="container">
            <h1>TODOリスト</h1>
            <p>phpunit練習用のTODOアプリです。</p>
            <p>あくまでphpunitの練習を目的としているため、色々な脆弱性などあります。</p>
            <p>ご利用は計画的に。何かあっても作者は責任は取れません。</p>
        </div>
    </div>
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

