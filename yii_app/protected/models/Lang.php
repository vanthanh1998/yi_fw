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