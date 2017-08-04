<?php
/**
 * Home controller
 */

namespace App\Controllers;

use \Core\View;

/**
 * Class Home
 * @package App\Controllers
 */

class Home extends \Core\Controller
{
	#region Properties
	// if country is not in the list - default advertiser will be selected
	private $defaultAdvertiser;
	// if no category, or wrong category provided - default category will be selected
	private $defaultCategory;
	private $countryAdvertisers;
	private $advertiserLinks;
	private $countryCode;
	#endregion
	
	public function __construct($route_params = NULL) {
		parent::__construct($route_params);
		
		$this->defaultAdvertiser = 'Advertiser1';
		
		$this->defaultCategory = 'soccer';
		
		$this->countryAdvertisers = [
			'us' => 'Advertiser1',
			'uk' => 'Advertiser2',
			'ca' => 'Advertiser3',
		];
		
		$this->advertiserLinks = [
			'Advertiser1' => [
				'soccer' => [
					'link1'=>'http://advertiser1/soccer/bet/?t=[TITLE]',
					'link2'=>'http://advertiser1/soccer/video/?t=[TITLE]',
				],
				'tennis' => [
					'link1'=>'http://advertiser1/tennis/bet/?t=[TITLE]',
					'link2'=>'http://advertiser1/tennis/video/?t=[TITLE]',
				],
				'hockey' => [
					'link1'=>'http://advertiser1/hockey/bet/?t=[TITLE]',
					'link2'=>'http://advertiser1/hockey/video/?t=[TITLE]',
				],
				
				'box' => [
					'link1'=>'http://advertiser1/box/bet/?t=[TITLE]',
					'link2'=>'http://advertiser1/box/video/?t=[TITLE]',
				]
			],
			'Advertiser2' => [
				'soccer' => [
					'link1'=>'http://advertiser2/soccer/bet/?t=[TITLE]',
					'link2'=>'http://advertiser2/soccer/video/?t=[TITLE]',
				],
				'tennis' => [
					'link1'=>'http://advertiser2/tennis/bet/?t=[TITLE]',
					'link2'=>'http://advertiser2/tennis/video/?t=[TITLE]',
				],
				'hockey' => [
					'link1'=>'http://advertiser2/hockey/bet/?t=[TITLE]',
					'link2'=>'http://advertiser2/hockey/video/?t=[TITLE]',
				],
			],
			'Advertiser3' => [
				'soccer' => [
					'link1'=>'http://advertiser3/soccer/bet/?t=[TITLE]',
					'link2'=>'http://advertiser3/soccer/video/?t=[TITLE]',
				],
				'tennis' => [
					'link1'=>'http://advertiser3/tennis/bet/?t=[TITLE]',
					'link2'=>'http://advertiser3/tennis/video/?t=[TITLE]',
				],
				'hockey' => [
					'link1'=>'http://advertiser3/hockey/bet/?t=[TITLE]',
					'link2'=>'http://advertiser3/hockey/video/?t=[TITLE]',
				],
			],
		];
		
		$this->countryCode = 'us';
	}
	
	#region Main Methods
	/**
	 * Show index page for Home controller.
	 * @return void
	 */
	public function indexAction()
	{
		$title = $_REQUEST['t'];
		
		$category = $this->validateCategory($_REQUEST['c']);
		
		if($category == false){
			$category = $this->defaultCategory;
		}
		
		$currentAdvertiser = $this->advertiserSelection($this->countryCode);
		
		if(isset($this->advertiserLinks[$currentAdvertiser][$category])){
			$topMenuLinks = $this->getMenuLinksForPreciseAdvertiser($currentAdvertiser);
			$links = $this->advertiserLinks[$currentAdvertiser][$category];
			$links = $this->addTitleToLink($links, $title);
			View::render('.home.index',[
				'buttonLinks'=> $links,
				'menuLinks'=>$topMenuLinks]);
		}else{
			$this->redirectToIndexWithNoTitleAndDefaultCategory();
		}

	}
	#endregion
	
	#region Service Mathod
	private function validateCategory($requestCategory)
	{
		foreach ($this->advertiserLinks AS $advertiser=>$linksArray)
		{
			if(array_key_exists($requestCategory,$linksArray)){
				return $requestCategory;
			}
		}
		return false;
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
	
	private function addTitleToLink($links, $title)
	{
		foreach ($links AS $key=>$link)
		{
			$links[$key] = str_replace('[TITLE]',$title,$link);
		}
		return $links;
	}
	
	private function getMenuLinksForPreciseAdvertiser($currentAdvertiser)
	{
		if(isset($this->advertiserLinks[$currentAdvertiser])){
			return array_keys($this->advertiserLinks[$currentAdvertiser]);
		}
	}
	
	private function redirectToIndexWithNoTitleAndDefaultCategory()
	{
		header("Location: /");
		die();
	}
	
	/**
	 * Before filter.
	 * @return void
	 */
	protected function before()
	{
		if(!isset($_REQUEST['t'])){
			$_REQUEST['t'] = null;
		}
		
		if(!isset($_REQUEST['c'])){
			$_REQUEST['c'] = $this->defaultCategory;
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