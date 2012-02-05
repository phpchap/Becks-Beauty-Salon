<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('FacebookAlbum', 'doctrine');

/**
 * BaseFacebookAlbum
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $fb_id
 * @property string $name
 * @property string $link
 * @property string $cover_photo
 * @property string $photo_count
 * @property string $type
 * @property string $fb_created_time
 * @property string $fb_updated_time
 * @property string $num_comments
 * @property boolean $live_in_photos
 * 
 * @method integer       getId()              Returns the current record's "id" value
 * @method string        getFbId()            Returns the current record's "fb_id" value
 * @method string        getName()            Returns the current record's "name" value
 * @method string        getLink()            Returns the current record's "link" value
 * @method string        getCoverPhoto()      Returns the current record's "cover_photo" value
 * @method string        getPhotoCount()      Returns the current record's "photo_count" value
 * @method string        getType()            Returns the current record's "type" value
 * @method string        getFbCreatedTime()   Returns the current record's "fb_created_time" value
 * @method string        getFbUpdatedTime()   Returns the current record's "fb_updated_time" value
 * @method string        getNumComments()     Returns the current record's "num_comments" value
 * @method boolean       getLiveInPhotos()    Returns the current record's "live_in_photos" value
 * @method FacebookAlbum setId()              Sets the current record's "id" value
 * @method FacebookAlbum setFbId()            Sets the current record's "fb_id" value
 * @method FacebookAlbum setName()            Sets the current record's "name" value
 * @method FacebookAlbum setLink()            Sets the current record's "link" value
 * @method FacebookAlbum setCoverPhoto()      Sets the current record's "cover_photo" value
 * @method FacebookAlbum setPhotoCount()      Sets the current record's "photo_count" value
 * @method FacebookAlbum setType()            Sets the current record's "type" value
 * @method FacebookAlbum setFbCreatedTime()   Sets the current record's "fb_created_time" value
 * @method FacebookAlbum setFbUpdatedTime()   Sets the current record's "fb_updated_time" value
 * @method FacebookAlbum setNumComments()     Sets the current record's "num_comments" value
 * @method FacebookAlbum setLiveInPhotos()    Sets the current record's "live_in_photos" value
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseFacebookAlbum extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('facebook_album');
        $this->hasColumn('id', 'integer', 8, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 8,
             ));
        $this->hasColumn('fb_id', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('name', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('link', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('cover_photo', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('photo_count', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('type', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('fb_created_time', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('fb_updated_time', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('num_comments', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('live_in_photos', 'boolean', null, array(
             'type' => 'boolean',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}