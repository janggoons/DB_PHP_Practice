<?php
  $link = mysqli_connect('localhost','root','20172041','dbp');
  $query = "SELECT * FROM topic";
  $result = mysqli_query($link, $query);
  $list ='';
  while ($row = mysqli_fetch_array($result)) {
    $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$row['title']}</a></li>";
  }

  $article = array(
    'title' => 'HI',
    'description' => 'Dog is ...'
  );
  if( isset($_GET['id'])) {
    $query = "SELECT * FROM topic WHERE id={$_GET['id']}";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $article = array(
      'title' => $row['title'],
      'description' => $row['description']
    );
  }
  ?>
  <!DOCTYPE html>
  <html>
    <head>
      <style>
     input.form-text {
       border: 2px solid #F2B800;
       height: 28px;
     }
     input.form-text2 {
       border: 2px solid #F2B800;
       height: 80px;
     }

 }
   </style>
      <meta charset="utf-8">
      <title>강아지 사전</title>
    </head>
    <body>
    <a href="index.php">  <img src="3.JPG" alt="My Image" width="600" height="200"></a>
      	<img src="1.JPG" alt="My Image" width="300" height="200"><p>
        <img src="4.JPG" alt="My Image" width="300" height="50">
      <ol><?= $list ?></ol>
      <form action="process_create.php" method="POST">
        <p><input type="text" class="form-text" name="title" placeholder="title"></p>
        <p><input type="textarea"placeholder="description" name="description" class="form-text2">
        <input tyPE="IMAGE" src="2.JPG" name="Submit" value="Submit" width="50" height="50">
      </form>
    </body>
  </html>
