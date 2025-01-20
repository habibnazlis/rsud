<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Register';
?>

<h1><?= Html::encode($this->title) ?></h1>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'password_hash')->passwordInput(['maxlength' => true]) ?>

<div class="form-group">
    <?= Html::submitButton('Register', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>
