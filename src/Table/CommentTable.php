<?php
namespace App\Table;

use Core\Table\Table;

class CommentTable extends Table {

    public function find($id){
        return $this->query("
            SELECT comments.id, comments.body as comments
            FROM comments
            LEFT JOIN  news ON news_id = news.id
            WHERE comments.news_id = ?", [$id], true);
    }

    public function byId($id){
        return $this->query("
            SELECT * 
            FROM comments
            WHERE id = ?", [$id], true);
    }

}