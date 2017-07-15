<?php

namespace App\Kernels\Http\Controllers;

use Phalcon\Mvc\View;

/**
 * Class IndexController
 *
 * @package Controllers
 */
class HomeController extends ControllerBase
{
    public function indexAction()
    {
        $this->tag->setTitle('Nucleon Home');
        $this->assets->addCss("css/home.css");
        $this->assets->addCss("https://fonts.googleapis.com/css?family=Raleway:100,600");

        $this->view->setRenderLevel(View::LEVEL_MAIN_LAYOUT);
        $this->view->setTemplateAfter('main_light');
        $this->view->render('home', 'index');
    }
}
