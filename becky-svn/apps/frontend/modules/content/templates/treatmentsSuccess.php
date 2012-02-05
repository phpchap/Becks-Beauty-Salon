<script>
$(function() {
	$( "#tabs" ).tabs();
});
$(document).ready(function() {
	$("#accordion").accordion({ autoHeight: false });
});
</script>
<div style="display: none;" class="demo-description">
	<p>Click tabs to swap between content that is broken into logical sections.</p>
</div><!-- End demo-description -->
<div id="doc4" class="yui-t7" style="padding-top:10px;-moz-border-radius: 3px;-webkit-border-radius: 3px;background: rgba(10, 10, 10, 0.7); ">
    <?php include_partial('header',array('action_name' => $action_name)) ?>
    <div id="bd" role="main">
        <!-- TOP BREADCRUMB/PAGINATION CONTAINER -->
        <div style="width:100%;margin:5px 0 5px 0">
            <!-- BREADCRUMB -->
            <div class="gallery_container">
                <h3><a href="<?php echo url_for("@homepage");?>">Home</a> >> Treatments</h3>
            </div>
            <div style="clear:both"></div>
        </div>
        <div class="yui-ge">
            <!-- SPECIAL OFFERS CONTAINER -->
            <div class="yui-u first" >
                <div class="demo">
                    <?php if(count($treatment_groups)>0) { ?>
                        <div id="tabs">
                            <ul>
                            <?php foreach($treatment_groups as $treatment_group_id => $treatment_group) { ?>
                                <li><a href="#tabs-<?php echo $treatment_group->getId()?>"><?php echo $treatment_group->getName()?></a></li>
                            <?php } ?>
                            </ul>
                            <?php foreach($treatment_groups as $treatment_group_id => $treatment_group) { ?>
                                <div id="tabs-<?php echo $treatment_group->getId()?>">
                                <?php $categories = $treatment_group->getCategories(); ?>
                                <?php if($categories) { ?>
                                    <div id="accordion">
                                        <?php foreach($categories as $category) { ?>
                                            <h3><a href="#"><?php echo $category->getName(); ?></a></h3>
                                            <div>
                                                <?php if($category->hasExtraInfo()){ ?>
                                                    <p><?php echo $category->getExtraInfo(); ?></p>
                                                    <br/>
                                                <?php } ?>
                                                <?php if($category->hasProducts()) { ?>
                                                    <?php foreach($category->getProducts() as $product) { ?>
                                                        <p>
                                                        <?php echo $product->getName()?>
                                                        &euro;<?php echo $product->getPrice()?>
                                                        <br/>
                                                        <?php echo $product->getExtraInfo(); ?>
                                                        </p>
                                                    <?php } ?>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                <?php } else { ?>
                                    <p>No Categories found, please add some in the backend!</p>
                                <?php } ?>
                                </div>
                            <?php } ?>
                        <?php } else { ?>
                            <p>No Treatment groups found, please add some in the backend!</p>
                        <?php } ?>
                    </div>
                </div><!-- End demo -->
            </div>
            <!-- FIND OUT MORE/MAILING LIST CONTAINER -->
            <div class="yui-u" style="border:1px solid black;">
                <?php include_partial('findoutmore') ?>
                <?php include_partial('mailinglist') ?>
            </div>
        </div>
    </div>
    <?php include_partial('footer') ?>
</div>
