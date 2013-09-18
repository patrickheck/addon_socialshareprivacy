
	$('input:radio[name="infoCIDUseDefaults"]').click(function(){
		if ($(this).val() == "1") {
			// use defaults; hide page-selector
			$(this).closest("form")
				.find(".page-selector")
				.slideUp();
		} else {
			// use own settings; show page-selector
			$(this).closest("form")
				.find(".page-selector")
				.slideDown();
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
	
	$('input:radio[name="fbStatus"]').click(function(){
		if ($(this).val() == "on") {
			// use defaults; hide page-selector
			$(this).closest("form")
				.find(".control-group.fb-action")
				.slideDown();
		} else {
			// use own settings; show page-selector
			$(this).closest("form")
				.find(".control-group.fb-action")
				.slideUp()
				.find('input[name="fbAction"][value=""]')
				.attr("checked","checked");
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
	$('input:radio[name="fbStatus"]:checked').click();
