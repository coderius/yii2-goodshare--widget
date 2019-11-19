<?php
/**
 * @copyright Copyright (c) 2013-2019 Sergio Coderius!
 * @link https://coderius.biz.ua
 * @license This program is free software: the MIT License (MIT)
 */
namespace coderius\goodshare;

use yii\web\AssetBundle;

/**
 * GoodShareAsset
 *
 * @author Sergio Coderius <sunrise4fun@gmail.com>
 */
class GoodShareAsset extends AssetBundle
{
    public $sourcePath = '@npm/goodshare.js';

    public $css = [];

    public $js = [
        'goodshare.min.js'
    ];

}
