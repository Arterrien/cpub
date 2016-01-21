<?php

/**
 *  Fichier généré par la Fabrique de plugin v5
 *   le 2016-01-03 22:12:06
 *
 *  Ce fichier de sauvegarde peut servir à recréer
 *  votre plugin avec le plugin «Fabrique» qui a servi à le créer.
 *
 *  Bien évidemment, les modifications apportées ultérieurement
 *  par vos soins dans le code de ce plugin généré
 *  NE SERONT PAS connues du plugin «Fabrique» et ne pourront pas
 *  être recréées par lui !
 *
 *  La «Fabrique» ne pourra que régénerer le code de base du plugin
 *  avec les informations dont il dispose.
 *
**/

if (!defined("_ECRIRE_INC_VERSION")) return;

$data = array (
  'fabrique' => 
  array (
    'version' => 5,
  ),
  'paquet' => 
  array (
    'nom' => 'cPublicité',
    'slogan' => 'Gestion des publicités',
    'description' => '',
    'prefixe' => 'cpub',
    'version' => '1.0.0',
    'auteur' => 'Pierre Miquel',
    'auteur_lien' => '',
    'licence' => 'GNU/GPL',
    'categorie' => 'multimedia',
    'etat' => 'dev',
    'compatibilite' => '[3.0.21;3.0.*]',
    'documentation' => '',
    'administrations' => 'on',
    'schema' => '1.0.0',
    'formulaire_config' => 'on',
    'formulaire_config_titre' => '',
    'fichiers' => 
    array (
      0 => 'autorisations',
      1 => 'fonctions',
      2 => 'options',
      3 => 'pipelines',
    ),
    'inserer' => 
    array (
      'paquet' => '',
      'administrations' => 
      array (
        'maj' => '',
        'desinstallation' => '',
        'fin' => '',
      ),
      'base' => 
      array (
        'tables' => 
        array (
          'fin' => '',
        ),
      ),
    ),
    'scripts' => 
    array (
      'pre_copie' => '',
      'post_creation' => '',
    ),
    'exemples' => '',
  ),
  'objets' => 
  array (
    0 => 
    array (
      'nom' => 'Publicités',
      'nom_singulier' => 'Publicité',
      'genre' => 'feminin',
      'logo_variantes' => '',
      'table' => 'spip_publicites',
      'cle_primaire' => 'id_publicite',
      'cle_primaire_sql' => 'bigint(21) NOT NULL',
      'table_type' => 'publicite',
      'champs' => 
      array (
        0 => 
        array (
          'nom' => 'Titre',
          'champ' => 'titre',
          'sql' => 'text NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'obligatoire',
          ),
          'recherche' => '8',
          'saisie' => 'input',
          'explication' => '',
          'saisie_options' => '',
        ),
        1 => 
        array (
          'nom' => 'Annonceur',
          'champ' => 'annonceur',
          'sql' => 'varchar(255) NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
          ),
          'recherche' => '5',
          'saisie' => 'input',
          'explication' => '',
          'saisie_options' => '',
        ),
        2 => 
        array (
          'nom' => 'Iframe',
          'champ' => 'iframe',
          'sql' => 'text NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
          ),
          'recherche' => '',
          'saisie' => 'textarea',
          'explication' => '',
          'saisie_options' => 'li_class=haut, rows=3',
        ),
        3 => 
        array (
          'nom' => 'Illimité',
          'champ' => 'illimite',
          'sql' => 'varchar(3) NOT NULL DEFAULT \'non\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
          ),
          'recherche' => '',
          'saisie' => 'radio',
          'explication' => '',
          'saisie_options' => 'datas=[(#ARRAY{oui,Oui,non,Non})]',
        ),
        4 => 
        array (
          'nom' => 'Date de début',
          'champ' => 'date_debut',
          'sql' => 'datetime NOT NULL DEFAULT \'0000-00-00 00:00:00\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
          ),
          'recherche' => '',
          'saisie' => 'date',
          'explication' => '',
          'saisie_options' => 'horaire=oui',
        ),
        5 => 
        array (
          'nom' => 'Date de fin',
          'champ' => 'date_fin',
          'sql' => 'datetime NOT NULL DEFAULT \'0000-00-00 00:00:00\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
          ),
          'recherche' => '',
          'saisie' => 'date',
          'explication' => '',
          'saisie_options' => 'horaire=oui',
        ),
        6 => 
        array (
          'nom' => 'Url de redirection',
          'champ' => 'url_site',
          'sql' => 'text NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
          ),
          'recherche' => '',
          'saisie' => 'input',
          'explication' => 'Ce peut être une page du site ou un site externe',
          'saisie_options' => '',
        ),
        7 => 
        array (
          'nom' => 'Target',
          'champ' => 'target',
          'sql' => 'varchar(3) NOT NULL DEFAULT \'non\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
          ),
          'recherche' => '',
          'saisie' => 'radio',
          'explication' => '',
          'saisie_options' => 'datas=[(#ARRAY{oui,Oui,non,Non})]',
        ),
        8 => 
        array (
          'nom' => 'Pixel tracking',
          'champ' => 'pixel',
          'sql' => 'text NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
          ),
          'recherche' => '',
          'saisie' => 'input',
          'explication' => '',
          'saisie_options' => '',
        ),
      ),
      'champ_titre' => 'titre',
      'champ_date' => '',
      'statut' => 'on',
      'chaines' => 
      array (
        'titre_objets' => 'Publicités',
        'titre_objet' => 'Publicité',
        'info_aucun_objet' => 'Aucune publicité',
        'info_1_objet' => 'Une publicité',
        'info_nb_objets' => '@nb@ publicités',
        'icone_creer_objet' => 'Créer une publicité',
        'icone_modifier_objet' => 'Modifier cette publicité',
        'titre_logo_objet' => 'Logo de cette publicité',
        'titre_langue_objet' => 'Langue de cette publicité',
        'texte_definir_comme_traduction_objet' => 'Cette publicité est une traduction de la publicité numéro :',
        'titre_objets_rubrique' => 'Publicités de la rubrique',
        'info_objets_auteur' => 'Les publicités de cet auteur',
        'retirer_lien_objet' => 'Retirer cette publicité',
        'retirer_tous_liens_objets' => 'Retirer toutes les publicités',
        'ajouter_lien_objet' => 'Ajouter cette publicité',
        'texte_ajouter_objet' => 'Ajouter une publicité',
        'texte_creer_associer_objet' => 'Créer et associer une publicité',
        'texte_changer_statut_objet' => 'Cette publicité est :',
      ),
      'table_liens' => '',
      'roles' => '',
      'auteurs_liens' => '',
      'vue_auteurs_liens' => '',
      'echafaudages' => 
      array (
        0 => 'prive/squelettes/contenu/objets.html',
        1 => 'prive/objets/infos/objet.html',
        2 => 'prive/squelettes/contenu/objet.html',
      ),
      'autorisations' => 
      array (
        'objet_creer' => 'administrateur_restreint',
        'objet_voir' => '',
        'objet_modifier' => 'administrateur_restreint',
        'objet_supprimer' => 'administrateur_restreint',
        'associerobjet' => '',
      ),
      'boutons' => 
      array (
        0 => 'menu_edition',
        1 => 'outils_rapides',
      ),
    ),
    1 => 
    array (
      'nom' => 'Bannières',
      'nom_singulier' => 'Bannière',
      'genre' => 'feminin',
      'logo_variantes' => '',
      'table' => 'spip_bannieres',
      'cle_primaire' => 'id_banniere',
      'cle_primaire_sql' => 'bigint(21) NOT NULL',
      'table_type' => 'banniere',
      'champs' => 
      array (
        0 => 
        array (
          'nom' => 'Nom',
          'champ' => 'nom',
          'sql' => 'text NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'obligatoire',
          ),
          'recherche' => '',
          'saisie' => 'input',
          'explication' => '',
          'saisie_options' => '',
        ),
        1 => 
        array (
          'nom' => 'Largeur',
          'champ' => 'largeur',
          'sql' => 'int(6) NOT NULL DEFAULT 0',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'obligatoire',
          ),
          'recherche' => '',
          'saisie' => 'input',
          'explication' => '',
          'saisie_options' => '',
        ),
        2 => 
        array (
          'nom' => 'Hauteur',
          'champ' => 'hauteur',
          'sql' => 'int(6) NOT NULL DEFAULT 0',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'obligatoire',
          ),
          'recherche' => '',
          'saisie' => 'input',
          'explication' => '',
          'saisie_options' => '',
        ),
      ),
      'champ_titre' => 'nom',
      'champ_date' => '',
      'statut' => 'on',
      'chaines' => 
      array (
        'titre_objets' => 'Bannières',
        'titre_objet' => 'Bannière',
        'info_aucun_objet' => 'Aucune bannière',
        'info_1_objet' => 'Une bannière',
        'info_nb_objets' => '@nb@ bannières',
        'icone_creer_objet' => 'Créer une bannière',
        'icone_modifier_objet' => 'Modifier cette bannière',
        'titre_logo_objet' => 'Logo de cette bannière',
        'titre_langue_objet' => 'Langue de cette bannière',
        'texte_definir_comme_traduction_objet' => 'Cette bannière est une traduction de la bannière numéro :',
        'titre_objets_rubrique' => 'Bannières de la rubrique',
        'info_objets_auteur' => 'Les bannières de cet auteur',
        'retirer_lien_objet' => 'Retirer cette bannière',
        'retirer_tous_liens_objets' => 'Retirer toutes les bannières',
        'ajouter_lien_objet' => 'Ajouter cette bannière',
        'texte_ajouter_objet' => 'Ajouter une bannière',
        'texte_creer_associer_objet' => 'Créer et associer une bannière',
        'texte_changer_statut_objet' => 'Cette bannière est :',
      ),
      'table_liens' => '',
      'roles' => '',
      'auteurs_liens' => '',
      'vue_auteurs_liens' => '',
      'echafaudages' => 
      array (
        0 => 'prive/squelettes/contenu/objets.html',
        1 => 'prive/squelettes/contenu/objet.html',
      ),
      'autorisations' => 
      array (
        'objet_creer' => 'administrateur_restreint',
        'objet_voir' => '',
        'objet_modifier' => 'administrateur_restreint',
        'objet_supprimer' => 'administrateur_restreint',
        'associerobjet' => '',
      ),
    ),
  ),
  'images' => 
  array (
    'paquet' => 
    array (
      'logo' => 
      array (
        0 => 
        array (
          'extension' => 'png',
          'contenu' => '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',
        ),
      ),
    ),
    'objets' => 
    array (
      0 => 
      array (
      ),
      1 => 
      array (
      ),
    ),
  ),
);

?>