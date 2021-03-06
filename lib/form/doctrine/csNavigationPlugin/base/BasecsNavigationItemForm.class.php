<?php

/**
 * csNavigationItem form base class.
 *
 * @method csNavigationItem getObject() Returns the current form's model object
 *
 * @package    plugintracker
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24051 2009-11-16 21:08:08Z Kris.Wallsmith $
 */
abstract class BasecsNavigationItemForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'name'      => new sfWidgetFormInputText(),
      'route'     => new sfWidgetFormInputText(),
      'protected' => new sfWidgetFormInputCheckbox(),
      'locked'    => new sfWidgetFormInputCheckbox(),
      'root_id'   => new sfWidgetFormInputText(),
      'lft'       => new sfWidgetFormInputText(),
      'rgt'       => new sfWidgetFormInputText(),
      'level'     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'name'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'route'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'protected' => new sfValidatorBoolean(array('required' => false)),
      'locked'    => new sfValidatorBoolean(array('required' => false)),
      'root_id'   => new sfValidatorInteger(array('required' => false)),
      'lft'       => new sfValidatorInteger(array('required' => false)),
      'rgt'       => new sfValidatorInteger(array('required' => false)),
      'level'     => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cs_navigation_item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'csNavigationItem';
  }

}
