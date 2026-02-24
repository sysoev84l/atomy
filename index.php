<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/assets/php/functions.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/assets/php/connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="Author" content="Alexey" />
    <!-- Авторские права -->
    <meta name="Copyright" content="Alexy" />
    <!-- Адрес автора -->
    <meta name="Address" content="Россия, г. Мухасранск, ул. Пушкина, дом Калатушкина" />
    <meta name="robots" content="index, follow" />
    <meta name="revisit-after" content="10 day" />
    <meta https-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- локализация сайта, для русскоязычного сайта ru_RU -->
    <meta property="og:locale" content="ru_RU" />
    <!-- тип контента, по умолчанию используется article -->
    <meta property="og:type" content="article" />
    <!-- заголовок страницы, который будет выводится в записи социальной сети -->
    <meta property="og:title" content="Учет пллет для Мирада-Л" />
    <!-- описание страницы -->
    <meta property="og:description" content="Учет пллет для Мирада-Л" />
    <!-- ссылка на изображение, которое будет публиковаться в записи -->
    <meta property="og:image" content="<?php echo get_server_name(); ?>" />
    <!-- ссылка на текущую страницу -->
    <meta property="og:url" content="<?php echo get_server_name(); ?>" />
    <!-- название сайта -->
    <meta property="og:site_name" content="<?php echo get_server_name(); ?>" />
    <link rel="icon" href="./favicon.ico" type="image/x-icon">
    <title>Atomy Pallet Accouting</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/fontawesome/css/all.min.css">
</head>

<body>
    <div class="wrap">
        <header class="header">
            <div class="container">
                <div class="header__wrap">
                    <div class="header__img_wrap">
                        <a href="https://dpd.ru" target="_blank" rel="noopener noreferrer">
                            <img src="./assets/img/logo/dpd-logo.png" alt="">
                        </a>
                    </div>
                    <div class="header__title">
                        <h2>Atomy Pallet Accouting</h2>
                    </div>
                    <div class="header__img_wrap">
                        <a href="https://www.atomy.ru" target="_blank" rel="noopener noreferrer">
                            <img src="./assets/img/logo/atomy-logo.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </header>
        <main class="content">
            <div class="container">
                <h1 class="h1">Учет пллет для Мирада-Л</h1>
                <?php
                $data = $mysqli->query("SELECT * FROM pallet_accouting ORDER BY `date` DESC");
                $total_inside;
                $total_outside;
                foreach ($data as $item) {
                    if ($item['type']) {
                        $total_inside += $item['quantity'];
                    } else {
                        $total_outside += $item['quantity'];
                    }
                }
                ?>
                <section class="section__form_add">
                    <form class="form_add" action="assets/php/add-data.php" method="POST">
                        <div class="add_data">
                            <label for="date">Дата</label>
                            <input class="" type="date" id="date" name="date" required>
                        </div>
                        <div class="add_data">
                            <label for="quantity">Количество</label>
                            <input class="" type="number" id="quantity" name="quantity" required>
                        </div>
                        <div class="radio__wrap">
                            <div class="radio__title">Тип:</div>
                            <div class="radio__form">
                                <div class="radio__form_item">
                                    <input class="" type="radio" name="type" id="inside" value="1" checked>
                                    <label class="" for="inside">
                                        приход
                                    </label>
                                </div>
                                <div class="radio__form_item">
                                    <input class="" type="radio" name="type" id="outside" value="0">
                                    <label class="" for="outside">
                                        расход
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="btns__wrap">
                            <div class="btn_wrap">
                                <button type="reset" class="btn">Сбросить</button>
                            </div>
                            <div class="btn_wrap">
                                <button type="submit" class="btn">Применить</button>
                            </div>
                        </div>
                    </form>
                </section>
                <section class="accouting_table">
                    <h2 class="h2">Обший итог</h2>
                    <div class="table__wrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">приход</th>
                                    <th scope="col">расход</th>
                                    <th scope="col">долг</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <?= $total_inside ?>
                                    </td>
                                    <td>
                                        <?= $total_outside ?>
                                    </td>
                                    <td>
                                        <?= $total_inside - $total_outside ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h2 class="h2">Детализация</h2>
                    <div class="table__wrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Дата</th>
                                    <th scope="col">Тип</th>
                                    <th scope="col">Количество</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data as $item) {
                                    if ($item['type']) {
                                        echo "<tr>";
                                        echo "<td>";
                                        echo $item['date'];
                                        echo "</td>";
                                        echo "<td>";
                                        echo 'Приход';
                                        echo "</td>";
                                        echo "<td>";
                                        echo $item['quantity'];
                                        echo "</td>";
                                        echo "</tr>";
                                        $total_inside += $item['quantity'];
                                    } else {
                                        echo "<tr>";
                                        echo "<td>";
                                        echo $item['date'];
                                        echo "</td>";
                                        echo "<td>";
                                        echo 'Расход';
                                        echo "</td>";
                                        echo "<td>";
                                        echo $item['quantity'];
                                        echo "</td>";
                                        echo "</tr>";
                                        $total_outside += $item['quantity'];
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </section>

            </div>
        </main>

        <footer class='footer'>
            <div class="container">
                <div class="footer-wrap">
                    <div class='git-hub'>
                        <a href="https://github.com/sysoev84l/atomy.git" target='_blank' rel="noreferrer">
                            <i class="fab fa-github"></i> GitHub
                        </a>
                    </div>
                    <p class='copyright'>
                        &copy; Все права защищены
                    </p>
                    <div class='host-name-wrap'>
                        <a href='' class='host-name'> </a>
                    </div>
                </div>
            </div>
        </footer>

    </div>
    <script src="./assets/js/main.js"></script>
</body>

</html>