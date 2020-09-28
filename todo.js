$(function() {
  'use strict';

  $('#new_todo').focus();

  //update
  $('#todos').on('click', '.update_todo', function() {
    //idを取得
    var id = $(this).parents('li').data('id');
    // ajax処理
    $.post('_ajax.php', {
      id: id,
      mode: 'update',
      token: $('#token').val()
    }, function(res) {
      if (res.state === '1') {
        $('#todo_' + id).find('.todo_title').addClass('done');

        var msg = new Array();

        msg[0] = 'いい感じ！';
        msg[1] = 'しゃー！';
        msg[2] = 'ありがとう！';
        msg[3] = 'お疲れ！背伸びしよう！';
        msg[4] = 'よく頑張ったー！';

        var no = Math.floor(Math.random() * msg.length);
        alert(msg[no]);
      } else {
        $('#todo_' + id).find('.todo_title').removeClass('done');
      }
    })
  });



  //delete
  $('#todos').on('click', '.delete_todo', function() {
    //idを取得
    var id = $(this).parents('li').data('id');
    // ajax処理
    if (confirm('are you sure?')) {
      $.post('_ajax.php', {
        id: id,
        mode: 'delete',
        token: $('#token').val()
      }, function() {
        $('#todo_' + id).fadeOut(800);
      });
    }
  });

  //create
  $('#new_todo_form').on('submit',  function() {
    //titleを取得
    var title = $('#new_todo').val();
    // ajax処理
      $.post('_ajax.php', {
        title: title,
        mode: 'create',
        token: $('#token').val()
      }, function(res) {
        // liを追加
        var $li = $('#todo_template').clone();
        $li
          .attr('id', 'todo_' + res.id)
          .data('id', res.id)
          .find('.todo_title').text(title);
        $('#todos').prepend($li.fadeIn());
        $('#new_todo').val('').focus();
      });
      return false;
  });


  //領域データベースupdate
  $('#todos').on('click','.update_area', function() {
    //areaを取得
    var id = $(this).parents('li').data('id');
    var area = $(`input:radio[name="category ${id}"]:checked`).val();
    console.log(area);
    // ajax処理
    $.post('_ajax.php', {
      id: id,
      area: area,
      mode: 'area',
      token: $('#token').val()
      })
     }
    );

//     //難易度データベースupdate
$('#todos').on('click', '.update_difficulty', function() {
  //difficultyを取得
  var id = $(this).parents('li').data('id');
  var difficulty = $(`input:radio[name="difficulty ${id}"]:checked`).val();
  console.log(difficulty);
  // ajax処理
  $.post('_ajax.php', {
    id: id,
    difficulty: difficulty,
    mode: 'difficulty',
    token: $('#token').val()
      });
    });

    //最初のfunctionの()
  });
  


  function devide() {
    rand = Math.floor(Math.random()*3);
    if (rand == 0) msg = "もっと簡単なこと3つに書き直そう！";
    if (rand == 1) msg = "パソコンの前に座る的なこと4つに書き直そう！";
    if (rand == 2) msg = "もっと楽なタスクで5つ！着手主義！";
    alert(msg);
  }