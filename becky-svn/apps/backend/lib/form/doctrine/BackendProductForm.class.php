<?php
/**
 * BackendCategoryForm form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BackendProductForm extends BaseProductForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'name'         => new sfWidgetFormInputText(),
      'price'        => new sfWidgetFormInputText(),
      'is_available' => new sfWidgetFormInputCheckbox(),
      'category_id'  => new sfWidgetFormSelect(array('choices' => Doctrine_Core::getTable('Category')->getCategories())),
      'extra_info'   => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'name'         => new sfValidatorPass(),
      'price'        => new sfValidatorNumber(array('required' => false)),
      'is_available' => new sfValidatorBoolean(array('required' => false)),
      'category_id'  => new sfValidatorInteger(array('required' => false)),
      'extra_info'   => new sfValidatorPass()
	));

    $this->widgetSchema->setNameFormat('product[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
	
  }
}