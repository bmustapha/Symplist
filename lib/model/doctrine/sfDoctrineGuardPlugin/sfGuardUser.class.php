<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class sfGuardUser extends PluginsfGuardUser
{
  public function getRoute()
  {
    return '@author?username='.$this['username'];
  }

}