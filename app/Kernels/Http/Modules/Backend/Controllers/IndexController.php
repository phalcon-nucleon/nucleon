<?php

namespace App\Kernels\Http\Modules\Backend\Controllers;

use Phalcon\Mvc\View;

class IndexController extends ControllerBase
{
    public function indexAction()
    {
        $this->tag->setTitle('Nucleon Backend');
        $this->assets->addCss("css/home.css");
        $this->assets->addCss("https://fonts.googleapis.com/css?family=Raleway:100,600");

        $this->view->setRenderLevel(View::LEVEL_MAIN_LAYOUT);
        $this->view->setTemplateAfter('main_light');
        $this->view->render('back/index', 'index');
    }
}