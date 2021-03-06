<?php

/**
 * SymfonyPlugin form base class.
 *
 * @method SymfonyPlugin getObject() Returns the current form's model object
 *
 * @package    plugintracker
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24051 2009-11-16 21:08:08Z Kris.Wallsmith $
 */
abstract class BaseSymfonyPluginForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'title'             => new sfWidgetFormInputText(),
      'description'       => new sfWidgetFormTextarea(),
      'symfony_developer' => new sfWidgetFormInputText(),
      'category_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Category'), 'add_empty' => true)),
      'active'            => new sfWidgetFormInputCheckbox(),
      'repository'        => new sfWidgetFormInputText(),
      'image'             => new sfWidgetFormInputText(),
      'homepage'          => new sfWidgetFormInputText(),
      'ticketing'         => new sfWidgetFormInputText(),
      'featured'          => new sfWidgetFormInputCheckbox(),
      'symplist_index'    => new sfWidgetFormInputText(),
      'slug'              => new sfWidgetFormInputText(),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
      'tags_list'         => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Tag')),
      'authors_list'      => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardUser')),
      'raters_list'       => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardUser')),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'title'             => new sfValidatorString(array('max_length' => 255)),
      'description'       => new sfValidatorString(array('required' => false)),
      'symfony_developer' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'category_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Category'), 'required' => false)),
      'active'            => new sfValidatorBoolean(array('required' => false)),
      'repository'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'image'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'homepage'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'ticketing'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'featured'          => new sfValidatorBoolean(array('required' => false)),
      'symplist_index'    => new sfValidatorNumber(array('required' => false)),
      'slug'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'        => new sfValidatorDateTime(),
      'updated_at'        => new sfValidatorDateTime(),
      'tags_list'         => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Tag', 'required' => false)),
      'authors_list'      => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardUser', 'required' => false)),
      'raters_list'       => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardUser', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'SymfonyPlugin', 'column' => array('title'))),
        new sfValidatorDoctrineUnique(array('model' => 'SymfonyPlugin', 'column' => array('slug'))),
      ))
    );

    $this->widgetSchema->setNameFormat('symfony_plugin[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SymfonyPlugin';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['tags_list']))
    {
      $this->setDefault('tags_list', $this->object->Tags->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['authors_list']))
    {
      $this->setDefault('authors_list', $this->object->Authors->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['raters_list']))
    {
      $this->setDefault('raters_list', $this->object->Raters->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveTagsList($con);
    $this->saveAuthorsList($con);
    $this->saveRatersList($con);

    parent::doSave($con);
  }

  public function saveTagsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['tags_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Tags->getPrimaryKeys();
    $values = $this->getValue('tags_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Tags', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Tags', array_values($link));
    }
  }

  public function saveAuthorsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['authors_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Authors->getPrimaryKeys();
    $values = $this->getValue('authors_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Authors', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Authors', array_values($link));
    }
  }

  public function saveRatersList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['raters_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Raters->getPrimaryKeys();
    $values = $this->getValue('raters_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Raters', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Raters', array_values($link));
    }
  }

}
