<?php

class HomeController extends Controller
{
    public function actions()
    {
        return parent::actions(); // TODO: Change the autogenerated stub
    }

    public function __construct($id, $module = null)
    {
        parent::__construct($id, $module);
        $this->checkDomain($id);
    }

    public function actionIndex()
    {
        $this->render('index');
    }

}