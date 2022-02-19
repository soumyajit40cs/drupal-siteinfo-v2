<?php



namespace Drupal\siteinfo\Plugin\Block;

use Drupal\Core\Block\BlockBase;


/**
 * below section is important
 * 
 * @Block(
 *  id = "my_custom_block",
 *  admin_label = @Translation("My Custom Block"),
 *  category = @Translation("Custom")
 * ) 
 */
 
class CustomBlock extends BlockBase{
  public function build(){
    return [
      '#type' => 'markup',
      '#markup' => $this->t("Here is my custom block content")
    ];
  }
}

?>