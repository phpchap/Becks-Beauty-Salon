		<div id="doc4" class="yui-t7" style="padding-top:10px;-moz-border-radius: 3px;-webkit-border-radius: 3px;background: rgba(10, 10, 10, 0.7); ">
			<?php include_partial('header',array('action_name' => $action_name)) ?>	
			<div id="bd" role="main">		
				<!-- TOP BREADCRUMB/PAGINATION CONTAINER -->
				<div style="width:100%;margin:5px 0 5px 0">
					<!-- BREADCRUMB -->
					<div class="gallery_container">
						<h3><a href="<?php echo url_for("@homepage");?>">Home</a> >> Testimonials</h3>
					</div>
					<div style="clear:both"></div>
				</div>		
				<div class="yui-ge">
					
					<!-- TESTIMONIALS CONTAINER -->
					<?php if($testimonials) { ?>
							<div class="yui-u first">							
							<?php foreach($testimonials as $testimonial) { ?>
								<div style="margin-bottom:5px;" class="gallery_container">							
									<div style="background: url('/images/icon-quote-tweets-up.png') no-repeat scroll 0pt 7px transparent;min-height:47px;width:42px;float:left;"><p style="font-align:left;padding-top:10px;padding-right:10px;padding-bottom:5px;padding-left:15px;width:620px;"><?php echo $testimonial->getStatement() ?></p>
									</div>
									<div style="background: url('/images/icon-quote-tweets-down.png') no-repeat scroll 0pt 10px transparent;height:47px;width:42px;float:right;">
										<p style="text-align:right;float:right;width:230px;padding-top:30px;padding-right:5px;padding-bottom:10px;padding-left:5px;"><?php echo $testimonial->getName() ?></p>																				
									</div>																											
									<div style="clear:both">&nbsp;</div>
								</div>
							<?php } ?>
									<div style="clear:both">&nbsp;</div>							
				    	</div>	
					<?php } ?>
		
					<!-- FIND OUT MORE/MAILING LIST CONTAINER -->				
					<div class="yui-u" style="border:1px solid black;">
						<?php include_partial('findoutmore') ?>
						<?php include_partial('mailinglist') ?>
				    </div>
		
				</div>
			</div>
			<?php include_partial('footer') ?>
		</div>
