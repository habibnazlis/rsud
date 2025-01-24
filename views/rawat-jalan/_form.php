<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;

/** @var yii\web\View $this */
/** @var app\models\RawatJalan $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="rawat-jalan-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

    <div class="row">
        <div class="col-md-6">
            <?php //$form->field($model, 'pasien_id')->textInput() ?>
            <?php $dataList = ArrayHelper::map(\app\models\Pasien::find()->asArray()->all(), 'id', 'no_rekam_medis');
            echo $form->field($model, 'pasien_id')->dropDownList($dataList);?>



            <?= $form->field($model, 'tgl_pelayanan')->input('date') ?>

            <?= $form->field($model, 'anamnesis')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'tindakan_uji_fungsi')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'diagnosis_medis')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'diagnosis_fungsi')->textarea(['rows' => 6]) ?>

        </div>
        
        <div class="col-md-6">
            <?= $form->field($model, 'pemeriksaan_penunjang')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'tata_laksana_kfr')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'anjuran')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'evaluasi')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'suspek_akibat_kerja')->radioList([ 'Ya' => 'Ya', 'Tidak' => 'Tidak', ]) ?>

            <?= $form->field($model, 'permintaan_terapi')->textarea(['rows' => 6]) ?>

        </div>
    </div>


    <div class="rows">
    <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i> Program</h4></div>
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 8, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelsProgram[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'program',
                    'tgl_program',
                ],
            ]); ?>

            <div class="container-items"><!-- widgetContainer -->
            <?php foreach ($modelsProgram as $i => $modelProgram): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Program</h3>
                        <div class="pull-right">
                            <button type="button" class="add-item btn btn-success btn-xs">+<i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item btn btn-danger btn-xs">-<i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelProgram->isNewRecord) {
                                echo Html::activeHiddenInput($modelProgram, "[{$i}]id");
                            }
                        ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($modelProgram, "[{$i}]program")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelProgram, "[{$i}]tgl_program")->input('date') ?>
                            </div>
                        </div><!-- .row -->
    
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
