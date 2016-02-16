<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use app\models\Tag;

/**
 * This is the model class for table "description".
 *
 * @property integer $desid
 * @property string $date
 * @property string $header
 * @property string $art_body
 * @property integer $tag
 * @property string $photo
 *
 * @property Tag $tag0
 */
class Description extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;

    public static function tableName()
    {
        return 'description';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'header', 'art_body'], 'required', 'message'=>'Будь ласка, написати полі'],
            [['date'], 'safe'],
            [['art_body'], 'string', 'max'=>32000, 'message'=>'Max: 32kb'], // 1 буква = 1 байт, 32000 букви = 32000 кілобайт = 32кб.
            [['tag'], 'integer'],
            [['header'], 'string', 'max' => 200],
            [['file'], 'file'],
            [['photo'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'desid' => 'ID',
            'date' => 'Дата',
            'header' => 'Заголовок',
            'art_body' => 'Тіло статті',
            'tag' => 'Теги',
            'photo' => 'Фото',
            'file' => 'Файл'
        ];
    }

    public function joinDescTag(){
        $model=Description::find()->all();
        var_dump($model);
        die();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTag0()
    {
        return $this->hasOne(Tag::className(), ['tag_id' => 'tag']);
    }
}
