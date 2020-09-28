<?php

session_start();

require_once(__DIR__ . '/config.php');
require_once(__DIR__ . '/functions.php');
require_once(__DIR__ . '/Todo.php');

//get todos
$todoApp = new \MyApp\Todo();
$todos = $todoApp->getTwo();


?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>My Todos</title>
    <link rel="icon" href="img/メモファビコン.png">
    <link rel="stylesheet" href="styles.css">
  </head>

  <body>
   <section>
      <div class="section s_07">

        <!-- メニューバー -->
          <!--アコーディオンメニュー部分 start-->
        <nav class="accordion">

            <label for="menu2">心理的ハードル ▼</label>
            <input type="checkbox" id="menu2" class="toggle" />
            <ul>
                <li><a href="easy.php">簡単</a></li>
                <li><a href="normal.php">普通</a></li>
                <li><a href="difficult.php">難しい</a></li>
            </ul>
        
            <label for="menu1">時間管理マトリクス ▼</label>
            <input type="checkbox"  id="menu1" class="toggle" />
            <ul>
                <li><a href="1.php">第一領域</a></li>
                <li><a href="2.php">第二領域</a></li>
                <li><a href="3.php">第三領域</a></li>
                <li><a href="4.php">第四領域(Not Todo)</a></li>
            </ul>
           
            
            <a href="index.php">全てのTodo</a>
        </nav>
        <!--アコーディオンメニュー部分 end-->
    </section>


      <div id="container">
      <h1>やりたいことを整理してくれるTodoリスト 第二領域</h1>
      <form action="" id="new_todo_form">
        <input type="text" id="new_todo" placeholder="頭の中にあるやりたいこと、やることを書き出して！">
      </form>
      <ul id="todos">
      <?php foreach ($todos as $todo) : ?>
        <li id="todo_<?= h($todo->id); ?>" data-id="<?= h($todo->id); ?>">
        <input type="checkbox" class="update_todo" <?php if ($todo->state === '1') { echo 'checked'; } ?>>
        <span class="todo_title <?php if ($todo->state === '1') { echo 'done'; } ?>"><?= h($todo->title); ?></span><br>
        <!-- 削除ボタン -->
        <div class="delete_todo">x</div>
        <!-- 難易度ボタン -->
         <label><input type="radio" class="update_difficulty" name="difficulty <?= h($todo->id); ?>"  value="easy" <?php if ($todo->difficulty === 'easy') { echo 'checked'; } ?>>簡単</label>

         <label><input type="radio" class="update_difficulty" name="difficulty <?= h($todo->id); ?>" value="normal" <?php if ($todo->difficulty === 'normal') { echo 'checked'; } ?>>普通</label>

         <label><input type="radio" class="update_difficulty" id="difficult<?= h($todo->id); ?>" name="difficulty <?= h($todo->id); ?>" value="difficult" onClick="devide()" <?php if ($todo->difficulty === 'difficult') { echo 'checked'; } ?>>難しい</label><br>
        <!-- 領域ボタン -->
         <label><input type="radio" class="update_area" name="category <?= h($todo->id); ?>"  value="one" <?php if ($todo->area === 'one') { echo 'checked'; } ?>>①</label>

         <label><input type="radio" class="update_area" name="category <?= h($todo->id); ?>" value="two" <?php if ($todo->area === 'two') { echo 'checked'; } ?>>②</label>

         <label><input type="radio" class="update_area" name="category <?= h($todo->id); ?>" value="three" <?php if ($todo->area === 'three') { echo 'checked'; } ?>>③</label>

        <label><input type="radio" class="update_area" name="category <?= h($todo->id); ?>" value="four" <?php if ($todo->area === 'four') { echo 'checked'; } ?>>④(やらないこと)</label><br>
        </li>
      <?php endforeach; ?>



        <li id="todo_template" data-id="">
        <input type="checkbox" class="update_todo">
        <span class="todo_title"></span><br>
           <!-- 削除ボタン -->
           <div class="delete_todo">x</div>
           <!-- 難易度ボタン -->
         <label><input type="radio" class="update_difficulty" name="difficulty <?= h($todo->id); ?>"  value="easy" <?php if ($todo->difficulty === 'easy') { echo 'checked'; } ?>>簡単</label>

         <label><input type="radio" class="update_difficulty" name="difficulty <?= h($todo->id); ?>" value="normal" <?php if ($todo->difficulty === 'normal') { echo 'checked'; } ?>>普通</label>

        
         <label><input type="radio" class="update_difficulty" name="difficulty <?= h($todo->id); ?>" value="difficult" onClick="devide()" <?php if ($todo->difficulty === 'difficult') { echo 'checked'; } ?>>難しい</label><br>
           <!-- 領域ボタン -->
         <label><input type="radio" class="update_area" name="category <?= h($todo->id); ?>"  value="one" <?php if ($todo->area === 'one') { echo 'checked'; } ?>>①</label>

         <label><input type="radio" class="update_area" name="category <?= h($todo->id); ?>" value="two" <?php if ($todo->area === 'two') { echo 'checked'; } ?>>②</label>

         <label><input type="radio" class="update_area" name="category <?= h($todo->id); ?>" value="three" <?php if ($todo->area === 'three') { echo 'checked'; } ?>>③</label>

        <label><input type="radio" class="update_area" name="category <?= h($todo->id); ?>" value="four" <?php if ($todo->area === 'four') { echo 'checked'; } ?>>④(やらないこと)</label><br>
        </li>

      </ul>
      <img src="img/すぐやる人画像.png" alt="難易度の写真" title="すぐやる人ピクチャ" width="500" height="350">
      <img src="img/お役立ち画像.png" alt="難易度助言の写真" title="助言ピクチャ" width="500" height="200" style="margin: 50px 0 40px 0;">
      <img src="img/簡単なこと.png" alt="難易度の意義" title="簡単なことピクチャ" width="500" height="500" >
      <img src="img/管理マトリクス分類表.PNG" alt="カテゴリーの写真" title="カテゴリー分類表" width="500" height="380" style="margin: 50px 0;">
      </div>
      <input type="hidden" id="token" value="<?= h($_SESSION['token']); ?>">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
      <script src="todo.js"></script>
  </body>
</html>