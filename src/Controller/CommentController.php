<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CommentController extends \Core\Controller
{

    public function index()
    {
        print_r(\App\App::getInstance()->getTable('comment')->all());
    }

    public function show($id)
    {
        $comments = \App\App::getInstance()->getTable('comment')->find($id);
        print_r($comments);
    }
}