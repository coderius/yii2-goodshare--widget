<?php
/**
 * @copyright Copyright (c) 2013-2019 Sergio Coderius!
 * @link https://coderius.biz.ua
 * @license This program is free software: the MIT License (MIT)
 */

namespace tests;

use coderius\goodshare\widgets\Share;
use yii\web\View;
use yii\base\InvalidArgumentException;
use yii\web\JsExpression;
use Yii;

/**
 * GoodShareTest
 * 
 * @author Sergio Coderius <sunrise4fun@gmail.com>
 */
class ShareTest extends TestCase
{
    public function testRenderSimpleButtons()
    {
        $view = Yii::$app->getView();
        $content = $view->render('//widget-simple-buttons', []);
        $actual = $view->render('//layouts/main', ['content' => $content]);
        $expected = file_get_contents(__DIR__ . '/data/test-widget-simple-buttons.bin');
        $this->assertEqualsWithoutLE($expected, $actual);
    }
    
}    