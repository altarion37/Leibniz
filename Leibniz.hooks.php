<?php	

class LeibnizHooks {

	public static function beforePageDisplay( $out, $skin ) {

		$title = $out->getTitle();
		$modules = array();
		// basePath = mw.config.get( 'wgExtensionAssetsPath', '' );

		if(strpos($title, "im")){
			// echo "Yessssssss!";			
			$modules[] = 'ext.leibniz.editButton';
		}

		if ($modules) {
			$out->addModules($modules);
		}
		return true;

	}

}

