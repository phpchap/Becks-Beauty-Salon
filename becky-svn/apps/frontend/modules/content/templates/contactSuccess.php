<script type='text/javascript' src='http://maps.google.com/maps/api/js?sensor=false'></script><script type="text/javascript" charset="utf-8">
//<![CDATA[
/*************************************************
 * Created with GoogleMapAPI3.0beta
 * Author: Brad Wedell <brad AT mycnl DOT com>
 * Link http://code.google.com/p/php-google-map-api/
 * Copyright 2010 Brad Wedell
 * Original Author: Monte Ohrt <monte AT ohrt DOT com>
 * Original Copyright 2005-2006 New Digital Group
 * Originial Link http://www.phpinsider.com/php/code/GoogleMapAPI/
 *************************************************/
var markersmap=[];
var sidebar_htmlmap='';
var marker_htmlmap=[];
var to_htmlsmap=[];
var from_htmlsmap=[];
var mapmap=null;
function onLoadmap(){
	var mapObjmap=document.getElementById("map");
	if(mapObjmap!='undefined'&&mapObjmap!=null){
		var mapOptionsmap = {scrollwheel:true,zoom:16,mapTypeId:google.maps.MapTypeId.HYBRID,mapTypeControl:true,mapTypeControlOptions:{style:google.maps.MapTypeControlStyle.DEFAULT}};mapOptionsmap.center=new google.maps.LatLng(53.381708,-6.591582);mapmap=new google.maps.Map(mapObjmap,mapOptionsmap);var point=new google.maps.LatLng(53.381708,-6.591582);markersmap.push(createMarker(mapmap,point,"","Becks Beauty Salon",'','',"sidebar_map",''));}}
function createMarker(map,point,title,html,icon,icon_shadow,sidebar_id,openers){var marker_options={position:point,map:map,title:title};if(icon!=''){marker_options.icon=icon;}
if(icon_shadow!=''){marker_options.shadow=icon_shadow;}
var new_marker=new google.maps.Marker(marker_options);if(html!=''){var infowindow=new google.maps.InfoWindow({content:html});google.maps.event.addListener(new_marker,'click',function(){infowindow.open(map,new_marker);});if(openers!=''&&!isEmpty(openers)){for(var i in openers){var opener=document.getElementById(openers[i]);opener.onclick=function(){infowindow.open(map,new_marker);return false};}}
if(sidebar_id!=''){var sidebar=document.getElementById(sidebar_id);if(sidebar!=null&&sidebar!=undefined&&title!=null&&title!=''){var newlink=document.createElement('a');newlink.onclick=function(){infowindow.open(map,new_marker);return false};newlink.innerHTML=title;sidebar.appendChild(newlink);}}}
return new_marker;}
function isArray(a){return isObject(a)&&a.constructor==Array;}
function isObject(a){return(a&&typeof a=='object')||isFunction(a);}
function isFunction(a){return typeof a=='function';}
function isEmpty(obj){for(var i in obj){return false;}return true;}//]]>
</script>
<script language="javascript" type="text/javascript" charset="utf-8">window.onload=onLoadmap;</script>
<div id="doc4" class="yui-t7" style="padding-top:10px;-moz-border-radius: 3px;-webkit-border-radius: 3px;background: rgba(10, 10, 10, 0.7); ">
    <?php include_partial('header',array('action_name' => $action_name)) ?>
    <div id="bd" role="main">
        <!-- TOP BREADCRUMB/PAGINATION CONTAINER -->
        <div style="width:100%;margin:5px 0 5px 0">
            <!-- BREADCRUMB -->
            <div class="gallery_container">
                <h3><a href="<?php echo url_for("@homepage");?>">Home</a> >> Contact</h3>
            </div>
            <div style="clear:both"></div>
        </div>
        <div class="yui-ge">
            <!-- TESTIMONIALS CONTAINER -->
            <div class="yui-u first">
                <div style="float:left;width:300px;"  class="gallery_container">
                    <p><?php echo sfConfig::get('app_address_one'); ?></p>
                    <p><?php echo sfConfig::get('app_address_two'); ?></p>
                    <p><?php echo sfConfig::get('app_county'); ?></p>
                    <p><?php echo sfConfig::get('app_telephone'); ?></p>
                    <p><?php echo sfConfig::get('app_company_registration_number');?></p>
                    <p><a href="mailto:<?php echo sfConfig::get('app_contact_us_email'); ?>">email me</a></p>
                    <br/>
                    <p>Salon Opening Hours</p>
                    <br/>
                    <p>Monday - Tuesday 9am to 6pm</p>
                    <p>Wednesday - 10am to 7pm</p>
                    <p>Thursday - Friday 9am to 9pm</p>
                    <p>Saturday - 9am to 5pm</p>
                </div>
                <div style="float:left;width:500px;margin:10px;" class="gallery_container">
                    <h2>Directions to Becks Beauty Salon</h2>
                    <script type="text/javascript" charset="utf-8">
                    //<![CDATA[
                    document.write('<div id="map" style="width: 500px; height: 500px; position:relative;"><\/div>');
                    //]]>
                    </script>
                <div id="sidebar_map"></div>
                </div>
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
