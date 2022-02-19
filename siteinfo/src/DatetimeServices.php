<?php



namespace  Drupal\siteinfo;

class DatetimeServices {

  protected $say_something;

  public function __construct() {
    
  }

  
  public function get_datetime(){
	
	$temp_date = new \Drupal\Core\Datetime\DrupalDateTime();
	$config = \Drupal::config('system.site');
	return $timezone_date = \Drupal::service('date.formatter')->format(strtotime($temp_date), 'custom', 'dS M Y g:i a', $config->get('timezone'));
	  
  }

}