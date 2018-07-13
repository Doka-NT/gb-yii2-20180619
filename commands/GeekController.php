<?php

namespace app\commands;

use app\models\Note;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\helpers\Console;

class GeekController extends Controller
{
    public $mode;

    /**
     * @param array $ids
     * @return int
     */
    public function actionIndex(array $ids): int
    {
        $notes = Note::findAll(['id' => $ids]);
        foreach ($notes as $note) {
            if ($this->mode === 'ids') {
                echo $this->ansiFormat($note->id, Console::BG_GREEN, Console::FG_GREY);
            } else {
                echo $note->text;
            }

            echo \PHP_EOL;
        }

        return ExitCode::OK;
    }

    /**
     * @return int
     */
    public function actionProgress(): int
    {
        $array = \array_fill(0, 9999, \random_int(0, 9999));
        $total = count($array);
        Console::startProgress(0, $total);

        foreach ($array as $index => $value) {
//            \password_hash($value, PASSWORD_BCRYPT);
            if ($index % 200 === 0) {
                Console::updateProgress($index++, $total);
            }
        }
        Console::updateProgress($total, $total);
        Console::endProgress();

        return ExitCode::OK;
    }

    public function options($actionID): array
    {
        if ($actionID === 'index') {
            return [
                'mode',
            ];
        }

        return parent::options($actionID);
    }
}