<?php

$articles = [
  [
    "title" => "Moji hobiji",
    "body"=> "Moji hobiji su raznovrsni, volim programirati i baviti se sportom i puno drugih stvari"
  ],
  [
    "title" => "Moja hrana",
    "body"=> "Volim hranu, volim jesti i kuhati"
  ],
  [
    "title" => "Moje namirnice",
    "body"=> "Moje nadraže namirnice su banane, mlijeko, med"
  ]
];
?>

<?php require 'views/partials/head.php' ?>

<div class="container mt-4">
  <?php foreach($articles as $article) :?>
    <div class="rounded border p-4 border-dark m-4">
      <h2><?= $article['title'] ?></h2>
      <p><?= $article['body'] ?></p>
    </div>
  <?php endforeach; ?>
</div>

<?php require 'views/partials/foot.php' ?>