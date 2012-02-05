<div id="doc4" class="yui-t7" style="padding-top:10px;-moz-border-radius: 3px;-webkit-border-radius: 3px;background: rgba(10, 10, 10, 0.7); ">
    <?php include_partial('header',array('action_name' => $action_name)) ?>
    <div id="bd" role="main">
        <!-- TOP BREADCRUMB/PAGINATION CONTAINER -->
        <div class="gallery_container">
            <!-- BREADCRUMB -->
            <div style="float:left;">
                <h3><a href="<?php echo url_for("@homepage");?>">Home</a> >> Special Offers</h3>
            </div>
            <div style="clear:both"></div>
        </div>
        <div class="yui-ge">
            <!-- SPECIAL OFFERS CONTAINER -->
            <div class="yui-u first">
                <?php $offer_counter = 1; ?>
                <?php foreach ($offers as $offer) {  ?>
                    <div class="<?php echo ($offer_counter == 1 )?"offer_first":"offer"; ?>">
                        <h2><?php echo $offer->getDescriptionOne(); ?></h2>
                        <p align="left"><?php echo $offer->getDescriptionTwo(); ?></p>
                        <p align="left"><?php echo $offer->getDescriptionThree(); ?></p>
                    </div>
                    <?php $offer_counter++ ?>
                <?php } ?>
        </div>
        <!-- FIND OUT MORE/MAILING LIST CONTAINER -->
        <div class="yui-u">
            <?php include_partial('findoutmore') ?>
            <?php include_partial('mailinglist') ?>
        </div>
    </div>
    </div>
    <?php include_partial('footer') ?>
</div>