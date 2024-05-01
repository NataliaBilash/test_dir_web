<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Билаш Н.В.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css” />
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <header class="nav_bar">
      <h1 class="nav_text">Личная страница</h1>
    </header>
      <article>
        <div class="container">
          <section class="row">
            <div class="col-12">
              <div class="col-9 nav_logo"></div>
              <h2>Чай</h2>
              <p>занимает важную роль в моей жизни. У меня дома целая коллекция чая:</p>
              <nav>
                <ul>
                  <li><p>настоящий индийский ассам, привезенный как вы поняли из Индии</p></li>
                  <li><p>различные ароматизированые цитрусовые купажи</p></li>
                  <li><p>Соусен (не очень)</p></li>
                  <li><p>штук 5 различных бергамотовых купажей</p></li>
                </ul>
              </nav>
            </div>  
            <div class="col-8">
              <div class="row my_photo"></div>
              <div class="row"><p class="title_photo">HTML человека</p></div>
            </div>
          </section>
        </div>
        <div class="container">
          <section class="row">
            <div class="col-4">
              <h2>Цветы</h2>
              <h4>Также я выращиваю розы. В основном у меня растут розы сорта Кордана (желтые, белые и красные (как на флаге Ватикана))
                 Еще есть сорт Аспирин и недавно помер куст Керио. По мимо роз еще я выращиваю мандарины, лимоны, гранат и кофе.
              </h4>
            </div>
          </section>
        </div>
      </article>
      <div class="container">
        <div class="row">
          <div class="button_js col-12">
            <button id="MyButton">Click me</button>
            <p id="demo"></p>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h1 class="hello">
              Привет, <?php echo $_COOKIE['User']; ?>
            </h1>
          </div>
          <div class="col-12">
                <form class="fprm_align" method="POST" action="profile.php" enctype="multipart/form-data" name="upload">
                    <input class="form" type="text" name="title" placeholder="Заголовок поста">
                    <textarea name="text" cols="30" rows="10" placeholder="Введите текст поста..."></textarea>
                    <input type="file" name="file" /><br>
                    <button type="submit" class="btn_red" name="post_submit">Сохранить пост</button>
                </form>
            </div>
        </div>
      </div>
  <script type="text/javascript" src="/home/zeroff/Рабочий стол/web_test/test_dir_web/js/button.js"></script>
  </body>
</html>

<?php
require_once('db.php');

$link = mysqli_connect('db', 'root', '123', 'site_db');

if (isset($_POST['post_submit'])) {
  $title = $_POST['title'];
  $main_text = $_POST['text'];

  if (!$title || !$main_text) die ("Заполните все поля");

  $sql = "INSERT INTO posts (title, main_text) VALUES ('$title', '$main_text')";

  if (!mysqli_query($link, $sql)) die ("Не удалось добавить пост");

  if(!empty($_FILES["file"]))
    {
        if (((@$_FILES["file"]["type"] == "image/gif") || (@$_FILES["file"]["type"] == "image/jpeg")
        || (@$_FILES["file"]["type"] == "image/jpg") || (@$_FILES["file"]["type"] == "image/pjpeg")
        || (@$_FILES["file"]["type"] == "image/x-png") || (@$_FILES["file"]["type"] == "image/png"))
        && (@$_FILES["file"]["size"] < 102400))
        {
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
            echo "Load in:  " . "upload/" . $_FILES["file"]["name"];
        }
        else
        {
            echo "upload failed!";
        }
    }
}
?>