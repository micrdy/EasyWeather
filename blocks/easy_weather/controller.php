<?php
namespace Concrete\Package\EasyWeather\Block\EasyWeather;

use \Concrete\Core\Block\BlockController;
use Loader;

class Controller extends BlockController {
	
	protected $btTable = "btEasyWeather";
	protected $btInterfaceWidth = "370";
	protected $btInterfaceHeight = "400";

	public function getBlockTypeName() {
		return t('Easy Weather');
	}

	public function getBlockTypeDescription() {
		return t('A Block for viewing the current weather at a given location');
	}
    
	public function on_page_view() {
		// add library
		$html = Loader::helper('html');
		$this->addFooterItem($html->javascript('jquery.simpleWeather.min.js', 'easy_weather'));
		$this->addHeaderItem($html->css('easyWeather.css', 'easy_weather'));
	}
	
	public function validate($args) {
        $e = Loader::helper('validation/error');
        if (!$args['location']) {
            $e->add(t('Location cannot be empty.'));
        }
        if (!$args['size']) {
            $e->add(t('Size cannot be empty.'));
        }
        if(is_numeric($args["size"])){
        	if($args["size"] < 0){
        		$e->add(t('Size needs to be positive.'));
        	}
        }else{
        	$e->add(t('Size is not a number.'));
        }
        if($args["size"] > 999){
        	$e->add(t('Size should have max 999.'));
        }
        if(strlen($args['location']) >= 160){
        	$e->add(t('Location too long.'));
        }
        return $e;
    }
    
    public function save($args){
		$args["showLocation"] = isset($args["showLocation"]) ? 1 : 0;
		parent::save($args);
	}
}
