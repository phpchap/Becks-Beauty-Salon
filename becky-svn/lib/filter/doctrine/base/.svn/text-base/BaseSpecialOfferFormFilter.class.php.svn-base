<?php

/**
 * SpecialOffer filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSpecialOfferFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'description_one'   => new sfWidgetFormFilterInput(),
      'description_two'   => new sfWidgetFormFilterInput(),
      'description_three' => new sfWidgetFormFilterInput(),
      'display_order'     => new sfWidgetFormFilterInput(),
      'front_page'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'live'              => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'description_one'   => new sfValidatorPass(array('required' => false)),
      'description_two'   => new sfValidatorPass(array('required' => false)),
      'description_three' => new sfValidatorPass(array('required' => false)),
      'display_order'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'front_page'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'live'              => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('special_offer_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SpecialOffer';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'description_one'   => 'Text',
      'description_two'   => 'Text',
      'description_three' => 'Text',
      'display_order'     => 'Number',
      'front_page'        => 'Boolean',
      'live'              => 'Boolean',
    );
  }
}
