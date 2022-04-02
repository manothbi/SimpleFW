<?php
namespace App\Entity;

class CommentsEntity extends \Core\Entity\Entity 
{
    public $id, $body, $created_at, $news_id;

}