<?php use_helper('I18N', 'Date') ?>
<?php include_partial('photo/assets') ?>

<link rel="stylesheet" type="text/css" href="/css/default.css" />
<link rel="stylesheet" href="/css/demos.css" type="text/css" />
<link rel="stylesheet" href="/css/jquery.Jcrop.css" type="text/css" />

<script type="text/javascript" src="/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="/js/swfobject.js"></script>
<script type="text/javascript" src="/js/jquery.uploadify.v2.1.0.js"></script>
<script type="text/javascript" src="/js/jquery.Jcrop.js"></script>

<script language="javascript">
$(document).ready(function(){
				
	$(function(){
		$('#cropbox').Jcrop({
			aspectRatio: 1,
			onSelect: updateCoords
		});
	});

	function updateCoords(c)
	{
		$('#x').val(c.x);
		$('#y').val(c.y);
		$('#w').val(c.w);
		$('#h').val(c.h);
	};

	function checkCoords()
	{
		if (parseInt($('#w').val())) return true;
		alert('Please select a crop region then press submit.');
		return false;
	};	
});
</script>

<div id="sf_admin_container">
  <h1><?php echo __('New Photo', array(), 'messages') ?></h1>

  <?php include_partial('photo/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('photo/form_header', array('photo' => $photo, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">

	<?php use_stylesheets_for_form($form) ?>
	<?php use_javascripts_for_form($form) ?>

	<div class="sf_admin_form">
		
	  <form action="<?php echo url_for('photo/crop/') ?>" method="POST" enctype="multipart/form-data">
	  <input type="hidden" name="ajax_image" value="" id="ajax_image">	
	
	  <table>
		<tr valign="top">
			<td> <div class="label"><?php // echo $form['image']->renderLabel(); ?></div></td>									
			<td valign="bottom">

				 <img src="" id="cropbox" />		

			</td>
			<td></td>																																			
		</tr>	
		<tr valign="top">
	     		<td>&nbsp; </td>
			<td colspan="2"><div id="fileQueue"  class="fileQueue"></div></td>					
		</tr>
	  </table>		

      <?php include_partial('photo/form_actions', array('photo' => $photo, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>

	  </form>
	</div>

  </div>

  <div id="sf_admin_footer">
    <?php include_partial('photo/form_footer', array('photo' => $photo, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>