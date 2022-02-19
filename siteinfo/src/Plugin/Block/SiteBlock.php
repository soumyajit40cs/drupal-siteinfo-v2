<?php

namespace Drupal\siteinfo\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\siteinfo\DatetimeServices;


/** 
 * @Block(
 *  id = "siteinfo_custom_block",
 *  admin_label = @Translation("Site Info Timezone Block"),
 *  category = @Translation("Custom")
 * ) 
 */
 
class SiteBlock extends BlockBase implements ContainerFactoryPluginInterface{
	
	protected $siteinfoserviceProvider;
	
	public function __construct(array $configuration, $plugin_id, $plugin_definition, DatetimeServices $timezone_service) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);

    $this->siteinfoserviceProvider = $timezone_service;
  }
	
	
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('siteinfo.timezone_service')
    );
  }	
	

  public function build(){
    return [
      '#type' => 'markup',
      '#markup' => $this->siteinfoserviceProvider->get_datetime(),
	  '#cache' => [
        'contexts' => [
          'url',
        ],
      ]
    ];
  }
}

?>