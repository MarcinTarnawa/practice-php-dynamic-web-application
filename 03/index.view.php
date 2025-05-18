<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
body {
  font-family: Serif;
  font-size: 16px;

}

.myButton {
	box-shadow: 3px 4px 0px 0px #1564ad;
	background:linear-gradient(to bottom, #79bbff 5%, #378de5 100%);
	background-color:#79bbff;
	border-radius:5px;
	border:1px solid #337bc4;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:17px;
	font-weight:bold;
	padding:12px 44px;
	text-decoration:none;
	text-shadow:0px 1px 0px #528ecc;
}
.myButton:hover {
	background:linear-gradient(to bottom, #378de5 5%, #79bbff 100%);
	background-color:#378de5;
}
.myButton:active {
	position:relative;
	top:1px;
}
.input {
  margin: 10px 0 0 0;
  min-height: 2em;
  max-height: 4em;
  border-radius: 10px;
  background-color: var(--background-col);
  color: var(--text-col);
}
</style>
</head>
<body>
    <form action="index.php" method="POST">
        ID: <input class="input" type="number" name="id" value="<?= htmlspecialchars($id); ?>">
        Name: <input class="input" type="text" name="name" value="<?= htmlspecialchars($name); ?>">
      <br><br>
        <select class="input" name="operator">
            <?= operator($rules) ?>
        </select><br><br>
     <input class="myButton" type="submit" value="Submit">

    </form><br>
</body>
</html>