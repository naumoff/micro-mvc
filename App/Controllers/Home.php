<?php
/**
 * Home controller
 */

namespace App\Controllers;

use \App\Helpers;
use \Core\View;

/**
 * Class Home
 * @package App\Controllers
 */

class Home extends \Core\Controller
{
	use Helpers\ProcessInput;
	
	#region Properties
	// if country is not in the list - default advertiser will be selected
	private $defaultAdvertiser;
	private $countryAdvertisers;
	private $countryCode;
	private $categories;
	private $streamingLink;
	private $betLink;
	private $topMenuLinks;
	
	#endregion
	
	public function __construct($route_params = NULL) {
		parent::__construct($route_params);
		
		$this->defaultAdvertiser = 'Advertiser1';
		
		$this->countryAdvertisers = [
			'us' => 'Advertiser1',
			'uk' => 'Advertiser2',
			'ca' => 'Advertiser3',
		];
		
		$this->categories = [
			'box',
			'hockey',
			'football',
			'tennis'
		];
		
		$this->topMenuLinks = $this->getTopMenuLinks();
		
		$this->streamingLink = 'http://streaming.com';
		
		$this->betLink = 'http://bet.com';
		
		$this->countryCode = 'ca';
	}
	
	#region Main Methods
	/**
	 * Show index page for Home controller.
	 * @return void
	 */
	public function indexAction() {
		
		$currentAdvertiser = $this->advertiserSelection($this->countryCode);
		
		$title = $_REQUEST['t'];
		
		$category = $this->validateCategory($_REQUEST['c']);

		
		if ($category === FALSE && $title === FALSE) {
			// load default view with no active top menu link
			$this->viewPage('home.advertisers.default');
		}elseif ($category !== FALSE && $title === FALSE){
			// load default view with active top menu link
			$this->viewPage('home.advertisers.default');
		}else{
			// load top menu link with title - advertiser page
			$this->viewPage("home.advertisers.{$currentAdvertiser}");
		}


	}
	#endregion
	
	#region Service Mathod
	private function validateCategory($requestCategory)
	{
		if($requestCategory === false){
			return false;
		}elseif (in_array($requestCategory, $this->categories)){
			return $requestCategory;
		}else{
			return false;
		}
	}
	
	private function advertiserSelection($userCountryCode)
	{
		foreach ($this->countryAdvertisers AS $countryCode=>$advertiser){
			if($userCountryCode == $countryCode){
				return $advertiser;
			}
		}
		
		return $this->defaultAdvertiser;
	}
	
	private function getTopMenuLinks()
	{
		if(isset($this->categories)){
			$topMenuLinks = [];
			foreach ($this->categories AS $category){
				$topMenuLinks[$category] = $category;
			}
			return $topMenuLinks;
		}else{
			return false;
		}
	}
	
	private function viewPage($path,$data = null)
	{
		View::render($path,[
			'buttonLinks'=> [
				'bet' => $this->betLink,
				'watch' => $this->streamingLink
			],
			'menuLinks'=>$this->topMenuLinks,
			'data'=>$data]);
	}
	
	private function addTitleToLink($links, $title)
	{
		foreach ($links AS $key=>$link)
		{
			$links[$key] = str_replace('[TITLE]',$title,$link);
		}
		return $links;
	}
	
	/**
	 * Before filter.
	 * @return void
	 */
	protected function before()
	{
		if(!isset($_REQUEST['t'])){
			$_REQUEST['t'] = false;
		}else{
			$_REQUEST['t'] = $this->processString($_REQUEST['t']);
		}
		
		if(!isset($_REQUEST['c'])){
			$_REQUEST['c'] = false;
		}else{
			$_REQUEST['c'] = $this->processString($_REQUEST['c']);
		}
	}
	
	/**
	 * After filter
	 * @return void
	 */
	protected function after()
	{
	
	}
	
	#endregion
}