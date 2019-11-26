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
use yii\base\Component;
use yii\base\ErrorHandler;

/**
 * GoodShareItem renders a social share link.
 * 
 * @author Sergio Coderius <sunrise4fun@gmail.com>
 */

class GoodShareItem extends Component
{
    /**
     * Social provider name
     *
     * @var string
     */
    public $name;

    /**
     * @var GoodShare the wrapper that this item is associated with.
     */
    public $wrapper;

    /**
     * @var string the template that is used to arrange the button.
     * The following tokens will be replaced when [[render()]] is called: `{button}`.
     */
    public $template = "{button}\n";

    /**
     * @var array different parts of the item (e.g. input, label). This will be used together with
     * [[template]] to generate the final item HTML code. The keys are the token names in [[template]],
     * while the values are the corresponding HTML code. Valid tokens include `{button}`.
     * Note that you normally don't need to access this property directly as
     * it is maintained by various methods of this class.
     */
    public $parts = [];

    /**
     * Undocumented variable
     *
     * @var array
     */
    public $buttonOptions = ['class' => ''];

    /**
     * PHP magic method that returns the string representation of this object.
     * @return string the string representation of this object.
     */
    public function __toString()
    {
        // __toString cannot throw exception
        // use trigger_error to bypass this limitation
        try {
            return $this->render();
        } catch (\Exception $e) {
            ErrorHandler::convertExceptionToError($e);
            return '';
        } catch (\Throwable $e) {
            ErrorHandler::convertExceptionToError($e);
            return '';
        }
    }

    /**
     * Renders the whole item.
     * This method will generate the button tag (if any), and
     * assemble them into HTML according to [[template]].
     * @param string|callable $content the content within the item container.
     * If `null` (not set), the default methods will be called to generate the button tag,
     * and use them as the content.
     * If a callable, it will be called to generate the content. The signature of the callable should be:
     *
     * ```php
     * function ($item) {
     *     return $html;
     * }
     * ```
     *
     * @return string the rendering result.
     */
    public function render($content = null)
    {
        if ($content === null) {
            if (!isset($this->parts['{button}'])) {
                $this->button();
            }
            $content = strtr($this->template, $this->parts);
        } elseif (!is_string($content)) {
            $content = call_user_func($content, $this);
        }

        return $this->begin() . "\n" . $content . "\n" . $this->end();
    }

    /**
     * Renders the opening tag of the item container.
     * @return string the rendering result.
     */
    public function begin()
    {
        $inputID = $this->getInputId();
        $attribute = Html::getAttributeName($this->attribute);
        $options = $this->options;
        $class = isset($options['class']) ? (array) $options['class'] : [];
        $class[] = "field-$inputID";
        
        $options['class'] = implode(' ', $class);
        if ($this->form->validationStateOn === ActiveForm::VALIDATION_STATE_ON_CONTAINER) {
            $this->addErrorClassIfNeeded($options);
        }
        $tag = ArrayHelper::remove($options, 'tag', 'div');

        return Html::beginTag($tag, $options);
    }

    /**
     * Renders the closing tag of the field container.
     * @return string the rendering result.
     */
    public function end()
    {
        return Html::endTag(ArrayHelper::keyExists('tag', $this->options) ? $this->options['tag'] : 'div');
    }

    /**
     * Renders a button.
     * 
     * @param array $options the tag options in terms of name-value pairs. These will be rendered as
     * the attributes of the resulting tag. The values will be HTML-encoded using [[Html::encode()]].
     *
     * @return $this the field object itself.
     */
    public function button($options = [], $content = 'Button')
    {
        $options = array_merge($this->buttonOptions, $options);
        $content = ucfirst($this->name);
        $this->addDataSocialAttributes($options);
        $this->parts['{button}'] = Html::button($content, $options = []);

        return $this;
    }

    /**
     * Adds social attributes to the input options.
     * @param $options array input options
     * @since 2.0.11
     */
    protected function addDataSocialAttributes(&$options)
    {
        $options['data-social'] = $this->name;
    }

}    