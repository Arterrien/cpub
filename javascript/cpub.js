(function($){
	
	// Tableau des pubs de la page chargées
	// par document.load ou ajax.load
	var registeredPubs = [];
		
	// URL des requêtes ajax
	var ajaxUrl = "spip.php?page=action_stats";
	
	// initialisation du script
	function init(){
		if($('.cpub').length){
			_.each($('.cpub'), function(pub){
				registerPub(pub);
			});
		}
	}
	
	// Enregistrement de l'encart dans 
	// la liste des pubs de la page
	// @ el : element html de la pub à enregistrer
	function registerPub(el){
		
		// Si la pub est déjà enregitrée on fait rien
		if(isRegistered(el.getAttribute('data-id'))){
			return;
		}
		
		// Création de lobjet pub pour le suivi
		var p = {
			id: el.getAttribute('data-id'),
			isClicked: false,
			isShown: false,
			element: el,
			image: document.getElementById('pub_' + el.getAttribute('data-id'))
		};
		
		// Écouter les impressions
		// (affichages de la publicité)
		registerImpressions(p);
		
		// Écouter les clics
		addClickCounter(p);
		
		// Enregistrement
		registeredPubs.push(p);
	}
	
	// Écouter les clics de la pub
	// @pubObject: Objet représentant la pub
	function addClickCounter(pubObject){
		$('.cpub[data-id="' + pubObject.id + '"]').on('click', function(event){
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
			// Si click tracking, appel de l'url de tracking
			if(pubObject.element.getAttribute('data-click-tracker')){
				$.ajax({
					method: 'GET',
					url: pubObject.element.getAttribute('data-click-tracker')
				});
			}
		});
	}
	
	// enregistrer une impression
	// si au moins 70% de la pub
	// est dans le viewport
	// @p : Objet représentant la pub
	function registerImpressions(p){

		if(!p.isShown && $('[data-id="' + p.id + '"]').isOnScreen(0.9, 0.9)){
			$.ajax({
				method:'POST',
				url: ajaxUrl,
				data:{id: p.id, type_stat:'impressions'}
			});
			// Enregistrement de l'impression
			// pour cette pub
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
		if($(jqxhr.responseText).find('.cpub')[0]){
			registerPub($(jqxhr.responseText).find('.cpub')[0]);
		}
	});
	
	// Ecouter le scroll et vérifier si la pub est affichée
	$(window).on('scroll', _.debounce(function(){
		_.each(registeredPubs, function(pub){
			registerImpressions(pub);
		});
	}, 300));

})(jQuery);
