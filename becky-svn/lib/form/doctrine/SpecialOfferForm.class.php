<?php

/**
 * SpecialOffer form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SpecialOfferForm extends BaseSpecialOfferForm
{
/*	
  public function configure()
  {
	$this->disableCSRFProtection();			
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'description_one'   => new sfWidgetFormInputText(),
      'description_two'   => new sfWidgetFormInputText(),
      'description_three' => new sfWidgetFormInputText(),
      'display_order'     => new sfWidgetFormInputText(),
      'front_page'        => new sfWidgetFormInputCheckbox(),
      'live'              => new sfWidgetFormInputCheckbox(),

    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'description_one'   => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'description_two'   => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'description_three' => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'display_order'     => new sfValidatorInteger(array('required' => false)),
      'front_page'        => new sfValidatorBoolean(array('required' => false)),
      'live'              => new sfValidatorBoolean(array('required' => false)),

    ));	
  }
*/
}
