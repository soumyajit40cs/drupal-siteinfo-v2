<?php

namespace Drupal\siteinfo\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\system\Form\SiteInformationForm;


class ExtendedSiteInformation extends SiteInformationForm {
 
	  public function buildForm(array $form, FormStateInterface $form_state) {
		$site_config = $this->config('system.site');
		$form =  parent::buildForm($form, $form_state);
		$form['site_information']['country'] = [
			'#type' => 'textfield',
			'#title' => t('Country'),
			'#default_value' => $site_config->get('country') ?: 'N/A',
		];
		
		$form['site_information']['city'] = [
			'#type' => 'textfield',
			'#title' => t('City'),
			'#default_value' => $site_config->get('city') ?: 'N/A',
		];
		
		$form['site_information']['timezone'] = [
			'#type' => 'select',
			'#title' => $this->t('Timezone'),
			'#options' => [
					'America/Chicago' => $this->t('America/Chicago'),
					'America/New_York' => $this->t('America/New_York'),
					'Asia/Tokyo' => $this->t('Asia/Tokyo'),
					'Asia/Dubai' => $this->t('Asia/Dubai'),
					'Asia/Kolkata' => $this->t('Asia/Kolkata'),
					'Europe/Amsterdam' => $this->t('Europe/Amsterdam'),
					'Europe/Oslo' => $this->t('Europe/Oslo'),
					'Europe/London' => $this->t('Europe/London'),
			],
			'#empty_option' => $this->t('-select-'),
			'#default_value' => $site_config->get('timezone'),
		];
		
		/* if($site_config->get('siteapikey')==''){
			$form['actions']['submit']['#value'] = t('Save configuration');
		}else{
			$form['actions']['submit']['#value'] = t('Update Configuration');
		} */
		
		return $form;
	}
	
	  public function submitForm(array &$form, FormStateInterface $form_state) {
		$this->config('system.site')
		  ->set('country', $form_state->getValue('country'))
		  ->set('city', $form_state->getValue('city'))
		  ->set('timezone', $form_state->getValue('timezone'))
		  ->save();
		parent::submitForm($form, $form_state);
		/* if($form_state->getValue('siteapikey')!='No API Key yet'){
			\Drupal::messenger()->addMessage(t('Site API Key has been saved with that value:'.$form_state->getValue('siteapikey')), 'status');
		} */
	  }
}
