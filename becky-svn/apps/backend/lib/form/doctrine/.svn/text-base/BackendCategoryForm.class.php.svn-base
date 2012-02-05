<?php
/**
 * BackendCategoryForm form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BackendCategoryForm extends BaseCategoryForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'name'               => new sfWidgetFormInputText(),
      'display_order'      => new sfWidgetFormInputText(),
      'extra_info'         => new sfWidgetFormTextarea(),
      'treatment_group_id' => new sfWidgetFormSelect(array('choices' => Doctrine_Core::getTable('TreatmentGroup')->getTreatmentGroups())),			

    ));

    $this->setValidators(array(
      'name'               => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'display_order'      => new sfValidatorInteger(array('required' => false)),
      'extra_info'         => new sfValidatorPass(array('required' => false)),
      'treatment_group_id' => new sfValidatorInteger(array('required' => false))
    ));

    $this->widgetSchema->setNameFormat('category[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
	
  }
}