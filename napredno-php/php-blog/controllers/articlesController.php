<?php

$db = Database::getInstance();
$conn = $db->getConnection();
$stmt = $conn->prepare("SELECT * FROM clanci");
$result = $stmt->execute();
$articles = $stmt->fetchAll();


view('articles/index.php', [
  'articles' => $articles
]);

