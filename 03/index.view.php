<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="POST">
     ID: <input class="input" type="number" name="id" value="1">
     Name: <input class="input" type="text" name="name" value="marcin">
      <br><br>
        <select class="input" name="operator">
            <?= operator($list) ?>
        </select> <br>
     <input type="submit" value="Submit">

    </form>
</body>
</html>