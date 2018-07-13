<?php

namespace app\models\form;

use app\models\Access;
use app\models\Note;
use yii\helpers\BaseArrayHelper;

class NoteForm extends Note
{
    /**
     * @var int[]
     */
    public $grantedTo = [];

    public function afterFind()
    {
        parent::afterFind();

        $accesses = Access::find()->andWhere(['note_id' => $this->id])->all();
        foreach ($accesses as $access) {
            $this->grantedTo[] = $access->user_id;
        }
    }


    public function rules(): array
    {
        return BaseArrayHelper::merge([
            ['grantedTo', 'each', 'rule' => ['integer']],
        ], parent::rules());
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        foreach ($this->grantedTo as $userId) {
            $access = new Access([
                'user_id' => $userId,
                'note_id' => $this->id,
            ]);
            $access->save();
            $this->link('access', $access);
        }
    }
}