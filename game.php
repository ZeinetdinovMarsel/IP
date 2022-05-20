<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/db.class.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <Link rel="stylesheet" href="styles/styles.css">
</head>

<body>

    <nav class="navbar" id="msgText">
        <div class="link-group-burger">
            <span></span>
        </div>
        <div class="link-group">
            <ul class="link-group">
                <li class="link"><a href="index.php">Главная</a></li>
                <li class="link"><a href="about_me.php">Обо мне</a></li>
                <li class="link"><a href="contact_info.php">Контактная Информация</a></li>
                <li class="link"><a href="galerey.php">Галерея</a></li>
                <li class="link"><a href="mldm.php">Лабораторные Млидм</a></li>
                <?php
                if ($_COOKIE['user'] == '') : ?>
                    <li class="link"><a href="userenter.php">Вход/Регистрация</a></li>
                <?php else : ?>
                    <li class="link active"><a href="game.php">Игра</a>
                    <li class="link"><a href="userpage.php"><?= $_COOKIE['user'] ?></a> <a href="/exit.php">Выход</a>
        </div>
    <?php endif; ?>
    </ul>
    </div>
    </nav>
    <div class="allcont">

        <div class="gamecont">
            <div class="gameheadtext">
                Тест на дальтонизм
            </div>
            <?php
            if ($_COOKIE['login'] != NULL) {
            } else {
                print("Пользователь не авторизован");
                exit();
            }

            ?>
            <?php
            if (isset($_GET['game'])) {
                $id = $_GET['game'];
                if ($_GET['game'] != 14) {
                    $result = DB::query("SELECT * FROM `game` WHERE id=$id");
                    $game = $result->fetch_assoc();
            ?>
                    <img src="gameimg/<? echo $_GET['game'] ?>.jpg" class="imgdaltest" alt="">
                    <br>
                    <div class="question">
                        <?php
                        print($game['idquestion'] . "<br>");
                        ?>
                    </div>
                    <div class="numans">
                        <form action="checkans.php?game=<? print($game['id']) ?>" method="post" enctype="multipart/form-data">
                            <table class="answers">
                                <?php
                                if ($_GET['game'] == 3) {
                                ?>
                                    <tr>
                                        <td>
                                            <button type="submit" class="answbutton" value="1" id="answer" name="answer">Круг и треугольник</button><br>
                                            <button type="submit" class="answbutton" value="2" id="answer" name="answer">Квадрат и круг</button>
                                        </td>
                                        <td>
                                            <button type="submit" class="answbutton" value="3" id="answer" name="answer">Треугольник </button><br>
                                            <button type="submit" class="answbutton" value="-1" id="answer" name="answer">Другое</button>
                                        </td>
                                    </tr>
                                <?php
                                } elseif ($_GET['game'] == 5) {
                                ?>
                                    <tr>
                                        <td>
                                            <button type="submit" class="answbutton" value="1" id="answer" name="answer">Круг и треугольник</button><br>
                                            <button type="submit" class="answbutton" value="2" id="answer" name="answer">Квадрат и круг</button>
                                        </td>
                                        <td>
                                            <button type="submit" class="answbutton" value="3" id="answer" name="answer">Треугольник </button><br>
                                            <button type="submit" class="answbutton" value="-1" id="answer" name="answer">Другое</button>
                                        </td>
                                    </tr>
                                <?php
                                } elseif ($_GET['game'] == 10) {
                                ?>
                                    <tr>
                                        <td>
                                            <button type="submit" class="answbutton" value="1" id="answer" name="answer">Круг, квадрат и треугольник</button><br>
                                            <button type="submit" class="answbutton" value="2" id="answer" name="answer">Квадрат и круг</button>
                                        </td>
                                        <td>
                                            <button type="submit" class="answbutton" value="3" id="answer" name="answer">Треугольник и квадрат</button><br>
                                            <button type="submit" class="answbutton" value="-1" id="answer" name="answer">Другое</button>
                                        </td>
                                    </tr>

                                <?php
                                } elseif ($_GET['game'] == 13) {
                                ?>
                                    <tr>
                                        <td>
                                            <button type="submit" class="answbutton" value="1" id="answer" name="answer">Круг и квадрат</button><br>
                                            <button type="submit" class="answbutton" value="2" id="answer" name="answer">Треугольник</button>
                                        </td>
                                        <td>
                                            <button type="submit" class="answbutton" value="3" id="answer" name="answer">Треугольник и круг</button><br>
                                            <button type="submit" class="answbutton" value="-1" id="answer" name="answer">Другое</button>
                                        </td>
                                    </tr>
                                <?php
                                } else if ($_GET['game'] == 1) {
                                ?>
                                    <tr>
                                        <td>
                                            <button type="submit" class="answbutton" value="96" id="answer" name="answer">96</button><br>
                                            <button type="submit" class="answbutton" value="17" id="answer" name="answer">17</button>
                                        </td>
                                        <td>
                                            <button type="submit" class="answbutton" value="24" id="answer" name="answer">24</button><br>
                                            <button type="submit" class="answbutton" value="-1" id="answer" name="answer">Другое</button>
                                        </td>
                                    </tr>
                                <?php
                                } else if ($_GET['game'] == 8 || $_GET['game'] == 9) {
                                ?>
                                    <tr>
                                        <td>
                                            <button type="submit" class="answbutton" value="86" id="answer" name="answer">30</button><br>
                                            <button type="submit" class="answbutton" value="136" id="answer" name="answer">136</button>
                                        </td>
                                        <td>
                                            <button type="submit" class="answbutton" value="360" id="answer" name="answer">360</button><br>
                                            <button type="submit" class="answbutton" value="-1" id="answer" name="answer">Другое</button>
                                        </td>
                                    </tr>
                                <?php
                                } else if ($_GET['game'] == 11) {
                                ?>
                                    <tr>
                                        <td>
                                            <button type="submit" class="answbutton" value="16" id="answer" name="answer">16</button><br>
                                            <button type="submit" class="answbutton" value="14" id="answer" name="answer">14</button>
                                        </td>
                                        <td>
                                            <button type="submit" class="answbutton" value="36" id="answer" name="answer">36</button><br>
                                            <button type="submit" class="answbutton" value="-1" id="answer" name="answer">Другое</button>
                                        </td>
                                    </tr>
                                <?php
                                } else {
                                ?>
                                    <tr>
                                        <td>
                                            <button type="submit" class="answbutton" value="9" id="answer" name="answer">9</button><br>
                                            <button type="submit" class="answbutton" value="5" id="answer" name="answer">5</button>
                                        </td>
                                        <td>
                                            <button type="submit" class="answbutton" value="13" id="answer" name="answer">13</button><br>
                                            <button type="submit" class="answbutton" value="-1" id="answer" name="answer">Другое</button>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </table>
                        </form>
                        <!-- <form action="checkans.php?game=<? print($game['id']) ?>" method="post" enctype="multipart/form-data">
                            <input type="text" name="answer" id="answer">
                            <button type="submit" class="startbutton">Ответить</button>
                        </form> -->
                    <?php
                } else {
                    $log = $_COOKIE['login'];
                    $end = DB::query("SELECT * FROM `users` WHERE `login`='$log'");
                    $endmas = $end->fetch_assoc();
                    ?>
                        <div class="final">
                            <?php
                            print("Вы ответили на " . $endmas['gamescore'] . " из 13 вопросов<br>");
                            if ($endmas['gamescore'] < 7) {
                                print("У Вас большие проблемы с цветовостриятием. Советуем в ближайшее время посетить врача-офтальмолога");
                            } else if ($endmas['gamescore'] >= 7 and ($endmas['gamescore'] < 10)) {
                                print("У Вас есть проблемы с цветовостриятием. Советуем посетить врача-офтальмолога");
                            } else if ($endmas['gamescore'] >= 10 and ($endmas['gamescore'] < 13)) {
                                print("У Вас есть небольшие проблемы с цветовостриятием. Советуем выделить время на посещение к врачу-офтальмологу");
                            } else if ($endmas['gamescore'] == 13) {
                                print("У Вас есть нет проблем с цветовостриятием.");
                            }
                            ?>
                            <br><br><a href="game.php" class="startbutton">Попробовать ещё раз</a>
                        </div>
                    <?php
                }
            } else {
                    ?>
                    <img class="imgdaltest" src="img/daltest.jpg"><br>
                    <a href="?game=1&start=1"><button type="button" class="startbutton">Начать тест</button></a>

                <?php
            }
                ?>
                    </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type="text/javascript" src="scripts/burger.js"></script>
</body>

</html>