jQuery(document).ready(function () {
    
	/**
	 * Sortable list Custom Control
	 */

	// Update the values for all our input fields and initialise the sortable list
	jQuery('.sortable_list_control').each(function() {
		// If there is an existing customizer value, populate our rows
		var defaultValuesArray = jQuery(this).find('.customize-control-sortable-list').val().split(',');
		var numlistItems = defaultValuesArray.length;

		if(numlistItems > 0) {
			// Add the first item to our existing input field
			jQuery(this).find('.list-input').val(defaultValuesArray[0]).change();
			// Create a new row for each new value
			if(numlistItems > 1) {
				var i;
				for (i = 1; i < numlistItems; ++i) {
					appendRow(jQuery(this), defaultValuesArray[i]);
				}
			}
		}
	});

	// Make our list fields sortable
	jQuery(this).find('.sortable_list.sortable').sortable({
		update: function(event, ui) {
			getAllInputs(jQuery(this).parent());
		}
	});

	// Remove item starting from it's parent element
	jQuery('.sortable_list.sortable').on('click', '.customize-control-sortable-list-delete', function(event) {
		event.preventDefault();
		var numItems = jQuery(this).parent().parent().find('.list').length;

		if(numItems > 1) {
			jQuery(this).parent().slideUp('fast', function() {
				var parentContainer = jQuery(this).parent().parent();
				jQuery(this).remove();
				getAllInputs(parentContainer);
			})
		}
		else {
			jQuery(this).parent().find('.list-input').val('');
			getAllInputs(jQuery(this).parent().parent().parent());
		}
	});

	// Add new item
	jQuery('.customize-control-sortable-list-add').click(function(event) {
		event.preventDefault();
		appendRow(jQuery(this).parent());
		getAllInputs(jQuery(this).parent());
	});

	// Refresh our hidden field if any fields change
	jQuery('.sortable_list.sortable').change(function() {
		getAllInputs(jQuery(this).parent());
	})

	// Append a new row to our list of elements
	function appendRow($element, defaultValue = '') {
		// Create the options
		var keys = jQuery('#customize-control-sortable-list-choices-keys').val().split(',');
		var values = jQuery('#customize-control-sortable-list-choices-values').val().split(',');
		var options = "";
		for (let i = 0; i < keys.length; i++) {
			options += `<option value="${keys[i]}" ${defaultValue === keys[i] ? 'selected' : ''}>${values[i]}</option>`;
		}

		var newRow = '<div class="list" style="display:none"><select class="list-input">' + options + '</select><span class="dashicons dashicons-sort"></span><a class="customize-control-sortable-list-delete" href="#"><span class="dashicons dashicons-no-alt"></span></a></div>';

		$element.find('.sortable').append(newRow);
		$element.find('.sortable').find('.list:last').slideDown('fast', function(){
			jQuery(this).find('input').focus();
		});
	}

	// Get the values from the list input fields and add to our hidden field
	function getAllInputs($element) {
		var inputValues = $element.find('.list-input').map(function() {
			return jQuery(this).val();
		}).toArray();
		// Validate the inputs
		validateInputs(inputValues);
		// Add all the values from our list fields to the hidden field (which is the one that actually gets saved)
		$element.find('.customize-control-sortable-list').val(inputValues);
		// Important! Make sure to trigger change event so Customizer knows it has to save the field
		$element.find('.customize-control-sortable-list').trigger('change');
	}

	// Validate the inputs to be sure there is no duplicates.
	function validateInputs(inputs) {
		let duplicates = inputs.filter((item, index) => inputs.indexOf(item) !== index);
		duplicates = [...new Set(duplicates)];

		if (duplicates.length > 0) {
			showError(`The section${duplicates.length > 1 ? 's' : ''} ${duplicates.join(', ')} ${duplicates.length > 1 ? 'are' : 'is'} selected several times.`);
		}
		else {
				showError('');
		}
	}

	// Display an error to the user.
	function showError(message) {
		jQuery('.sortable_list_error').text(message);
	}
});
