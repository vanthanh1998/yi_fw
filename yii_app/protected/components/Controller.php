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

    /*
         * On every Controller instance set language from get if is index page get main language
         */
    public function init(){

        if($_SERVER['SERVER_NAME'] == Controller::URL_1){
            $_GET['lang'] = 'en';
        }else if($_SERVER['SERVER_NAME'] == Controller::URL_2){
            $_GET['lang'] = 'hr';
        }else if($_SERVER['SERVER_NAME'] == Controller::URL_3){
            $_GET['lang'] = 'fr';
        }else{
            $_GET['lang'] = 'vn';
        }
        if(isset($_GET['lang']))
            Yii::app()->setLanguage($_GET['lang']);
        else
            Yii::app()->setLanguage(Lang::getdefaultLanguage());
        parent::init();
    }

    /*
      * ProcesUrl method used for resolving languages if dont have get language
      * System gets default language defined from database
      */
    public static function processUrl(){
        if(isset($_GET['lang'])){
            return Lang::findByCode(Yii::app()->language,  Yii::app()->controller->route);
        }else{
            return Lang::findByCode(Lang::getdefaultLanguage(),  Yii::app()->controller->route);
        }
    }

    /*
    * Aftereach action processUrl
    */
    protected function beforeAction($action) {
        self::processUrl();
        return parent::beforeAction($action);
    }

    public function createUrl($route, $params = array(), $ampersand = '&') {
        //because if you wont to define language manually
        if(empty($params['lang'])){
            $params['lang'] = Controller::processUrl();
        }
        return parent::createUrl($route, $params, $ampersand);
    }

    public function checkDomain($controller)
    {
        $hostname = $_SERVER['SERVER_NAME'];
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