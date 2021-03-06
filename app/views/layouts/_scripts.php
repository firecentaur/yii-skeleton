<?php
/**
 * @var $this YdWebController
 *
 * @author Brett O'Donnell <cornernote@gmail.com>
 * @author Zain Ul abidin <zainengineer@gmail.com>
 * @copyright 2013 Mr PHP
 * @link https://github.com/cornernote/yii-skeleton
 * @license http://www.gnu.org/copyleft/gpl.html
 */

// application stylesheet
cs()->registerCSSFile(au() . '/css/app.css');

// application stylesheet
cs()->registerCSSFile(au() . '/js/app.js');

// load here so modals don't have to load it
cs()->registerCoreScript('yiiactiveform');

// modal for popups
$this->widget('dressing.widgets.YdModal');

// qtip for tooltips
$this->widget('dressing.widgets.YdQTip');

// google analytics
//$this->renderPartial('/layouts/_google_analytics');

// theme scripts
$this->renderPartial('/layouts/_theme_scripts');