$(function(){
	
	// Tableau des pubs actuellement chargées
	// par document.load ou ajax.load
	var registeredPubs = [];
	
	// URL des requêtes ajax
	var ajaxUrl = "spip.php?page=action_stats";
	
	// initialisation du script
	function init(){
		if($('.cpub').length){
			_.each($('.cpub'), function(pub){
				if(!isRegistered(pub.getAttribute('data-id'))){
					registerPub(pub);
				}
			});
		}
	}
	
	// Enregistrement de l'encart dans 
	// la liste des pubs chargées
	// @ pub : DOM de la pub concernée
	function registerPub(pub){
		// Création de lobjet pub pour le suivi
		var p = {
			id: pub.getAttribute('data-id'),
			isClicked: false,
			isShown: false,
			dom: pub
		};
		
		// Enregistrer les impressions
		// (affichages de la publicité)
		registerImpressions(p);
		
		// Enregistrer les clics
		addClicCounter(p);
		
		// Enregistrement
		registeredPubs.push(p);
	}
	
	// Écouter les clics de la pub
	// @pubObject: Objet représentant la pub
	function addClicCounter(pubObject){
		$(pubObject.dom).on('click', function(event){
			// Si la pub ne vient pas d'être cliquée
			// (elle n'a pas la classe clicked
			if(!pubObject.isClicked){
				// On change son état en ajoutant
				// la classe clicked
				pubObject.isClicked = true;
				// On peut enregistrer le click
				$.ajax({
					method:'POST',
					url: ajaxUrl,
					data:{id: pubObject.id, type_stat:'clics'}
				});
				// Sinon on attend un peu (3 secondes)
				setTimeout(function() {
					// et on supprime la classe clicked
					pubObject.isClicked = false;
				}, 3000);
			}
		});
	}
	
	// enregistrer une impression
	// @p : Objet représentant la pub
	function registerImpressions(p){
		if(!p.isShown && $(p.dom).visible()){
			$.ajax({
				method:'POST',
				url: ajaxUrl,
				data:{id: p.id, type_stat:'impressions'}
			});
			// l'impression de la pub est désormais enregistrée
			p.isShown = true;
		}
	}
	
	// Est-ce que cette pub est déjà enregistrée ?
	function isRegistered(id){
		
		var registered = false;
		
		_.each(registeredPubs, function(p){
			if(p.id === id) registered = true;
		});
		
		return registered;
	}
	
	/* ---------------- ECOUTEURS -------------- */
	
	// Lancement du script au chargement de la page
	$(window).load(function(){
		init();
	});
	
	// Lancement du script à la fin d'une requête ajax
	$(document).ajaxComplete(function(event, jqxhr, options){
		if(jqxhr.responseText.indexOf('cpub') > 0){
			init();
		}
	});
	
	// Ecouter le scroll et vérifier si la pub est affichées
	$(window).on('scroll', _.debounce(function(){
		_.each(registeredPubs, function(pub){
			registerImpressions(pub);
		});
	}, 300));

}());
