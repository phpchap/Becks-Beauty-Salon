<?php

/**
 * FacebookAlbum filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseFacebookAlbumFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'fb_id'           => new sfWidgetFormFilterInput(),
      'name'            => new sfWidgetFormFilterInput(),
      'link'            => new sfWidgetFormFilterInput(),
      'cover_photo'     => new sfWidgetFormFilterInput(),
      'photo_count'     => new sfWidgetFormFilterInput(),
      'type'            => new sfWidgetFormFilterInput(),
      'fb_created_time' => new sfWidgetFormFilterInput(),
      'fb_updated_time' => new sfWidgetFormFilterInput(),
      'num_comments'    => new sfWidgetFormFilterInput(),
      'live_in_photos'  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'fb_id'           => new sfValidatorPass(array('required' => false)),
      'name'            => new sfValidatorPass(array('required' => false)),
      'link'            => new sfValidatorPass(array('required' => false)),
      'cover_photo'     => new sfValidatorPass(array('required' => false)),
      'photo_count'     => new sfValidatorPass(array('required' => false)),
      'type'            => new sfValidatorPass(array('required' => false)),
      'fb_created_time' => new sfValidatorPass(array('required' => false)),
      'fb_updated_time' => new sfValidatorPass(array('required' => false)),
      'num_comments'    => new sfValidatorPass(array('required' => false)),
      'live_in_photos'  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('facebook_album_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'FacebookAlbum';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'fb_id'           => 'Text',
      'name'            => 'Text',
      'link'            => 'Text',
      'cover_photo'     => 'Text',
      'photo_count'     => 'Text',
      'type'            => 'Text',
      'fb_created_time' => 'Text',
      'fb_updated_time' => 'Text',
      'num_comments'    => 'Text',
      'live_in_photos'  => 'Boolean',
      'created_at'      => 'Date',
      'updated_at'      => 'Date',
    );
  }
}
