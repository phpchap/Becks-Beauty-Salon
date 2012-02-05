<script type="text/javascript">
$(function() {
	$('a.lightbox').lightBox(); // Select all links with lightbox class
});
</script>
<div id="doc4" class="yui-t7" style="padding-top:10px;-moz-border-radius: 3px;-webkit-border-radius: 3px;background: rgba(10, 10, 10, 0.7); ">						
    <?php include_partial('header',array('action_name' => $action_name)) ?>
    <div id="bd" role="main">
        <div class="yui-ge">
            <div class="yui-u first">
                <!-- SHOP CONTAINER -->
                <div style="min-height:86px;" class="shop_container">
                    <p style="float:left;"><img src="/images/shop.jpg"/></p>
                    <div style="float:right;width:680px;">
                        <h2>Welcome to the Becks Beauty Salon</h2>
                        <p>Welcome to the salon where you will be treated to the best service, refreshments and generous <a href="<?php echo url_for("@special_offers");?>">special offers</a>. You can enjoy a range of beauty <a href="<?php echo url_for('@treatments');?>">treatments</a> while unwinding in our comfortable and relaxing treatment rooms. We can also work around your busy work schedule, you can visit the <a href="<?php echo url_for("@contact");?>">contact</a> page to arrange an appointment.</p>
                    </div>
                    <div style="clear:both"></div>
                </div>
                <!-- GALLERY CONTAINER -->
                <div class="homepage_gallery_container">
                    <h2 style="padding-left:5px;">Photo Gallery</h2>
                    <?php foreach ($photos as $photo) {  ?>
                        <?php $photo_counter = 1; ?>
                        <div class="<?php echo ($photo_counter == 1 )?"photo_first":"photo"; ?>">
                            <a title="<?php echo $photo->getName();?>" href="<?php print $photo->getHomePagePhotoLightbox();?>" class="lightbox"><img class="img_border" src="/images.php?img=<?php print $photo->getHomePagePhoto();?>"/>
                                <p style="font-size:12px;margin: 0px; color: #fff;"><?php echo $photo->getName();?></p></a>
                        </div>
                        <?php $photo_counter++ ?>
                    <?php } ?>
                    <div style="clear:both"></div>
                </div>
                <!-- SPECIAL OFFER CONTAINER -->
                <?php if($offers) { ?>
                    <div class="special_offers_container">
                        <?php foreach($offers as $offer) { ?>
                            <h2><?php echo $offer->getDescriptionOne(); ?></h2>
                            <p><?php echo $offer->getDescriptionTwo(); ?></p>
                            <p><?php echo $offer->getDescriptionThree(); ?></p>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
            <div class="yui-u" style="">
                <iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2F%23%21%2Fpages%2FBecks-Beauty-Salon%2F131424670248995&amp;width=290&amp;colorscheme=dark&amp;show_faces=false&amp;stream=true&amp;header=true&amp;height=410" scrolling="no" frameborder="0" style="border:none;width:289px; height:405px;" allowTransparency="true"></iframe>
                <?php include_partial('mailinglist') ?>
            </div>
        </div>
    </div>
    <?php include_partial('footer') ?>
</div>
