<?php
/**
 * Utilisations de pipelines par cPublicité
 *
 * @plugin     cPublicité
 * @copyright  2016
 * @author     Pierre Miquel
 * @licence    GNU/GPL
 * @package    SPIP\Cpub\Pipelines
 */

if (!defined('_ECRIRE_INC_VERSION')) return;
	

/**
 * Optimiser la base de données en supprimant les liens orphelins
 * de l'objet vers quelqu'un et de quelqu'un vers l'objet.
 *
 * @pipeline optimiser_base_disparus
 * @param  array $flux Données du pipeline
 * @return array       Données du pipeline
 */
function cpub_optimiser_base_disparus($flux){
	$mydate = $flux['args']['date'];
	sql_delete("spip_publicites", "statut='poubelle' AND maj < $mydate");
	sql_delete("spip_bannieres", "statut='poubelle' AND maj < $mydate");
	
	return $flux;
}

// Calcule et insere le javascript necessaire pour la page
function cpub_insert_head($flux){
	$js =
	'<script type="text/javascript" src="'
	. find_in_path('javascript/jquery.visible.min.js')
	. '"></script>'
	. "\n";
	
	return $flux.$js;
}


?>