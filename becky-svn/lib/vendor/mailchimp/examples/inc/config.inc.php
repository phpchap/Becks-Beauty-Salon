<?php
    //API Key - see http://admin.mailchimp.com/account/api
    $apikey = sfConfig::get('app_mailchimp_api_key');
    
    // A List Id to run examples against. use lists() to view all
    // Also, login to MC account, go to List, then List Tools, and look for the List ID entry
    $listId = sfConfig::get('app_mailchimp_list_id');
    
    // A Campaign Id to run examples against. use campaigns() to view all
    $campaignId = sfConfig::get('app_mailchimp_campaign_id');

    //some email addresses used in the examples:
    $my_email = sfConfig::get('app_my_email');
    $boss_man_email = sfConfig::get('app_my_email');

    //just used in xml-rpc examples
    $apiUrl = sfConfig::get('app_api_url');
    
?>
