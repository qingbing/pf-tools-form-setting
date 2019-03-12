<?php
// 申明命名空间
namespace Controllers;
// 引用类
use Html;

/**
 * Created by generate tool of phpcorner.
 * Link         :   http://www.phpcorner.net/
 * User         :   qingbing
 * Date         :   2019-03-12
 * Version      :   1.0
 *
 * @var \Render\Abstracts\Controller $this
 * @var \Tools\FormSetting $model
 */
echo Html::beginForm('', 'post', [
//    'id' => 'ajaxForm',
//    'data-callback' => 'PL.saveModalCallback',
//    'data-modal-reload' => 'true',
    'class' => 'w-validate',
    'enctype' => 'multipart/form-data',
]);
// 填写表单
$this->widget('\Widgets\FormGenerator', [
    'model' => $model,
]);
?>
    <dl class="form-group row">
        <dd class="col-sm-6 col-md-6 col-lg-6 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">
            <button type="submit" class="btn btn-primary" id="submitBtn"><i class="fa fa-save">保存</i></button>
        </dd>
    </dl>
    <?php echo Html::endForm(); ?>