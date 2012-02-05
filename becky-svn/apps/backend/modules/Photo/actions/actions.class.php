<?php

require_once dirname(__FILE__).'/../lib/PhotoGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/PhotoGeneratorHelper.class.php';

/**
 * Photo actions.
 *
 * @package    sf_sandbox
 * @subpackage Photo
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PhotoActions extends autoPhotoActions
{
  public function executeNew(sfWebRequest $request)
  {
    $this->form = $this->configuration->getForm();
    $this->photo = $this->form->getObject();
  }
	
  public function executeCrop(sfWebRequest $request) 
  {	
	$photo = new Photo();
	$posted_image = $_POST['ajax_image'];
	$title = $_POST['title'];
	$live = $request->getParameter('live');

	$src = "http://".$_SERVER['HTTP_HOST'].'/uploads/'.$posted_image;
	$output_filename = sfConfig::get('sf_upload_dir').'/1_'.$posted_image;

	if(!empty($_POST['w']) || !empty($_POST['h']) ) {

		$targ_w = sfConfig::get('app_image_one_width');
		$targ_h = sfConfig::get('app_image_one_height');

		$jpeg_quality = 90;

		$extension = strtolower(substr($posted_image, strrpos($posted_image, '.') + 1));

		switch($extension){
			case 'jpg': 
			case 'jpeg': 
				$img_r = imagecreatefromjpeg($src);						
			break;
			case 'gif': 
				$img_r = imagecreatefromgif($src);					
			break;
			case 'png': 
				$img_r = imagecreatefrompng($src);																		
			break;
			case 'bmp': 
				$img_r = imagecreatefromwbmp($src);			
			break;
		}

		$dst_r = imagecreatetruecolor( $targ_w, $targ_h );
		imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],$targ_w,$targ_h,$_POST['w'],$_POST['h']);

		switch($extension){
			case 'jpg': 
			case 'jpeg': 
				imagejpeg($dst_r, $output_filename);				
			break;
			case 'gif': 
				imagegif($dst_r, $output_filename);			
			break;
			case 'png': 
				imagepng($dst_r, $output_filename);																
			break;
			case 'bmp': 
				image2wbmp($dst_r, $output_filename);
			break;
		}

		// create thumbnail
		$thumbnail_one = new sfThumbnail(sfConfig::get('app_image_one_width'), sfConfig::get('app_image_one_height'));
		$thumbnail_one->loadFile($output_filename);
		$thumbnail_one->save(sfConfig::get('sf_upload_dir').'/2_'.$posted_image);

		// create thumbnail
		$thumbnail_two = new sfThumbnail(sfConfig::get('app_image_two_width'), sfConfig::get('app_image_two_height'));
		$thumbnail_two->loadFile($output_filename);
		$thumbnail_two->save(sfConfig::get('sf_upload_dir').'/3_'.$posted_image);

		// create thumbnail
		$thumbnail_three = new sfThumbnail(sfConfig::get('app_image_three_width'), sfConfig::get('app_image_htree_height'));
		$thumbnail_three->loadFile($output_filename);
		$thumbnail_three->save(sfConfig::get('sf_upload_dir').'/4_'.$posted_image);

		// create thumbnail
		$thumbnail_four = new sfThumbnail(sfConfig::get('app_image_four_width'), sfConfig::get('app_image_four_height'));
		$thumbnail_four->loadFile($output_filename);
		$thumbnail_four->save(sfConfig::get('sf_upload_dir').'/5_'.$posted_image);

	}

	$photo->setFileName($posted_image);
	$photo->setLive($live);
	$photo->setTitle($title);
	$photo->save();		

	$this->redirect('photo');
  }

  public function executeUpload(sfWebRequest $request)
  {
	sfConfig::set('sf_web_debug', false);
	
	if (!empty($_FILES)) {

	    $tempFile = $_FILES['Filedata']['tmp_name'];
	    $targetPath = $_SERVER['DOCUMENT_ROOT'] . $_REQUEST['folder'] . '/';
	    $filename = $_FILES['Filedata']['name'];
	    $targetFile =  str_replace('//','/',$targetPath) . $filename;
		$extension = substr($targetFile, strrpos($targetFile, '.') + 1);

		// hash the file
	  	$filename = 'uploaded_'.sha1($targetFile);
		$filePath = sfConfig::get('sf_upload_dir').'/'.$filename.".".$extension;

		// only images are allowed
		$valid_ext[]="jpg";
		$valid_ext[]="jpeg";
		$valid_ext[]="gif";
		$valid_ext[]="png";

		if(in_array(strtolower($extension), $valid_ext)) {

			// upload the normal size image
		    move_uploaded_file($tempFile, $filePath);
/*
			//
			$thumbnail = new sfThumbnail(sfConfig::get('app_thumb_height'), sfConfig::get('app_thumb_width'));
			$thumbnail->loadFile($filePath);
			$thumbnail->save(sfConfig::get('sf_upload_dir').'/britishlegion/thumbnails/'.$filename.".".$extension);

			// create a normal size
			$normal = new sfThumbnail(sfConfig::get('app_normal_image_height'), sfConfig::get('app_normal_image_width'));
			// Load the image to reduce
			$normal->loadFile($filePath);
			// Save the thumbnail
			$normal->save(sfConfig::get('sf_upload_dir').'/britishlegion/normal/'.$filename.".".$extension);
*/
			$this->renderText($filename.".".$extension);
						
		} else {
			$this->renderText("error");
		}
	}
	return sfView::NONE;
  }
}
