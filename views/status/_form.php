<?php
 
use yii\helpers\Html;
use yii\widgets\ActiveForm;
 
use app\assets\StatusAsset;
StatusAsset::register($this);
 
/* @var $this yii\web\View */
/* @var $model app\models\Status */
/* @var $form yii\widgets\ActiveForm */
?>
 
<div class="status-form">
    <?php $form = ActiveForm::begin(); ?>
     
    <div class="row">
      <div class="col-md-8">
      <?= $form->field($model, 'message')->textarea(['rows' => 6]) ?>
      </div>
      <div class="col-md-4">
      <p>Remaining: <span id="counter2">0</span></p>
      </div>
    </div>

    <?=
    $form->field($model, 'permissions')->dropDownList($model->getPermissions(), 
             ['prompt'=>'- Choose Your Permissions -']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
