<?php

/**
 * Testimonial form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TestimonialForm extends BaseTestimonialForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'statement'     => new sfWidgetFormTextarea(),
      'name'          => new sfWidgetFormInputText(),
      'display_order' => new sfWidgetFormInputText(),
      'live'          => new sfWidgetFormInputCheckbox(),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'statement'     => new sfValidatorPass(),
      'name'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'display_order' => new sfValidatorInteger(array('required' => false)),
      'live'          => new sfValidatorBoolean(array('required' => false)),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('testimonial[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);	
  }
}
