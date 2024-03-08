<?php

namespace App\common;

class GeneralHelpers {
    public static function SaveData($model, $data) {
        foreach ($data as $key => $value) {
            $model->{$key} = $value;
        }

        GeneralHelpers::EmptyToNull($model);
        $model->save();
    }


    public static function EmptyToNull($model) {
        foreach ($model->getAttributes() as $attribute => $value) {
            if ($value === "") {
                $model->{$attribute} = NULL;
            }
        }
    }
}
