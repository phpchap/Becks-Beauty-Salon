<?php

class updateFacebookPhotosTask extends sfBaseTask
{
  protected function configure()
  {
    // // add your own arguments here
    // $this->addArguments(array(
    //   new sfCommandArgument('my_arg', sfCommandArgument::REQUIRED, 'My argument'),
    // ));

    $this->addOptions(array(
      new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name'),
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
      new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'doctrine'),
      // add your own options here
    ));

    $this->namespace        = 'facebook';
    $this->name             = 'updateFacebookPhotos';
    $this->briefDescription = '';
    $this->detailedDescription = <<<EOF
The [updateFacebookPhotos|INFO] task does things.
Call it with:

php symfony updateFacebookPhotos
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    // initialize the database connection
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = $databaseManager->getDatabase($options['connection'])->getConnection();

		// initialise the facebook SDK object
		$this->facebook = new Facebook(array('appId'  => sfConfig::get('app_facebook_app_id'),
	      													 		   'secret' => sfConfig::get('app_facebook_secret'),
																	   		 'cookie' => true));
	
		// get the current number of albums
		$current_album_count = FacebookAlbumTable::getAlbumCount();
	
		// make facebook api call to fetch the number of albums
		$albums 			 =	$this->facebook->api('/131424670248995/albums');
		
		foreach($albums['data'] as $album) 
		{			
			$facebook_album = FacebookAlbumTable::getAlbumByFbId($album['id']);
			// album does not exist yet.. 
			if($facebook_album == false) {
//				echo "<br/>Album :: ".$album['id']." does not exist - create! \n";
				$facebook_album = new FacebookAlbum();
				$facebook_album->setFields($album);
				$facebook_album->save();
				// now fetch the photos in the album
//				echo "<br/>Facebook Album :: ".$album['id']." Added! \n";												
			} else {
//				echo "<br/>Album :: ".$album['id']." does exist - check photo count! \n";				
			}	
			$this->getAlbumPhotos($facebook_album->getFbId(), $facebook_album->getId());							
		}		
//		echo "<br/>".$album['id']." does exist - check photo count! \n";
//		echo "<br/>All done!";		
  }

	public function getAlbumPhotos($fb_album_id, $id) 
	{		
		// make facebook api call to fetch the photos in an album
		$album_photos 			=	$this->facebook->api($fb_album_id.'/photos');
		foreach($album_photos['data'] as $album_photo) {
			// does the photo already exist?
			$facebook_photo_check = FacebookPhotoTable::getPhotoByFbId($album_photo['id']);
			// new photo..
			if($facebook_photo_check==false) {
				$facebook_photo = new FacebookPhoto();
				$album_photo['app_album_id'] 	= $fb_album_id;						
				$album_photo['fb_album_id'] 	= $id;
				$facebook_photo->setFields($album_photo);
				$facebook_photo->save();
//				echo "Facebook Photo : ".$facebook_photo->getFbId()." Added!\n";
			}
		}
	}
}
