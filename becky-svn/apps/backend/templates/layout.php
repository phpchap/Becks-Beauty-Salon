<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
		<div style="background:#222222;height:25px;">
			<a href="http://<?php echo $_SERVER['HTTP_HOST']?>/getFacebookPhotos/" onClick="alert('Please login to facebook before running this script!');return true;">GET FACEBOOK PHOTOS</a> | 				
			<a href="<?php echo url_for("@facebook_photo")?>">FACEBOOK PHOTOS</a> | 	
<?php /*			<a href="<?php echo url_for("@facebook_album")?>">FACEBOOK ALBUMS</a> | 		*/ ?>
			<a href="<?php echo url_for("@treatment_group")?>">TREATMENT GROUPS</a> | 			
			<a href="<?php echo url_for("@category")?>">TREATMENT CATEGORIES</a> | 	
			<a href="<?php echo url_for("@product")?>">TREATMENT PRODUCTS</a> | 
			<a href="<?php echo url_for("@testimonial")?>">TESTIMONIALS</a> | 
			<a href="<?php echo url_for("@special_offer")?>">SPECIAL OFFERS</a> | 
			<?php /* 	<a href="<?php echo url_for("@photo")?>">PHOTOS</a> |
			<a href="<?php echo url_for("@mailing_list")?>">MAILING LIST</a> |   */ ?>
		</div>
		<div style="text-align:left;">
    	<?php echo $sf_content ?>
		</div>
  </body>	
</html>