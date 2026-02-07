<?php
// require_once $_SERVER['DOCUMENT_ROOT'] . "/assets/php/functions.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/assets/php/connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/fontawesome/css/all.min.css">
</head>

<body>
    <div class="wrap">
        <header class="header">
            <div class="container">
                <div class="header__wrap">
                    <div class="header__img_wrap">
                        <img src="./assets/img/logo/dpd-logo.png" alt="">
                    </div>
                    <div class="header__title">
                        <h2>Atomy Pallet Accouting</h2>
                    </div>
                    <div class="header__img_wrap">
                        <img src="./assets/img/logo/atomy-logo.png" alt="">
                    </div>
                </div>
            </div>
        </header>
        <main class="content">
            <div class="container">
                <h1 class="h1">Учет пллет для Мирада-Л</h1>
                <?php
                $data = $mysqli->query("SELECT * FROM pallet_accouting ORDER BY `date` ASC");
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
                            <div class="radio__title">Тип</div>
                            <div class="radio__form">
                                <div class="">
                                    <input class="" type="radio" name="type" id="inside" value="1"
                                        checked>
                                    <label class="" for="inside">
                                        приход
                                    </label>
                                </div>
                                <div class="">
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
                    <h2>Обший итог</h2>
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
                    <h2>Детализация</h2>
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
                                    echo 'Пришло';
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
                                    echo 'Ушло';
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