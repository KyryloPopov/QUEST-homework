<?php

namespace application\controllers;

use application\core\Controller;

class ConferenceController extends Controller
{

    public function createAction()
    {
        if (!empty($_POST)) {
            if (!$this->model->conferenceValidate($_POST)) {
                $this->view->message('Error!', $this->model->error);
            } else
            if (!$this->model->conferenceInsert($_POST)) {
                $this->view->message('Error!', "Error!");
            }
            $_SESSION['status'] = 'Conference added successfully!';
            $this->view->location("/");
        }
        $vars = [
            "countries" => $this->model->getCountries()
        ];
        $this->view->render('Creating', $vars);
    }

    public function editAction()
    {
        if (!$this->model->conferenceExist($this->route['id'])) {
            $this->view->errorCode(404);
        }
        if (!empty($_POST)) {
            if (!$this->model->conferenceValidate($_POST)) {
                $this->view->message('Error!', $this->model->error);
            }
            $this->model->conferenceEdit($_POST, $this->route['id']);
            $_SESSION['status'] = 'Conference data has been updated!';
            $this->view->location("/");
        }
        $vars = [
            'id' => $this->route['id'],
            'data' => $this->model->getConferenceData($this->route['id'])[0],
            'countries' => $this->model->getCountries(),
        ];
        $this->view->render('Editing', $vars);
    }

    public function detailsAction()
    {
        if (!$this->model->conferenceExist($this->route['id'])) {
            $this->view->errorCode(404);
        }
        $vars = [
            'conference' => $this->model->getConferenceData($this->route['id'])[0],
        ];
        $this->view->render('Viewing', $vars);
    }

    public function deleteAction()
    {
        if (!$this->model->conferenceExist($this->route['id'])) {
            $this->view->errorCode(404);
        }
        $this->model->conferenceDelete($this->route['id']);
        $_SESSION['status'] = 'Conference deleted successfully!';
        $this->view->redirect("/");
    }
}
