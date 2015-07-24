<?php

namespace UniRest\ZRayModule;

class Module extends \ZRay\ZRayModule {

	public function config() {
        return array(
            // The name defined in ZRayExtension
            'extension' => array(
                'name' => 'unirest',
            ),
            // Prevent those default panels from being displayed
            'defaultPanels' => array(
                'unirest' => false,
            ),
            // configure all custom panels
            'panels' => array(
                'unirestApiTable' => array(
                    'display'           => true,
                    'menuTitle'         => 'UniRest Requests',
                    'panelTitle'    => 'UniRest Requests',
                    'searchId'  => 'unirest-backend-api-table-search',
                    'pagerId'       => 'unirest-backend-api-table-pager',
                )
            )
        );
    }
	
	
	
}
