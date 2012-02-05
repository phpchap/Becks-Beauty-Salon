<?php

/**
 * FacebookPhoto form base class.
 *
 * @method FacebookPhoto getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseFacebookPhotoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'app_album_id'       => new sfWidgetFormInputText(),
      'fb_id'              => new sfWidgetFormTextarea(),
      'fb_album_id'        => new sfWidgetFormTextarea(),
      'name'               => new sfWidgetFormTextarea(),
      'picture'            => new sfWidgetFormTextarea(),
      'source'             => new sfWidgetFormTextarea(),
      'height'             => new sfWidgetFormTextarea(),
      'width'              => new sfWidgetFormTextarea(),
      'image_one_height'   => new sfWidgetFormTextarea(),
      'image_one_width'    => new sfWidgetFormTextarea(),
      'image_one_source'   => new sfWidgetFormTextarea(),
      'image_two_height'   => new sfWidgetFormTextarea(),
      'image_two_width'    => new sfWidgetFormTextarea(),
      'image_two_source'   => new sfWidgetFormTextarea(),
      'image_three_height' => new sfWidgetFormTextarea(),
      'image_three_width'  => new sfWidgetFormTextarea(),
      'image_three_source' => new sfWidgetFormTextarea(),
      'image_four_height'  => new sfWidgetFormTextarea(),
      'image_four_width'   => new sfWidgetFormTextarea(),
      'image_four_source'  => new sfWidgetFormTextarea(),
      'link'               => new sfWidgetFormTextarea(),
      'icon'               => new sfWidgetFormTextarea(),
      'fb_created_time'    => new sfWidgetFormTextarea(),
      'fb_updated_time'    => new sfWidgetFormTextarea(),
      'position'           => new sfWidgetFormInputText(),
      'comments'           => new sfWidgetFormInputText(),
      'live_in_photos'     => new sfWidgetFormInputCheckbox(),
      'live_on_homepage'   => new sfWidgetFormInputCheckbox(),
      'created_at'         => new sfWidgetFormDateTime(),
      'updated_at'         => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'app_album_id'       => new sfValidatorInteger(array('required' => false)),
      'fb_id'              => new sfValidatorString(array('required' => false)),
      'fb_album_id'        => new sfValidatorString(array('required' => false)),
      'name'               => new sfValidatorString(array('required' => false)),
      'picture'            => new sfValidatorString(array('required' => false)),
      'source'             => new sfValidatorString(array('required' => false)),
      'height'             => new sfValidatorString(array('required' => false)),
      'width'              => new sfValidatorString(array('required' => false)),
      'image_one_height'   => new sfValidatorString(array('required' => false)),
      'image_one_width'    => new sfValidatorString(array('required' => false)),
      'image_one_source'   => new sfValidatorString(array('required' => false)),
      'image_two_height'   => new sfValidatorString(array('required' => false)),
      'image_two_width'    => new sfValidatorString(array('required' => false)),
      'image_two_source'   => new sfValidatorString(array('required' => false)),
      'image_three_height' => new sfValidatorString(array('required' => false)),
      'image_three_width'  => new sfValidatorString(array('required' => false)),
      'image_three_source' => new sfValidatorString(array('required' => false)),
      'image_four_height'  => new sfValidatorString(array('required' => false)),
      'image_four_width'   => new sfValidatorString(array('required' => false)),
      'image_four_source'  => new sfValidatorString(array('required' => false)),
      'link'               => new sfValidatorString(array('required' => false)),
      'icon'               => new sfValidatorString(array('required' => false)),
      'fb_created_time'    => new sfValidatorString(array('required' => false)),
      'fb_updated_time'    => new sfValidatorString(array('required' => false)),
      'position'           => new sfValidatorInteger(array('required' => false)),
      'comments'           => new sfValidatorPass(array('required' => false)),
      'live_in_photos'     => new sfValidatorBoolean(array('required' => false)),
      'live_on_homepage'   => new sfValidatorBoolean(array('required' => false)),
      'created_at'         => new sfValidatorDateTime(),
      'updated_at'         => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('facebook_photo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'FacebookPhoto';
  }

}
