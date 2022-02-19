<?php

namespace Drupal\siteinfo\Routing;

use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

class RouteSubscriber extends RouteSubscriberBase {

  protected function alterRoutes(RouteCollection $collection) {
    if ($route = $collection->get('system.site_information_settings')){ 
      $route->setDefault('_form', 'Drupal\siteinfo\Form\ExtendedSiteInformation');
	}
  }

}

