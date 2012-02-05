<?php

/**
 * FacebookAlbum form base class.
 *
 * @method FacebookAlbum getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseFacebookAlbumForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'fb_id'           => new sfWidgetFormTextarea(),
      'name'            => new sfWidgetFormTextarea(),
      'link'            => new sfWidgetFormTextarea(),
      'cover_photo'     => new sfWidgetFormTextarea(),
      'photo_count'     => new sfWidgetFormTextarea(),
      'type'            => new sfWidgetFormTextarea(),
      'fb_created_time' => new sfWidgetFormTextarea(),
      'fb_updated_time' => new sfWidgetFormTextarea(),
      'num_comments'    => new sfWidgetFormTextarea(),
      'live_in_photos'  => new sfWidgetFormInputCheckbox(),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'fb_id'           => new sfValidatorString(array('required' => false)),
      'name'            => new sfValidatorString(array('required' => false)),
      'link'            => new sfValidatorString(array('required' => false)),
      'cover_photo'     => new sfValidatorString(array('required' => false)),
      'photo_count'     => new sfValidatorString(array('required' => false)),
      'type'            => new sfValidatorString(array('required' => false)),
      'fb_created_time' => new sfValidatorString(array('required' => false)),
      'fb_updated_time' => new sfValidatorString(array('required' => false)),
      'num_comments'    => new sfValidatorString(array('required' => false)),
      'live_in_photos'  => new sfValidatorBoolean(array('required' => false)),
      'created_at'      => new sfValidatorDateTime(),
      'updated_at'      => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('facebook_album[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'FacebookAlbum';
  }

}
