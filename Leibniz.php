<?php

$wgExtensionCredits['specialpage'][] = array(
	'path'           => __FILE__,
	'name'           => 'Leibniz',
	'version'        => '0.9',
	'author'         => '',
	'url'            => 'https://www.mediawiki.org/wiki/Extension:Leibniz',
	'description' => 'Integrates the SVG-Edit and Flint tools into the Wiki environment'
);

$wgAutoloadClasses['LeibnizHooks'] = dirname( __FILE__ ) . '/Leibniz.hooks.php';
$wgHooks['BeforePageDisplay'][] = 'LeibnizHooks::beforePageDisplay';

$wgAutoloadClasses['SpecialLeibniz'] = __DIR__ . '/SpecialLeibniz.php'; # Location of the SpecialMyExtension class (Tell MediaWiki to load this file)
$wgMessagesDirs['Leibniz'] = __DIR__ . "/i18n"; # Location of localisation files (Tell MediaWiki to load them)
$wgExtensionMessagesFiles['LeibnizAlias'] = __DIR__ . '/Leibniz.alias.php'; # Location of an aliases file (Tell MediaWiki to load it)
$wgSpecialPages['Leibniz'] = 'SpecialLeibniz'; # Tell MediaWiki about the new special page and its class name


$leibnizModules = array(
	'localBasePath' => dirname( __FILE__ ) . '/modules',
	'remoteExtPath' => 'Leibniz/modules',
	'group' => 'ext.leibniz',
);

$wgResourceModules += array(
	'ext.leibniz.editButton' => $leibnizModules + array(
		'scripts' => array(
			'ext.leibniz.editButton.js',
		)
	)
);
