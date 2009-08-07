<?php
// auto-generated by sfViewConfigHandler
// date: 2009/08/07 11:42:42
$response = $this->context->getResponse();


  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());



  if (!is_null($layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout')))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (is_null($this->getDecoratorTemplate()) && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layout' ? false : 'layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);

  $response->addStylesheet('reset.css', '', array ());
  $response->addStylesheet('text.css', '', array ());
  $response->addStylesheet('960.css', '', array ());
  $response->addStylesheet('backend.css', '', array ());
  $response->addStylesheet('jquery-ui/themes/cupertino/ui.all.css', '', array ());
  $response->addJavascript('http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js', '', array ());
  $response->addJavascript('http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/jquery-ui.min.js', '', array ());
  $response->addJavascript('backend.js', '', array ());


