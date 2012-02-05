<link rel="stylesheet" type="text/css" href="/css/default.css" />
<link rel="stylesheet" type="text/css" href="/css/jquery.Jcrop.css" />
<script type="text/javascript" src="/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="/js/swfobject.js"></script>
<script type="text/javascript" src="/js/jquery.uploadify.v2.1.0.js"></script>
<script type="text/javascript" src="/js/jquery.Jcrop.js"></script>
<script language="javascript">
$(document).ready(function(){		

	$("#uploadify").uploadify({
		'onComplete'	 : function(event, queueID, fileObj, response) { displayImage(response); },
		'uploader'       : '/js/uploadify.swf',
		'script'         : '<?php echo url_for('Photo/upload'); ?>',
		'cancelImg'      : '/images/cancel.png',
		'folder'         : 'uploads',
		'queueID'        : 'fileQueue',
		'auto'           : true,
		'multi'          : false ,
		'buttonImg'      : '/images/browse.png',
		'rollover'       : 'true' ,
		'width'          : '93' ,
		'height'         : '26' ,
		'wmode'          : 'transparent'	
	});
	
	function displayImage(uploadName)
	{
		var thumbnail_location = "/uploads/";

		if(uploadName != "error") {		

			$("#pic").attr("src", thumbnail_location + uploadName);	
			$("#preview").attr("src", thumbnail_location + uploadName);			
			$("#ajax_image").val(uploadName);
			$("#msg").html("");
			
			jQuery(function() { jQuery('#pic').Jcrop({ aspectRatio: 1 , onSelect: updateCoords }); });
						
		} else {	
			$("#pic").attr("src", "/images/x.jpg");			
		}
	
		// add the remove image button
		$("#remove_image_button").html("<a href='#' id='remove_image'>remove image</a>").bind('click', function() {
			// remove the image
			$("#pic").attr("src", "/images/x.jpg").attr("style", "float:left;padding-top:0px; padding-right:10px;");	
			$("#ajax_image").val("");		
			$("#remove_image_button").html("");
			$("#msg").html("To keep upload times to a minimum, please keep the image file size under 1mb.");		
		});	
	}
	
	function updateCoords(c)
	{
		jQuery('#x').val(c.x);
		jQuery('#y').val(c.y);
		jQuery('#w').val(c.w);
		jQuery('#h').val(c.h);
	};
});
</script>

<?php use_helper('I18N', 'Date') ?>
<?php include_partial('photo/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('New Photo', array(), 'messages') ?></h1>

  <?php include_partial('photo/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('photo/form_header', array('photo' => $photo, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
	
	<form action="<?php echo url_for('Photo/crop/') ?>" method="POST">
	<input type="hidden" name="ajax_image" value="" id="ajax_image">
	<input type="hidden" id="x" name="x" />
	<input type="hidden" id="y" name="y" />
	<input type="hidden" id="w" name="w" />
	<input type="hidden" id="h" name="h" />
	
	<table border="1">

	<tr valign="top">
		<td><div class="label"><?php echo $form['title']->renderLabel(); ?></div></td>		

		<td>
			<?php if ($form['title']->hasError()) { ?>
			<?php 
				$class='error'; 
				$error_container=''; ?>
			<?php } else { ?>
			<?php 
				$class=''; 
				$error_container='<div class="error_container">&nbsp;</div>'; ?>
			<?php } ?>				

			<?php echo $form['title']->render(array('class' => $class)); ?>
			<?php echo $error_container; ?>
			<?php echo $form['title']->renderError(); ?>	
		</td>
		<td></td>																				
	</tr>
		
	<tr valign="top">
		<td> <div class="label"><?php echo $form['image']->renderLabel(); ?></div></td>									
		<td valign="bottom">
            <img src="/images/x.jpg" id="pic" style="float:left;padding-top:0px; padding-right:10px;" />	
			
			<?php if ($form['image']->hasError()) { ?>
			<?php 
				$class='error'; 
				$error_container=''; ?>
			<?php } else { ?>
			<?php 
				$class=''; 
				$error_container='<div class="error_container">&nbsp;</div>'; ?>
			<?php } ?>				
		</td>
		<td></td>		
	</tr>	
	<tr>
		<td></td>
		<td>
			<?php echo $form['image']->render(array('class' => $class, 'id' => 'uploadify')); ?>
			<?php echo $error_container; ?>
			<?php echo $form['image']->renderError(); ?>	
			<div id="remove_image_button"></div>						
		</td>
		<td></td>		
	</tr>
	<tr valign="top">
		<td><div class="label"><?php echo $form['live']->renderLabel(); ?></div></td>		
		<td>
			<?php if ($form['live']->hasError()) { ?>
			<?php 
				$class='error'; 
				$error_container=''; ?>
			<?php } else { ?>
			<?php 
				$class=''; 
				$error_container='<div class="error_container">&nbsp;</div>'; ?>
			<?php } ?>				

			<?php echo $form['live']->render(array('class' => $class)); ?>
			<?php echo $error_container; ?>
			<?php echo $form['live']->renderError(); ?>	
		</td>
		<td></td>																				
	</tr>
	<tr valign="top">
    	<td>&nbsp; </td>
		<td colspan="2">
			<div id="fileQueue"  class="fileQueue"></div>
		</td>					
	</tr>	
	<!-- UPLOADIFY - AJAX IMAGE -->	
</table>
	
<?php include_partial('photo/form_actions', array('photo' => $photo, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
</form>	
		
    <?php //include_partial('photo/form', array('photo' => $photo, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('photo/form_footer', array('photo' => $photo, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
