<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
    const URL1 = "yii-home.com";
    const URL2 = "yii-event.com";
    const URL3 = "yii-site.com";
    const nameController1 = "home";
    const nameController2 = "site";
    const nameController3 = "event";

//    const URL = [
//        self::URL1,
//        self::URL2,
//        self::URL3,
//    ];
//
//    const NAME = [
//        self::nameController1,
//        self::nameController2,
//        self::nameController3,
//    ];
    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout='//layouts/column1';
    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu=array();
    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs=array();

    public function checkDomain($controller)
    {
        $hostname = $_SERVER['SERVER_NAME'];
        if($controller == Controller::nameController1 && $hostname == Controller::URL1){ // home
            echo "home";
        }elseif($controller == Controller::nameController2 && $hostname == Controller::URL2){ // site
            echo "site";
        }elseif($controller == Controller::nameController3 && $hostname == Controller::URL3){ // event
            echo "event";
        }else{
            throw new CHttpException(404, 'Page not found');
        }
    }
}