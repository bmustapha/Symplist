<?php

/**
 * AudioAttachment filter form base class.
 *
 * @package    plugintracker
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedInheritanceTemplate.php 24051 2009-11-16 21:08:08Z Kris.Wallsmith $
 */
abstract class BaseAudioAttachmentFormFilter extends AttachmentFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('audio_attachment_filters[%s]');
  }

  public function getModelName()
  {
    return 'AudioAttachment';
  }
}
