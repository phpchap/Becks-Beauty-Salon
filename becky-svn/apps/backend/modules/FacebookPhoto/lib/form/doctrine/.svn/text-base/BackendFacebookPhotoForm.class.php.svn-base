<?php

/**
 * FacebookPhoto form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BackendFacebookPhotoForm extends BaseFacebookPhotoForm
{
  public function configure()
  {
	
    $this->setWidgets(array(
      'name'               => new sfWidgetFormTextarea(),
      'live_in_photos'     => new sfWidgetFormInputCheckbox(),
      'live_on_homepage'   => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'name'               => new sfValidatorString(array('required' => false)),
      'live_in_photos'     => new sfValidatorBoolean(array('required' => false)),
      'live_on_homepage'   => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('facebook_photo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
	
  }
}
