<?php

/**
 * SpecialOffer form base class.
 *
 * @method SpecialOffer getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSpecialOfferForm extends BaseFormDoctrine
{
  public function setup()
  {
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
      'description_one'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'description_two'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'description_three' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'display_order'     => new sfValidatorInteger(array('required' => false)),
      'front_page'        => new sfValidatorBoolean(array('required' => false)),
      'live'              => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('special_offer[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SpecialOffer';
  }

}
