<?php

/**
 * Frontend content controller
 *
 * @package    Becks Beauty Salon
 * @subpackage Frontend
 * @author     Justen Doherty (phpchap@gmail.com)
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contentActions extends sfActions
{
    /**
     * function preExecute()
     * ---------------------
     * called before all requests defined within this class
     *
     * @author Justen Doherty (phpchap@gmail.com)
     */
	public function preExecute()
	{		
		// initialise the facebook api variables
        $app_id = sfConfig::get('app_facebook_app_id');
        $secret = sfConfig::get('app_facebook_secret');

        // initialise the facebook SDK object and make it available for all
        // other actions
		$this->facebook = new Facebook(array('appId' => $app_id,
                                             'secret' => $secret,
                                             'cookie' => true));

        // define the current action
		$this->action_name = $this->getActionName();
	}

    /**
     * function executeGetFacebookPhotos()
     * -----------------------------------
     * fetch all the photos from beckys facebook page, this usually runs under
     * cron, but the user can trigger this by directly calling this action.
     * the task is defined in /lib/task/updateFacebookPhotosTask.class.php
     *
     * @author Justen Doherty (phpchap@gmail.com)
     * @param sfWebRequest $request
     */
	public function executeGetFacebookPhotos(sfWebRequest $request)
	{
        // Trick plugin into thinking you are in a project directory
   		chdir(sfConfig::get('sf_root_dir'));

        // define and run the task
    	$task = new updateFacebookPhotosTask($this->dispatcher, 
                                             new sfFormatter());
    	$task->run();
	}

    /**
     * function executeAjaxMailingList
     * -------------------------------
     * mailchimp lists are adding using an ajax request which makes an API
     * request over to mailchimp and return a success/failure message
     *
     * @author Justen Doherty (phpchap@gmail.com)
     * @param sfWebRequest $request
     * @return string status of API request
     */
	public function executeAjaxMailingList(sfWebRequest $request)
	{
        // we should be using sf's auto loading, but lets get things moving..
		$path_to_mailchimp = '/../lib/vendor/mailchimp/examples/inc/';
		require_once getcwd().$path_to_mailchimp.'MCAPI.class.php';
		require_once getcwd().$path_to_mailchimp.'config.inc.php'; 

        // instantiate mailchimp api object
		$mailchimp_api = new MCAPI($apikey);

        // set a few api params
		$name 	 		  = $request->getParameter('mailing_name');
		$email 	 		  = $request->getParameter('mailing_email');
		$merge_vars = array('FNAME' => $name);
		$my_email 	= $email;

        // make the api call and handle the response
		$retval = $mailchimp_api->listSubscribe( $listId,
                                                 $my_email,
                                                 $merge_vars );
        // handle error or success
		if ($api->errorCode){
            // define the error string
			$error="Code=".$api->errorCode."<br/>";
			$error.="Msg=".$api->errorMessage."<br/>";
            // pass the message back
			return $this->renderText($error);		
		} else {
            // all good, let the user know
			return $this->renderText("OK");
		}	
	}	

    /**
     * function executeAjaxContactUs()
     * -------------------------------
     * the contact form sends a new message via an ajax call, which is a simple
     * call to the sfMailer class
     *
     * @author Justen Doherty (phpchap@gmail.com)
     * @param sfWebRequest $request
     * @return <type>
     */
	public function executeAjaxContactUs(sfWebRequest $request)
	{
        // parse the incoming details from the form
		$name 	 		  = $request->getParameter('name');
		$email 	 		  = $request->getParameter('email');
		$phone 	 		  = $request->getParameter('phone');
		$incoming_message = $request->getParameter('message');

        // define the message subject
		$subject = "Site Contact Form";

        // end of line character
		$eol="<br/>";

        // build the message and drop in the variables that have been submitted
		$message_to_send = "-------------------------------".$eol;	
		$message_to_send .= "Site Contact Form".$eol;	
		$message_to_send .= "-------------------------------".$eol;
		$message_to_send .= "Date :: ".date("d/m/Y", time()).$eol;
		$message_to_send .= "Name :: ".$name.$eol;
		$message_to_send .= "Email :: ".$email.$eol;
		$message_to_send .= "Phone :: ".$phone.$eol;
		$message_to_send .= "Message :: ".$incoming_message.$eol;
		$message_to_send .= "-------------------------------".$eol;

        // create the new mailer object and set all the bits and pieces
	    $message = $this->getMailer()->compose();
	    $message->setSubject($subject);
	    $message->setTo(sfConfig::get('app_contact_us_email'));
	    $message->setFrom(sfConfig::get('app_email_from_address'));
	    $message->setBody($message_to_send, 'text/html');

        // send the email and pass back the result to the form to display
        // a nice message to the user
    	if($this->getMailer()->send($message)) {
			return $this->renderText("OK");					
		} else {
			return $this->renderText("ERROR");	
		}  
  	}

 	/**
  	* function executeIndex()
  	* ------------------------
    * display the homepage with the special offers and facebook photos
    *
    * @author Justen Doherty (phpchap@gmail.com)
  	* @param sfWebRequest $request A request object
  	*/
  	public function executeIndex(sfWebRequest $request)
  	{
        // define the number of offers to display on the homepage via app.yml
		$num_offers = sfConfig::get('app_num_offers_homepage');

        // fetch the facebook photos
		$this->photos = FacebookPhotoTable::getFrontpagePhotos();

        // fetch the special offers limited by config
		$this->offers = SpecialOfferTable::getSpecialOffers($num_offers, true);
  	}

    /**
     * function getAjaxPhotos()
     * ------------------------
     * fetch the facebook photos via the facebook graph api
     *
     * @author Justen Doherty (phpchap@gmail.com)
     * @return array JSON encoded list of photos from facebook
     */
	public function getAjaxPhotos()
	{
        // define the fb page id
        $facebook_page_id = sfConfig::get('app_facebook_page_id');

        // fetch the photos
        $photos = $this->facebook->api('/'.$facebook_page_id.'/photos');

        // return JSON encoded list of photos
        $this->renderText(json_encode($photos));
	}

    /**
     * function executeGallery()
     * -------------------------
     * display the gallery page and use symfonys sfDoctrinePager to paginate
     * the photos. there are two ways of fetching the photos, either from the
     * scheduled task or by calling the action which then calls the task.
     *
     * @author Justen Doherty (phpchap@gmail.com)
     * @param sfWebRequest $request
     */
  	public function executeGallery(sfWebRequest $request)
  	{	
        // define how many photos to display
        $num_photos = sfConfig::get('app_num_photos_gallery');

        // instantiate the pager
		$this->pager = new sfDoctrinePager('Photo', $num_photos);

        // fetch the facebook photo images
		$this->pager->getQuery()
                    ->from('FacebookPhoto p')
                    ->where('p.live_in_photos = "1"')
                    ->orderBy('p.updated_at DESC');

        // set the first page
		$this->pager->setPage($this->getRequestParameter('page', 1));

        // initialise the pager
		$this->pager->init();	
  	}

    /**
     * function executeSpecialOffers()
     * -------------------------------
     * fetch all the special offers and display them in the template
     *
     * @author Justen Doherty (phpchap@gmail.com)
     * @param sfWebRequest $request
     */
  	public function executeSpecialOffers(sfWebRequest $request)
  	{
        // fetch the special offers
		$this->offers = SpecialOfferTable::getSpecialOffers();
  	}

    /**
     * function executeTreatments()
     * ----------------------------
     * fetch all the treatments and display them in the template
     *
     * @author Justen Doherty (phpchap@gmail.com)
     * @param sfWebRequest $request
     */
  	public function executeTreatments(sfWebRequest $request)
  	{
        // fetch the treatment groups
		$this->treatment_groups = TreatmentGroupTable::getTreatmentGroups();
  	}

    /**
     * function executeTestimonials()
     * ------------------------------
     * fetch all the testimonials and display them in the template
     *
     * @author Justen Doherty (phpchap@gmail.com)
     * @param sfWebRequest $request
     */
  	public function executeTestimonials(sfWebRequest $request)
  	{
		$this->testimonials = Doctrine_Core::getTable('Testimonial')->getTestimonials();	
  	}

    /**
     * function executeContact()
     * -------------------------
     * fetch the google map and display this on the contact page
     * 
     * @author Justen Doherty (phpchap@gmail.com)
     * @param sfWebRequest $request
     */
  	public function executeContact(sfWebRequest $request)
  	{
        // fetch the google map api
		$path_to_google_api = '/../lib/vendor/GoogleMapAPI-3.0/';
		require_once getcwd().$path_to_google_api.'JSMin.php';		
		require_once getcwd().$path_to_google_api.'GoogleMapAPI.php';

        // instantiate the google maps api
    	$this->map = new GoogleMapAPI('map');
  }
}