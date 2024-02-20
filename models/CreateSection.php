<?php

namespace app\models;


class CreateSection extends \yii\base\Model
{
public $name;

public function rules()
{
    return [
        [['name'], 'required'],
    ];

}


}