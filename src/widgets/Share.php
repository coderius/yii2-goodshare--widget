<?php
/**
 * @copyright Copyright (c) 2013-2019 Sergio Coderius!
 * @link https://coderius.biz.ua
 * @license This program is free software: the MIT License (MIT)
 */

namespace coderius\goodshare\widgets;

use Yii;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\base\Widget;
use yii\web\View;
use yii\web\JsExpression;
use yii\helpers\ArrayHelper;
use yii\base\InvalidArgumentException;

/**
 * GoodShare renders a wrapper for social share links.
 * 
 * @author Sergio Coderius <sunrise4fun@gmail.com>
 */
class Share extends Widget
{
    /**
     * @var array the HTML attributes (name-value pairs) for the wrap tag.
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $options = [];

    /**
     * Initializes widget.
     * This method will initialize required property values.
     * @return void
     */
    public function init()
    {
        parent::init();

        //code
    }

    /**
     * Runs the widget.
     */
    public function run()
    {
        
    }


    
}