# YaritaikotoTodo
PHP 5.6.40 (cli) (built: May 13 2020 09:26:00)
Copyright (c) 1997-2016 The PHP Group
Zend Engine v2.6.0, Copyright (c) 1998-2016 Zend Technologies

index.php...Todoリストのホーム画面のページ、アプリの概要や説明もこのページの後半部分にだけ記載している。

1.php~4.php...TodoリストそれぞれのTodoの下のラジオボタンの①～④を押したときにデータベースで分類される。分けられたそれぞれのTodoを表示するページ

easy.php,normal.php,difficult.php...ラジオボタンで分けられたそれぞれのTodoを表示するページ

Todo.php...mysqlのデータベースへの指令をまとめたファイル

_ajax.php...

todo.js...ClickやSubmitしたときの挙動,idを取ってきたり裏の挙動に関わるファイル、jquery,ajax

config.php...mysqlのデータベースに関する情報(ユーザー名、データベース名、パスワードなど)が記載されているファイル

dump.sql...mysqlのデータベースの構造などの情報があるファイル

function.php...XSS脆弱性を突かれないように書く構文を簡単に書けるように再定義したファイル

styles.css...見た目に関することのファイル。メニューのアコーディオンについては今回はここで記述して作っている。
