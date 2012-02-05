<?php

/**
 * Photo form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PhotoForm extends BasePhotoForm
{
  public function configure()
  {
	$this->disableCSRFProtection();		
	
	$live_ar = array('0' => 'No',
				   	 '1' => 'Yes');		
	
    $this->setWidgets(array(
      'id'   => new sfWidgetFormInputHidden(),
      'name' => new sfWidgetFormTextarea(),
	  'image' => new sfWidgetFormInputFile(),
      'title' => new sfWidgetFormInputText(),	
      'live'   => new sfWidgetFormSelect(array('choices' => $live_ar)),
    ));

    $this->setValidators(array(
      'id'   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name' => new sfValidatorString(array('required' => false)),
      'image' => new sfValidatorFile(array(
        	'required'   => false,
        	'path'       => sfConfig::get('sf_upload_dir'),
        	'mime_types' => 'web_images')),
      'title' => new sfValidatorString(array('required' => true)),
      'live'   => new sfValidatorInteger(array('required' => false)),
    ));

	// set the field labels
	$this->widgetSchema->setLabels(array(
	  'name'    => 'Photo',
	  'image'    => 'Image',	
	  'title' => 'Title',
	  'live' => 'Live?'));

  }
}
