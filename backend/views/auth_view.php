<?php
if (isset($data['error'])) {
    echo "<h2>Вы ввели неправильный логин/пароль</h2>";
}
?>

<form method="POST">

    Логин <input name="login" type="text"><br>

    Пароль <input name="password" type="password"><br>

    <input name="submit" type="submit" value="Войти">

</form>