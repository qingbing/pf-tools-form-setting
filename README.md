# pf-tools-form-setting
## 描述
工具——表单收集或配置表单输出工具

## 注意事项
- 引用的主要小部件
    - qingbing/php-database
    - qingbing/php-form-generator
    - qingbing/php-file-cache
    - qingbing/php-application
    - qingbing/php-render

## 使用方法
### 1.若为项目配置，可以直接获取配置的值
```php
// 获取配置组件
$model = FormSetting::cache('mail_config');
// 获取所有配置的值
var_dump($model->getAttributes());
// 获取所有某个配置的值
var_dump($model->smtp_port);
```
### 2. 若为收集表单
```php
$this->widget('\Widgets\FormGenerator', [
    'model' => FormSetting::cache('mail_config'), // 获取收集选项，并赋值给FormGenerator
]);
```

## ====== 异常代码集合 ======

异常代码格式：1037 - XXX - XX （组件编号 - 文件编号 - 代码内异常）
```
 - 103700101 : 覆盖源必须为数组
```