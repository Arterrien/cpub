<?php
/**
 * Plugin cpub  pour Spip 3.0
 * Licence GPL
 *
 * 20015
 * Auteurs : peetdu
 */

if (!defined("_ECRIRE_INC_VERSION")) return;


/**
 * {publicite_en_cours}
 * {publicite_en_cours #ENV{date}}
 *
 * @param string $idb
 * @param object $boucles
 * @param object $crit
 */
function critere_publicite_en_cours_dist($idb, &$boucles, $crit) {
	$boucle = &$boucles[$idb];
	$id_table = $boucle->id_table;

	$_dateref = cpub_calculer_date_reference($idb, $boucles, $crit);
	$_date_debut = "$id_table.date_debut";
	$_date_fin = "$id_table.date_fin";

	// si on ne sait pas si les heures comptent, on utilise toute la journee.
	// sinon, on s'appuie sur le champ 'illimite=oui'
	// pour savoir si les dates utilisent les heures ou pas.	
	$where_jour_sans_heure =
		array("'AND'",
			array("'<='", "'$_date_debut'", "sql_quote(date('Y-m-d H:i:59'))"),
			array("'>='", "'$_date_fin'", "sql_quote(date('Y-m-d H:i:00'))")
		);
		
	if (array_key_exists('illimite', $boucle->show['field'])) {
		$where =
			array("'OR'",
				array("'='", "'illimite'", "sql_quote('oui')"),
				array("'AND'",
					array("'!='", "'illimite'", "sql_quote('oui')"),
					$where_jour_sans_heure
				)
			);
	} else {
		$where = $where_jour_sans_heure;
	}

	if ($crit->not)
		$where = array("'NOT'",$where);
	$boucle->where[] = $where;
}

/**
 * Fonction privee pour mutualiser de code des criteres_publicite*
 * Retourne le code php pour obtenir la date de reference de comparaison
 * des evenements a trouver 
 *
 * @param string $idb
 * @param object $boucles
 * @param object $crit
 * 
 * @return string code PHP concernant la date.
**/
function cpub_calculer_date_reference($idb, &$boucles, $crit) {
	if (isset($crit->param[0]))
		return calculer_liste($crit->param[0], array(), $boucles, $boucles[$idb]->id_parent);
	else
		return "date('Y-m-d H:i:00')";
}


?>
