<?php
/**
 * Link         :   http://www.phpcorner.net
 * User         :   qingbing<780042175@qq.com>
 * Date         :   2018-12-05
 * Version      :   1.0
 */
return [
    'params' => [],// 用户自定义配置
    'preLoad' => [],
    'modules' => [
        'pf' => [],
        'admin' => [
            'modules' => [
                'good' => [],
            ],
        ],
    ],
    'components' => \Helper\CMap::mergeArray(
        [
            'database' => [
                'class' => '\Components\Db',
                'c-file' => 'database',
                'c-group' => 'master',
            ],
            'urlManager' => [
                'class' => '\Components\UrlManager',
                'c-file' => 'url-manager',
            ],
            'cache' => [
                'class' => '\Components\FileCache',
                'c-file' => 'file-cache',
            ],
        ],
        require('component-errorHandler.php')
    ),
];