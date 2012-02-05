<?php use_helper('Pagination'); ?>
<script type="text/javascript" src="/js/jquery.lightbox-0.5.js"></script>
<link rel="stylesheet" type="text/css" href="/css/jquery.lightbox-0.5.css" media="screen" />
<script type="text/javascript">
$(function() {
	$('a.lightbox').lightBox(); // Select all links with lightbox class
});
</script>
<div id="doc4" class="yui-t7" style="padding-top:10px;-moz-border-radius: 3px;-webkit-border-radius: 3px;background: rgba(10, 10, 10, 0.7); ">		
    <?php include_partial('header',array('action_name' => $action_name)) ?>
    <div id="bd" role="main">
        <div class="yui-g">
            <!-- TOP BREADCRUMB/PAGINATION CONTAINER -->
            <div style="width:100%;margin:5px 0 5px 0">
                <!-- BREADCRUMB -->
                <div class="gallery_container">
                    <h3><a href="<?php echo url_for("@homepage");?>">Home</a> >> Photo Gallery</h3>
                </div>
                <!-- PAGINATION -->
                <div style="float:right;margin:0 10px 0 0">
                    <?php  echo pager_navigation($pager, '@gallery_page') ?>
                </div>
                <div style="clear:both"></div>
            </div>
            <div class="gallery_container">
                <h2>Photo Gallery</h2>
                <?php $photo_counter = 1; ?>
                <?php foreach ($pager->getResults() as $photo) {  ?>
                    <?php $photo_counter = 1; ?>
                    <div class="<?php echo ($photo_counter == 1 )?"photo_first":"photo"; ?>">
                        <a title="<?php echo $photo->getName();?>" href="<?php print $photo->getHomePagePhotoLightbox();?>" class="lightbox"><img class="img_border" src="/images.php?img=<?php print $photo->getHomePagePhoto();?>"/>
                            <p style="font-size:10px;margin: 0px; color: #fff;"><?php echo $photo->getName();?></p></a>
                    </div>
                    <?php $photo_counter++ ?>
                <?php } ?>
                <div style="clear:both"></div>
            </div>
            <!-- BOTTOM BREADCRUMB/PAGINATION CONTAINER -->
            <?php if($pager->count() > 10) { ?>
                <div class="gallery_container" >
                    <!-- PAGINATION -->
                    <div style="float:right;margin:0 10px 0 0">
                        <?php echo pager_navigation($pager, '@gallery_page') ?>
                    </div>
                    <div style="clear:both"></div>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php include_partial('footer') ?>
</div>
