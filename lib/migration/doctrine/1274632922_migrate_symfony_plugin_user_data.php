<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class migrateSymfonyPluginUserDataMigration extends Doctrine_Migration_Base
{
  public function preUp()
  {
    include_once(dirname(__FILE__).'/../model/1274632920_SymfonyPlugin.php');

    // Fix Data
    $plugins =  Doctrine::getTable('Migration_1274632920_SymfonyPlugin')->findAll();

    foreach ($plugins as $plugin) 
    {
      if ($plugin['user_id']) 
      {
        $pluginAuthor = new SymfonyPluginAuthor();
        $pluginAuthor['author_id'] = $plugin['user_id'];
        $pluginAuthor['plugin_id'] = $plugin['id'];
        $pluginAuthor->save();
      }
    }
  }

  public function up()
  {   
    $this->removeColumn('symfony_plugin', 'user_id'); 
  }
  
  public function down()
  {
    $this->addColumn('symfony_plugin', 'user_id', 'integer', '4', array());
  }
  
  public function postDown()
  {
    include_once(dirname(__FILE__).'/../model/1274632920_SymfonyPlugin.php');

    // Fix Data
    $plugins =  Doctrine::getTable('Migration_1274632920_SymfonyPlugin')->findAll();

    foreach ($plugins as $plugin) 
    {
      if ($plugin['Authors']->count()) 
      {
        $author = $plugin['Authors']->getFirst();
        $plugin['user_id'] = $author['id'];
        $plugin->save();
      }
    }
  }
}