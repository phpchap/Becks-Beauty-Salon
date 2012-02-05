<?php

/**
 * FacebookPhoto filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseFacebookPhotoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'app_album_id'       => new sfWidgetFormFilterInput(),
      'fb_id'              => new sfWidgetFormFilterInput(),
      'fb_album_id'        => new sfWidgetFormFilterInput(),
      'name'               => new sfWidgetFormFilterInput(),
      'picture'            => new sfWidgetFormFilterInput(),
      'source'             => new sfWidgetFormFilterInput(),
      'height'             => new sfWidgetFormFilterInput(),
      'width'              => new sfWidgetFormFilterInput(),
      'image_one_height'   => new sfWidgetFormFilterInput(),
      'image_one_width'    => new sfWidgetFormFilterInput(),
      'image_one_source'   => new sfWidgetFormFilterInput(),
      'image_two_height'   => new sfWidgetFormFilterInput(),
      'image_two_width'    => new sfWidgetFormFilterInput(),
      'image_two_source'   => new sfWidgetFormFilterInput(),
      'image_three_height' => new sfWidgetFormFilterInput(),
      'image_three_width'  => new sfWidgetFormFilterInput(),
      'image_three_source' => new sfWidgetFormFilterInput(),
      'image_four_height'  => new sfWidgetFormFilterInput(),
      'image_four_width'   => new sfWidgetFormFilterInput(),
      'image_four_source'  => new sfWidgetFormFilterInput(),
      'link'               => new sfWidgetFormFilterInput(),
      'icon'               => new sfWidgetFormFilterInput(),
      'fb_created_time'    => new sfWidgetFormFilterInput(),
      'fb_updated_time'    => new sfWidgetFormFilterInput(),
      'position'           => new sfWidgetFormFilterInput(),
      'comments'           => new sfWidgetFormFilterInput(),
      'live_in_photos'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'live_on_homepage'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'app_album_id'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fb_id'              => new sfValidatorPass(array('required' => false)),
      'fb_album_id'        => new sfValidatorPass(array('required' => false)),
      'name'               => new sfValidatorPass(array('required' => false)),
      'picture'            => new sfValidatorPass(array('required' => false)),
      'source'             => new sfValidatorPass(array('required' => false)),
      'height'             => new sfValidatorPass(array('required' => false)),
      'width'              => new sfValidatorPass(array('required' => false)),
      'image_one_height'   => new sfValidatorPass(array('required' => false)),
      'image_one_width'    => new sfValidatorPass(array('required' => false)),
      'image_one_source'   => new sfValidatorPass(array('required' => false)),
      'image_two_height'   => new sfValidatorPass(array('required' => false)),
      'image_two_width'    => new sfValidatorPass(array('required' => false)),
      'image_two_source'   => new sfValidatorPass(array('required' => false)),
      'image_three_height' => new sfValidatorPass(array('required' => false)),
      'image_three_width'  => new sfValidatorPass(array('required' => false)),
      'image_three_source' => new sfValidatorPass(array('required' => false)),
      'image_four_height'  => new sfValidatorPass(array('required' => false)),
      'image_four_width'   => new sfValidatorPass(array('required' => false)),
      'image_four_source'  => new sfValidatorPass(array('required' => false)),
      'link'               => new sfValidatorPass(array('required' => false)),
      'icon'               => new sfValidatorPass(array('required' => false)),
      'fb_created_time'    => new sfValidatorPass(array('required' => false)),
      'fb_updated_time'    => new sfValidatorPass(array('required' => false)),
      'position'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'comments'           => new sfValidatorPass(array('required' => false)),
      'live_in_photos'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'live_on_homepage'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('facebook_photo_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'FacebookPhoto';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'app_album_id'       => 'Number',
      'fb_id'              => 'Text',
      'fb_album_id'        => 'Text',
      'name'               => 'Text',
      'picture'            => 'Text',
      'source'             => 'Text',
      'height'             => 'Text',
      'width'              => 'Text',
      'image_one_height'   => 'Text',
      'image_one_width'    => 'Text',
      'image_one_source'   => 'Text',
      'image_two_height'   => 'Text',
      'image_two_width'    => 'Text',
      'image_two_source'   => 'Text',
      'image_three_height' => 'Text',
      'image_three_width'  => 'Text',
      'image_three_source' => 'Text',
      'image_four_height'  => 'Text',
      'image_four_width'   => 'Text',
      'image_four_source'  => 'Text',
      'link'               => 'Text',
      'icon'               => 'Text',
      'fb_created_time'    => 'Text',
      'fb_updated_time'    => 'Text',
      'position'           => 'Number',
      'comments'           => 'Text',
      'live_in_photos'     => 'Boolean',
      'live_on_homepage'   => 'Boolean',
      'created_at'         => 'Date',
      'updated_at'         => 'Date',
    );
  }
}
