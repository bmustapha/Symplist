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
             'length' => '255',
             ));
        $this->hasColumn('description', 'clob', null, array(
             'type' => 'clob',
             ));
        $this->hasColumn('user_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => '4',
             ));
        $this->hasColumn('category_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('active', 'boolean', null, array(
             'type' => 'boolean',
             ));
        $this->hasColumn('repository_url', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
    }

    public function setUp()
    {
        $this->hasOne('sfGuardUser as User', array(
             'local' => 'user_id',
             'foreign' => 'id'));

        $this->hasOne('PluginCategory as Category', array(
             'local' => 'category_id',
             'foreign' => 'id'));

        $sluggable0 = new Doctrine_Template_Sluggable();
        $timestampable0 = new Doctrine_Template_Timestampable();
        $sflucenedoctrinetemplate0 = new sfLuceneDoctrineTemplate();
        $commentable0 = new Doctrine_Template_Commentable(array(
             ));
        $this->actAs($sluggable0);
        $this->actAs($timestampable0);
        $this->actAs($sflucenedoctrinetemplate0);
        $this->actAs($commentable0);
    }
}