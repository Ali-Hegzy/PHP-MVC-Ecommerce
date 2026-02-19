<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="/signin" method="POST">
        <label for="userName">User Name</label>
        <input type="userName" name="userName" id="userName" />
        <p> <?= $errors["userName"] ?? "" ?> </p>
        <br>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" />
        <p> <?= $errors["email"] ?? "" ?> </p>
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" />
        <p> <?= $errors["password"] ?? "" ?> </p>
        <br>
        <button>Submit</button>
    </form>
</body>

</html>