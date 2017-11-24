<?php

namespace App\Kernels\Http\Modules\Frontend\Controllers;

use Phalcon\Mvc\View;

/**
 * Class IndexController
 *
 * @package Controllers
 */
class IndexController extends ControllerBase
{
    public function indexAction()
    {
        $this->tag->setTitle('Nucleon Frontend');
        $this->assets->addCss("https://fonts.googleapis.com/css?family=Raleway:100,600");
        $this->assets->addCss("css/home.css");
        $this->view->setTemplateAfter('main_light');
        $this->view->render('front/index', 'index');
    }
}
