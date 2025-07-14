<?php

namespace App\Controllers;

use App\Models\Article;

class ArticlesController {

  public function index() {
    $articlesModel = new Article;
    $articles = $articlesModel->getAll();
    view('articles/index.view.php', [
      'articles' => $articles
    ]);
  }

  public function create() {
    view('articles/create.view.php');
  }

  public function store() {
    $naslov = htmlspecialchars($_POST['naslov']);
    $tijelo = htmlspecialchars($_POST['tijelo']);

    $article = new Article;
    $article->create($naslov, $tijelo);
    redirect('/articles');
  }

  public function edit() {
    $articleModel = new Article;
    $article = $articleModel->getById($_GET['id']);
    view('articles/edit.view.php', [
      'article' => $article
    ]);
  }

  public function update() {
    $id = $_POST['id'];
    $naslov = htmlspecialchars($_POST['naslov']);
    $tijelo = htmlspecialchars($_POST['tijelo']);
    $article = new Article;
    $article->update($id, $naslov, $tijelo);
    redirect('/articles');
  }

  public function destroy() {
    $id = $_POST['id'];
    $article = new Article;
    $article->delete($id);
    redirect('/articles');
  }
}