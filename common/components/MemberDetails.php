<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace common\components;

use \yii\base\Component;
use common\models\Members;
use common\models\Users;
use Yii;

/**
 * Description of MemberDetails
 *
 * @author apache
 */
class MemberDetails extends Component{
    public function isMember(){
        $aMember = false;
        $myuser = Users::find()->where(['id' =>Yii::$app->user->id])->one();
        if(!empty(Members::find()->where(['email'=>$myuser->email ])->one())){
            $aMember = true;
        }
        return $aMember;
    }
    public function getEmail()
    {
        $myuser = Users::find()->where(['id' =>Yii::$app->user->id])->one();
        return $myuser->email;
    }
    
    public function getItem($itemNo=1)
    {
        $themember = Members::find()->where(['userId' =>Yii::$app->user->id])->one();
        if(!empty($themember)){
            switch ($itemNo){
               case 1://memberId
                   return $themember['id'];
               case 2://Surname
                   return $themember['surname'];
               case 3://otherNames
                   return $themember['otherNames'];
               case 4://gender
                   return $themember['gender'];
               case 5://idNo
                   return $themember['idNo'];
               case 6://idType
                   return $themember['idType'];
               case 7://nationality
                   return $themember['nationality'];
               case 8://email
                   return $themember['email'];
               case 9://phone
                   return $themember['phone'];
               case 10://birthDate
                   return $themember['birthDate'];
               case 11://createDate
                   return $themember['createDate'];
               default:
                   return 0;
            }
        }
    }
}
