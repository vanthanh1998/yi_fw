<?php
class Lang extends CActiveRecord{

    /*
 * This method is used for static model calls
*/
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return "languages";
    }

    /*
     * Function For check lang by get request eq /hr/site/index
     * If language is by get request found in database and active langage will return current link eg /hr/site/active if your request is eg /fr/site/index
     * in this case will return /en/site/index while fr langage is not in database
     * @param cod varchar 2
     * @param route current action route
     * @param redirection default to true to redirect from eg /fr/ to /en/ while fr dont exists as language
     */
    public static function findByCode($cod,$route,$redirect = true){
        $cod = substr($cod,0,2);

        if($_SERVER['SERVER_NAME'] == Controller::URL_1){
            $data = self::model()->find('lang=:LANG AND main = 1',array(':LANG'=>$cod));
        }else if($_SERVER['SERVER_NAME'] == Controller::URL_2){
            $data = self::model()->find('lang=:LANG AND main = 2',array(':LANG'=>$cod));
        }else if($_SERVER['SERVER_NAME'] == Controller::URL_3){
            $data = self::model()->find('lang=:LANG AND main = 3',array(':LANG'=>$cod));
        }

        if(empty($data)){
            $lang = self::getdefaultLanguage();

            if($redirect == true){
                if(preg_match("/index/", $route))
                    Yii::app()->controller->redirect(Yii::app()->homeUrl.$lang.'/');
                else
                    Yii::app()->controller->redirect(Yii::app()->homeUrl.$lang.'/'.$route);
            }else
                return $lang;
        }
        else
            return $data->lang;
    }

    /*
     * get default language
     */
    public static function getdefaultLanguage(){
        return self::model()->find('main = 1')->lang;
    }


}