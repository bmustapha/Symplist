<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
abstract class BaseSymfonyPlugin extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('symfony_plugin');
        $this->hasColumn('title', 'string', 255, array(
             'type' => 'string',
             'unique' => true,
             'notnull' => true,
             'length' => '255',
             ));
        $this->hasColumn('description', 'clob', null, array(
             'type' => 'clob',
             ));
        $this->hasColumn('user_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => '4',
             ));
        $this->hasColumn('symfony_developer', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('category_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('active', 'boolean', null, array(
             'type' => 'boolean',
             ));
        $this->hasColumn('repository', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('image', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('homepage', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('ticketing', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
    }

    public function setUp()
    {
        $this->hasOne('sfGuardUser as User', array(
             'local' => 'user_id',
             'foreign' => 'id'));

        $this->hasMany('sfGuardUser as Raters', array(
             'refClass' => 'PluginRating',
             'local' => 'symfony_plugin_id',
             'foreign' => 'sf_guard_user_id'));

        $this->hasOne('PluginCategory as Category', array(
             'local' => 'category_id',
             'foreign' => 'id'));

        $this->hasMany('PluginRating as Ratings', array(
             'local' => 'id',
             'foreign' => 'symfony_plugin_id'));

        $this->hasMany('PluginRelease as Releases', array(
             'local' => 'id',
             'foreign' => 'plugin_id'));

        $sluggable0 = new Doctrine_Template_Sluggable();
        $timestampable0 = new Doctrine_Template_Timestampable();
        $mylucenedoctrinetemplate0 = new myLuceneDoctrineTemplate();
        $commentable0 = new Doctrine_Template_Commentable(array(
             ));
        $this->actAs($sluggable0);
        $this->actAs($timestampable0);
        $this->actAs($mylucenedoctrinetemplate0);
        $this->actAs($commentable0);
    }
}