<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
    const URL_1 = "yii-home.com";
    const URL_2 = "yii-site.com";
    const URL_3 = "yii-event.com";
//    const DOMAIN_1 = "http://yii-home.com/";
//    const DOMAIN_2 = "http://yii-site.com/";
//    const DOMAIN_3 = "http://yii-event.com/";
    const nameController1 = "home";
    const nameController2 = "site";
    const nameController3 = "event";

    const LANGUAGE_1 = 'vn';
    const LANGUAGE_2 = 'en_us';
    const LANGUAGE_3 = 'fr';

//    const ARRAY_DOMAIN_1 = [
//        self::DOMAIN_1,
//        self::DOMAIN_1 . 'index/',
//        self::DOMAIN_1 . 'home/',
//        self::DOMAIN_1 . 'home/index/',
//    ];
//
//    const ARRAY_DOMAIN_2 = [
//        self::DOMAIN_2,
//        self::DOMAIN_2 . '/index/',
//    ];
//
//    const ARRAY_DOMAIN_3 = [
//        self::DOMAIN_3,
//        self::DOMAIN_3 . 'index/',
//        self::DOMAIN_3 . 'create/',
//        self::DOMAIN_3 . 'update/',
//        self::DOMAIN_3 . 'event/index/',
//        self::DOMAIN_3 . 'event/create/',
//        self::DOMAIN_3 . 'event/update/',
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

//    public function createUrl($route,$params=array(),$ampersand='&'){
//
//        $route = Yii::app()->getLanguage().'/'.$route;
//        return parent::createUrl($route, $params, $ampersand);
//    }

    public function checkDomain($controller)
    {
        $hostname = $_SERVER['SERVER_NAME'];
        $language = Yii::app()->urlManager->rules;
//        echo "<pre>";
//        print_r($language);
//        echo "</pre>";
//        die;
//        if (in_array($hostname,Controller::ARRAY_DOMAIN_1)) {
//            echo "1";
//        }elseif(in_array($hostname,Controller::ARRAY_DOMAIN_2)){
//            echo "2";
//        }elseif(in_array($hostname,Controller::ARRAY_DOMAIN_3)){
//            echo "3";
//        }else{
//            throw new CHttpException(404, 'Page not found');
//        }
//        die;
        if($controller == Controller::nameController1 && $hostname == Controller::URL_1){ // home
            echo "home";
        }elseif($controller == Controller::nameController2 && $hostname == Controller::URL_2){ // site
            echo "site";
        }elseif($controller == Controller::nameController3 && $hostname == Controller::URL_3){ // event
            echo "event";
        }else{
            throw new CHttpException(404, 'Page not found');
        }
    }
}