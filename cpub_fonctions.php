<?php
/**
 * Fonctions utiles au plugin cPublicité
 *
 * @plugin     cPublicité
 * @copyright  2016
 * @author     Pierre Miquel
 * @licence    GNU/GPL
 * @package    SPIP\Cpub\Fonctions
 */

if (!defined('_ECRIRE_INC_VERSION')) return;

include_spip('public/cpub');

/**
 * Enregistrement des statistiques
 *
 * @param int $id_pub
 *     Identifiant de la publicité
 * @param string $type_stat
 *    valeurs possibles : impressions|clics
 */
function ajouter_stat($id_pub, $type_stat){
	$date = date('Y-m-d');
	sql_query("INSERT INTO spip_stats_pubs (date, id_publicite, $type_stat) VALUES(".sql_quote($date).",".sql_quote($id_pub).",1) ON DUPLICATE KEY UPDATE    
$type_stat=$type_stat+1");
	return 'ok';
}

/**
 * Calcul du total des impressions/clics pour une publicité
 *
 * @param int $id_pub
 *     Identifiant de la publicité
 * @param string $type_stat
 *    valeurs possibles : impressions|clics
 * @return int
 */
function total_stats($id_pub, $type_stat){
	$total = 0;
	$res = sql_select($type_stat, 'spip_stats_pubs', 'id_publicite='.intval($id_pub));
	while ($r = sql_fetch($res)) {
		$total = $total + $r[$type_stat];
	}
	return $total;
}

?>