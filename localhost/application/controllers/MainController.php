<?php

namespace application\controllers;

use application\core\Controller;

class MainController extends Controller
{

    public function indexAction()
    {
        $result = $this->model->getConferences();
        $vars = [
            'conferences' => $result,
        ];
        $this->view->render('Main Page', $vars);
    }
}
