<?php
/**
 * Link         :   http://www.phpcorner.net
 * User         :   qingbing<780042175@qq.com>
 * Date         :   2019-03-12
 * Version      :   1.0
 */

namespace Tools;


use Abstracts\FormOption;
use Helper\Coding;
use Helper\Exception;

class FormSetting extends FormOption
{
    /**
     * 返回cacheKey
     * @param string $key
     * @return string
     */
    protected static function cacheKey($key)
    {
        return 'pf.form.options.model.' . $key;
    }

    /**
     * @param string $key
     * @return mixed|FormSetting
     * @throws Exception
     */
    public static function cache($key)
    {
        $cacheKey = self::cacheKey($key);
        if (null === ($setting = \PF::app()->getCache()->get($cacheKey))) {
            $setting = new self($key);
            \PF::app()->getCache()->set($cacheKey, $setting);
        }
        return $setting;
    }

    /* @var array 表单类型信息 */
    protected $category;

    /**
     * 析构函数后被调用
     * @throws \Exception
     */
    public function init()
    {
        $this->category = $category = $this->getCategory();
        if (!$category) {
            throw new Exception("不存在的表单分类");
        }
        if ($category['is_setting']) {
            $setting = $this->getSetting();
            if ($setting) {
                $attributes = Coding::json_decode($setting['content']);
                if (is_array($attributes)) {
                    $this->setAttributes($attributes);
                }
            }
        }
    }

    /**
     * 获取 component-db
     * @return \Components\Db|null
     * @throws \Helper\Exception
     */
    protected function db()
    {
        return \PF::app()->getDb();
    }

    /**
     * 获取表单配置分类
     * @return array
     * @throws \Exception
     */
    protected function getCategory()
    {
        return $this->db()->getFindBuilder()
            ->setTable('pub_form_category')
            ->setWhere('`key`=:key')
            ->addParam(':key', $this->getScenario())
            ->queryRow();
    }

    /**
     * 获取设置信息
     * @return array
     * @throws \Exception
     */
    protected function getSetting()
    {
        return $this->db()->getFindBuilder()
            ->setTable('pub_form_setting')
            ->setWhere('`key`=:key')
            ->addParam(':key', $this->getScenario())
            ->queryRow();
    }

    /**
     * 定义的表单项目
     * @return mixed
     * @throws \Exception
     */
    public function getOptions()
    {
        return $this->db()->getFindBuilder()
            ->setTable('pub_form_option')
            ->setWhere('`key`=:key AND `is_enable`=:is_enable')
            ->addParam(':key', $this->getScenario())
            ->addParam(':is_enable', 1)
            ->setOrder('`sort_order` ASC, `id` ASC')
            ->queryAll();
    }
}