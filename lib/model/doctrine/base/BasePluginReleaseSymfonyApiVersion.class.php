<?php

/**
 * BasePluginReleaseSymfonyApiVersion
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $release_id
 * @property integer $api_version_id
 * @property PluginRelease $Release
 * @property SymfonyApiVersion $ApiVersion
 * 
 * @method integer                        getReleaseId()      Returns the current record's "release_id" value
 * @method integer                        getApiVersionId()   Returns the current record's "api_version_id" value
 * @method PluginRelease                  getRelease()        Returns the current record's "Release" value
 * @method SymfonyApiVersion              getApiVersion()     Returns the current record's "ApiVersion" value
 * @method PluginReleaseSymfonyApiVersion setReleaseId()      Sets the current record's "release_id" value
 * @method PluginReleaseSymfonyApiVersion setApiVersionId()   Sets the current record's "api_version_id" value
 * @method PluginReleaseSymfonyApiVersion setRelease()        Sets the current record's "Release" value
 * @method PluginReleaseSymfonyApiVersion setApiVersion()     Sets the current record's "ApiVersion" value
 * 
 * @package    plugintracker
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePluginReleaseSymfonyApiVersion extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('plugin_release_symfony_api_version');
        $this->hasColumn('release_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('api_version_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('PluginRelease as Release', array(
             'local' => 'release_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('SymfonyApiVersion as ApiVersion', array(
             'local' => 'api_version_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}