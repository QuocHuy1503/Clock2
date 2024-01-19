<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add a class</title>
</head>
<body>
<form method="post" action="store.php">
    ID: <input type="hidden" name="id"><br>
    Name: <input type="text" name="name"><br>
    Email: <input type="text" name="email"><br>
    Password: <input type="text" name="password"><br>
    Phone: <input type="number" name="phone"><br>
    Gender: <select name="gender" class="form-control">
        <option value="1">Nam</option>
        <option value="2">Nữ</option>
    </select>
    Address: <input type="text" name="address"><br>
    <button>Add</button>
</form>
</body>
</html>