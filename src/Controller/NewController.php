<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class NewController extends \Core\Controller
{
    public function index()
    {
        print_r(\App\App::getInstance()->getTable('new')->all());
    }

    public function show($id)
    {
        print_r(\App\App::getInstance()->getTable('new')->find($id));
    }
}