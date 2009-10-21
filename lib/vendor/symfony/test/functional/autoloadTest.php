<?php

/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

$app = 'frontend';
if (!include(dirname(__FILE__).'/../bootstrap/functional.php'))
{
  return;
}

$b = new sfTestBrowser();

$b->
  get('/autoload/myAutoload')->
  isStatusCode(200)->
  isRequestParameter('module', 'autoload')->
  isRequestParameter('action', 'myAutoload')->
  checkResponseElement('body div', 'foo')
;

$t = $b->test();

$autoload = sfAutoload::getInstance();
$t->is($autoload->getClassPath('sfpropel'), str_replace(DIRECTORY_SEPARATOR, '/', sfConfig::get('sf_symfony_lib_dir')).'/plugins/sfPropelPlugin/lib/addon/sfPropel.class.php', '"sfAutoload" is case insensitive');

$t->ok(class_exists('BaseExtendMe'), 'plugin lib directory added to autoload');
$r = new ReflectionClass('ExtendMe');
$t->like($r->getFilename(), '~fixtures/lib/ExtendMe~', 'plugin class can be replaced by project');
$t->ok(class_exists('NotInLib'), 'plugin autoload sets class paths');
$t->ok(!class_exists('ExcludedFromAutoload'), 'plugin autoload excludes directories');