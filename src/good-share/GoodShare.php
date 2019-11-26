<?php
/**
 * @copyright Copyright (c) 2013-2019 Sergio Coderius!
 * @link https://coderius.biz.ua
 * @license This program is free software: the MIT License (MIT)
 */

namespace coderius\goodshare;

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
class GoodShare extends Widget
{
    /**
     * @var array the HTML attributes (name-value pairs) for the wrap tag.
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $options = [];

    /**
     * @var string the default item class name when calling [[item()]] to create a new item.
     * @see itemConfig
     */
    public $itemClass = 'coderius\goodshare\GoodShareItem';
    
    /**
     * @var array|\Closure the default configuration used by [[item()]] when creating a new item object.
     * This can be either a configuration array or an anonymous function returning a configuration array.
     *
     * The value of this property will be merged recursively with the `$options` parameter passed to [[item()]].
     */
    public $itemConfig = [];

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

    /**
     * Generates a social item.
     * @param string $name 
     * about attribute expression.
     * @param array $options the additional configurations for the item object. These are properties of [[GoodShareItem]]
     * or a subclass, depending on the value of [[itemClass]].
     * @return GoodShareItem the created GoodShareItem object.
     * @see itemConfig
     */
    public function item($name, $options = [])
    {
        $config = $this->itemConfig;
        if ($config instanceof \Closure) {
            $config = call_user_func($config, $name);
        }
        if (!isset($config['class'])) {
            $config['class'] = $this->itemClass;
        }

        return Yii::createObject(ArrayHelper::merge($config, $options, [
            'name' => $name,
            'wrapper' => $this,
        ]));
    }

    
}
