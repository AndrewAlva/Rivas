jQuery(document).ready(function($) {

	
	// SERVICES INTERACTION
		$('#toggleCont').click(function() {
			$('#infoCont').addClass('showService');
			
			$('#infoFis').removeClass('showService');
			$('#infoNom').removeClass('showService');
			$('#infoLeg').removeClass('showService');

		});


		$('#toggleFis').click(function() {
			$('#infoFis').addClass('showService');
			
			$('#infoCont').removeClass('showService');
			$('#infoNom').removeClass('showService');
			$('#infoLeg').removeClass('showService');

		});


		$('#toggleNom').click(function(event) {
			$('#infoNom').addClass('showService');
			
			$('#infoFis').removeClass('showService');
			$('#infoCont').removeClass('showService');
			$('#infoLeg').removeClass('showService');
		});


		$('#toggleLeg').click(function() {
			$('#infoLeg').addClass('showService');
			
			$('#infoFis').removeClass('showService');
			$('#infoNom').removeClass('showService');
			$('#infoCont').removeClass('showService');

		});
	// SERVICES END



});