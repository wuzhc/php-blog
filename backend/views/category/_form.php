<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\service\CategoryService;

/* @var $this yii\web\View */
/* @var $model common\models\Categories */
/* @var $form yii\widgets\ActiveForm */

$categories = CategoryService::factory()->getCategoriesMap();
$categories[0] = '顶级大类';

?>
<div class="categories-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'parent')->dropDownList($categories)->label('所属分类');?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true])->label('名称') ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true])->label('自定义链接') ?>

    <?= $form->field($model, 'model_id')->dropDownList(CategoryService::factory()->getModels())->label('模型')?>

    <?= $form->field($model, 'sort')->textInput(['value' => 0])->label('排序') ?>

    <?= $form->field($model, 'status')->radioList(['0' => '已审核', '1' => '未审核'])->label('状态')?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
