<?php
/**
 * @copyright Copyright (c) 2013-2019 Sergio Coderius!
 * @link https://coderius.biz.ua
 * @license This program is free software: the MIT License (MIT)
 */

namespace coderius\goodshare\widgets;

use yii\web\AssetBundle;

/**
 * ShareAsset is an asset bundle for [[Share]] widget.
 * 
 * @author Sergio Coderius <sunrise4fun@gmail.com>
 */
class ShareAsset extends AssetBundle
{
    public $sourcePath = 'coderius/goodshare/assets';
    public $js = [
        'popup.js',
    ];
}