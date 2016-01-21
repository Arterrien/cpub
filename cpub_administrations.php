<?php
/**
 * Fichier gérant l'installation et désinstallation du plugin cPublicité
 *
 * @plugin     cPublicité
 * @copyright  2016
 * @author     Pierre Miquel
 * @licence    GNU/GPL
 * @package    SPIP\Cpub\Installation
 */

if (!defined('_ECRIRE_INC_VERSION')) return;


/**
 * Fonction d'installation et de mise à jour du plugin cPublicité.
 *
 * @param string $nom_meta_base_version
 *     Nom de la meta informant de la version du schéma de données du plugin installé dans SPIP
 * @param string $version_cible
 *     Version du schéma de données dans ce plugin (déclaré dans paquet.xml)
 * @return void
**/
function cpub_upgrade($nom_meta_base_version, $version_cible) {
	$maj = array();

	$maj['create'] = array(array('maj_tables', array('spip_publicites', 'spip_bannieres', 'spip_stats_pubs')));

	include_spip('base/upgrade');
	maj_plugin($nom_meta_base_version, $version_cible, $maj);
}


/**
 * Fonction de désinstallation du plugin cPublicité.
 *
 * @param string $nom_meta_base_version
 *     Nom de la meta informant de la version du schéma de données du plugin installé dans SPIP
 * @return void
**/
function cpub_vider_tables($nom_meta_base_version) {

	sql_drop_table("spip_publicites");
	sql_drop_table("spip_bannieres");
	sql_drop_table("spip_stats_pubs");

	# Nettoyer les versionnages et forums
	sql_delete("spip_versions",              sql_in("objet", array('publicite', 'banniere')));
	sql_delete("spip_versions_fragments",    sql_in("objet", array('publicite', 'banniere')));
	sql_delete("spip_forum",                 sql_in("objet", array('publicite', 'banniere')));

	effacer_meta($nom_meta_base_version);
}

?>