<?php
/**
 * Link         :   http://www.phpcorner.net
 * User         :   qingbing<780042175@qq.com>
 * Date         :   2019-03-12
 * Version      :   1.0
 */

namespace Controllers;


use Render\Abstracts\Controller;
use Tools\FormSetting;

class SiteController extends Controller
{
    public function actionIndex()
    {
        $this->render('index', []);
    }

    public function actionError()
    {
        var_dump(\PF::app()->getErrorHandler()->getError());
    }

    public function actionSetting()
    {
        // 获取配置组件
        $model = FormSetting::cache('mail_config');
        // 获取所有配置的值
        var_dump($model->getAttributes());
        // 获取所有某个配置的值
        var_dump($model->smtp_port);
    }

    public function actionOption()
    {
        // 获取选项组件
        $model = FormSetting::cache('mail_config');
        // 渲染组件
        $this->render('options', [
            'model' => $model,
        ]);
    }
}