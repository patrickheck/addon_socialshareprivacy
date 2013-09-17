
	$('input:radio[name="infoCIDUseDefaults"]').click(function(){
		if ($(this).val() == "1") {
			// use defaults; hide page-selector
			$(this).closest("form")
				.find(".page-selector")
				.hide();
		} else {
			// use own settings; show page-selector
			$(this).closest("form")
				.find(".page-selector")
				.show();
		}
	});
	
	$('#ccm-block-form').submit(function(){
		if ($('input:radio[name="infoCIDUseDefaults"]:checked').val() == 1) {
			// use default
			$(this).find('input:hidden[name="infoCID"]').val("");
		} else {
			// use selected page
			var selectedID = $(this)
				.find('input:hidden[name="infoCIDSelected"]')
				.val();
			$(this).find('input:hidden[name="infoCID"]').val(selectedID);
		}
	});

	// Set initial state
	if ($('#ccm-block-form input[name="infoCID"]').val() == "" ) {
		// use defaults
		$('#ccm-block-form input:radio[name="infoCIDUseDefaults"][value="1"]')
			.attr('checked', "checked")
			.click();
	} else {
		// use own settings
		$('#ccm-block-form input:radio[name="infoCIDUseDefaults"][value="0"]')
			.attr('checked', "checked")
			.click();
	}
