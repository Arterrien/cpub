<?php
/**
 * Déclarations relatives à la base de données
 *
 * @plugin     cPublicité
 * @copyright  2016
 * @author     Pierre Miquel
 * @licence    GNU/GPL
 * @package    SPIP\Cpub\Pipelines
 */

if (!defined('_ECRIRE_INC_VERSION')) return;


/**
 * Déclaration des alias de tables et filtres automatiques de champs
 *
 * @pipeline declarer_tables_interfaces
 * @param array $interfaces
 *     Déclarations d'interface pour le compilateur
 * @return array
 *     Déclarations d'interface pour le compilateur
 */
function cpub_declarer_tables_interfaces($interfaces) {

	$interfaces['table_des_tables']['publicites'] = 'publicites';
	$interfaces['table_des_tables']['bannieres'] = 'bannieres';
	$interfaces['table_des_tables']['stats_pubs'] = 'stats_pubs';

	return $interfaces;
}


/**
 * Déclaration des objets éditoriaux
 *
 * @pipeline declarer_tables_objets_sql
 * @param array $tables
 *     Description des tables
 * @return array
 *     Description complétée des tables
 */
function cpub_declarer_tables_objets_sql($tables) {

	$tables['spip_publicites'] = array(
		'type' => 'publicite',
		'principale' => "oui",
		'field'=> array(
			"id_publicite"	=> "bigint(21) NOT NULL",
			"titre"			=> "text NOT NULL DEFAULT ''",
			"annonceur"		=> "varchar(255) NOT NULL DEFAULT ''",
			"iframe"		=> "text NOT NULL DEFAULT ''",
			"banniere"		=> "varchar(200)  DEFAULT '0' NOT NULL",
			"rang"			=> "int(6) NOT NULL",
			"illimite"		=> "varchar(3) NOT NULL DEFAULT 'non'",
			"date_debut"	=> "datetime NOT NULL DEFAULT '0000-00-00 00:00:00'",
			"date_fin"		=> "datetime NOT NULL DEFAULT '0000-00-00 00:00:00'",
			"url_site"		=> "text NOT NULL DEFAULT ''",
			"target"		=> "varchar(3) NOT NULL DEFAULT 'non'",
			"pixel"			=> "text NOT NULL DEFAULT ''",
			"statut"		=> "varchar(20)  DEFAULT '0' NOT NULL", 
			"maj"			=> "TIMESTAMP"
		),
		'key' => array(
			"PRIMARY KEY"	=> "id_publicite",
			"KEY statut"	=> "statut", 
		),
		'titre' => "titre AS titre, '' AS lang",
		 #'date' => "",
		'champs_editables'  => array('titre', 'annonceur', 'iframe', 'banniere', 'rang', 'illimite', 'date_debut', 'date_fin', 'url_site', 'target', 'pixel'),
		'champs_versionnes' => array(),
		'rechercher_champs' => array("titre" => 8, "annonceur" => 5),
		'tables_jointures'  => array(),
		'statut_textes_instituer' => array(
			'prepa'		=> 'cpub:texte_statut_inactive',
			'prop'		=> 'texte_statut_propose_evaluation',
			'publie'	=> 'cpub:texte_statut_active',
			'poubelle'	=> 'texte_statut_poubelle',
		),
		'statut'=> array(
			array(
				'champ'     => 'statut',
				'publie'    => 'publie',
				'previsu'   => 'publie,prop,prepa',
				//'post_date' => 'date', 
				'exception' => array('statut','tout')
			)
		),
		'texte_changer_statut' => 'publicite:texte_changer_statut_publicite', 
		

	);

	$tables['spip_bannieres'] = array(
		'type' => 'banniere',
		'principale' => "oui",
		'field'=> array(
			"id_banniere"        => "bigint(21) NOT NULL",
			"nom"                => "text NOT NULL DEFAULT ''",
			"largeur"            => "int(6) NOT NULL DEFAULT 0",
			"hauteur"            => "int(6) NOT NULL DEFAULT 0",
			"statut"             => "varchar(20)  DEFAULT '0' NOT NULL", 
			"maj"                => "TIMESTAMP"
		),
		'key' => array(
			"PRIMARY KEY"        => "id_banniere",
			"KEY statut"         => "statut", 
		),
		'titre' => "nom AS titre, '' AS lang",
		 #'date' => "",
		'champs_editables'  => array('nom', 'largeur', 'hauteur'),
		'champs_versionnes' => array(),
		'rechercher_champs' => array(),
		'tables_jointures'  => array(),
		'statut_textes_instituer' => array(
			'prepa'    => 'cpub:texte_statut_inactive',
			'publie'   => 'cpub:texte_statut_active',
			'poubelle' => 'texte_statut_poubelle',
		),
		'statut'=> array(
			array(
				'champ'     => 'statut',
				'publie'    => 'publie',
				'previsu'   => 'publie,prop,prepa',
				//'post_date' => 'date', 
				'exception' => array('statut','tout')
			)
		),
		'texte_changer_statut' => 'banniere:texte_changer_statut_banniere', 
		

	);

	return $tables;
}

/**
 * Déclaration des tables secondaires
 *
 * @pipeline declarer_tables_auxiliaires
 * @param array $tables
 *     Description des tables
 * @return array
 *     Description complétée des tables
 */
function cpub_declarer_tables_auxiliaires($tables) {

	$tables['spip_stats_pubs'] = array(
		'field' => array(
			"date"			=> "DATE NOT NULL",
			"id_publicite"	=> "int UNSIGNED NOT NULL",
			"impressions"	=> "int UNSIGNED DEFAULT '0' NOT NULL",
			"clics"			=> "int UNSIGNED DEFAULT '0' NOT NULL",
			"maj"			=> "TIMESTAMP"
		),
		'key' => array(
			"PRIMARY KEY"	=> "date,id_publicite",
			"KEY date"		=> "date"
		)
	);

	return $tables;
}

function cpub_pre_insertion($flux) {
	if ($flux['args']['table'] == 'spip_bannieres') {
		$flux['data']['statut'] = 'publie';
	}
	return $flux;
}


?>