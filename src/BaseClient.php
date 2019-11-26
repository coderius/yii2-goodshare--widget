<?php

namespace coderius\goodshare;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\di\Instance;
use yii\helpers\Inflector;
use yii\helpers\StringHelper;


abstract class BaseClient extends Component
{
    private $_title;
    
}
