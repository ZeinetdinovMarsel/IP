<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <Link rel="stylesheet" href="styles/styles.css">
</head>

<body>
    <div>
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
                    <li class="link active"><a href="mldm.php">Лабораторные Млидм</a></li>
                    <?php
                    if ($_COOKIE['user'] == '') : ?>
                        <li class="link"><a href="userenter.php">Вход/Регистрация</a></li>
                    <?php else : ?>
                        <li class="link"><a href="game.php">Игра</a>
                        <li class="link"><a href="userpage.php"><?= $_COOKIE['user'] ?></a> <a href="/exit.php">Выход</a>
            </div>
        <?php endif; ?>
        </ul>
    </div>
    </nav>
    </div>
    <section class="project-section">
        <div class="project-container">
            <div class="project-card">
                <img src="img/lab.gif" class="project-img" alt="">
                <div class="project-content">
                    <h1 class="project-title">Первая лабораторная</h1>
                    <p class="project-info">
                        Разработать программу на JS выполняющую операции с двумя множествами: объединение, пересечение, дополнение A\B B\A, симметрическую разность. </p>
                    <div class="project-btn-grp">
                        <a href="https://github.com/ZeinetdinovMarsel/MLDM"><button class="project-btn github">github</button></a>
                        <a href="mldmlab1.php"><button class="project-btn live">Запустить</button></a>
                    </div>
                </div>
            </div>
            <div class="project-card">
                <img src="img/lab2.gif" class="project-img" alt="">
                <div class="project-content">
                    <h1 class="project-title">Вторая лабораторная</h1>
                    <p class="project-info">
                        Разработать программу, определяющую свойства отношения.Определяемые свойства: рефлексивность, симметричность, кососимметричность, транзитивность
                    <div class="project-btn-grp">
                        <a href="https://github.com/ZeinetdinovMarsel/MLDM"><button class="project-btn github">github</button></a>
                        <a href="mldmlab2.php"><button class="project-btn live">Запустить</button></a>
                    </div>
                </div>
            </div>
            <div class="project-card">
                <img src="img/lab3.gif" class="project-img" alt="">
                <div class="project-content">
                    <h1 class="project-title">Третья лабораторная</h1>
                    <p class="project-info">
                        Определение является ли отношение функцией. Вводить необходимо отношение и элементы обоих множеств.
                    <div class="project-btn-grp">
                        <a href="https://github.com/ZeinetdinovMarsel/MLDM"><button class="project-btn github">github</button></a>
                        <a href="mldmlab3.php"><button class="project-btn live">Запустить</button></a>
                    </div>
                </div>
            </div>
            <div class="project-card">
                <img src="img/lab4.gif" class="project-img" alt="">
                <div class="project-content">
                    <h1 class="project-title">Четвертая лабораторная</h1>
                    <p class="project-info">
                        Разработать программу на php нахождения кратчайшего пути в графе.При выводе необходимо показывать весь маршрут, путем перечисления вершин и суммарная стоимость пути.

                    <div class="project-btn-grp">
                        <a href="https://github.com/ZeinetdinovMarsel/MLDM"><button class="project-btn github">github</button></a>
                        <a href="mldmlab4.php"><button class="project-btn live">Запустить</button></a>
                    </div>
                </div>
            </div>
            <div class="project-card">
                <img src="img/lab5.gif" class="project-img" alt="">
                <div class="project-content">
                    <h1 class="project-title">Пятая лабораторная</h1>
                    <p class="project-info">
                        Разработать программу на php нахождения матрицы достижимости.
                    <div class="project-btn-grp">
                        <a href="https://github.com/ZeinetdinovMarsel/MLDM"><button class="project-btn github">github</button></a>
                        <a href="mldmlab5.php"><button class="project-btn live">Запустить</button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="scripts/burger.js"></script>
</body>

</html>