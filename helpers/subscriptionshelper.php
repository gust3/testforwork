<?php
namespace app\helpers;

use Yii;
use yii\web\View;

class subscriptionshelper{
    static public function getBlockedArray(){
        return [
            '1' => 'Нет',
            '2' => 'Да'
        ];
    }
    static public function subscriptionHandler($event){
        $id = (int) $event->name;
        $subscriptions = \app\models\Subscriptions::find()->where('type_event = '. $id)->all();
        foreach ($subscriptions as $subscription){
            if ($id == 1){
                $text = 'some text';
                self::sendEmail($subscription->email, $text);
            }
            if ($id == 2){
                $text = 'some text';
                self::sendSms($text);
            }
            //какие то другие действия
        }
    }
    static public function sendEmail($email, $text){
        //отсылка почты
    }
    static public function sendSms($text){
        //отсылка смс
    }
}