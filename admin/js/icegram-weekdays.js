/*
 * On the 'Display Rules' tabbed panel, under the 'When' section, display the 
 * Days of the week when the 'Schedule' radio button is selected. 
 */
jQuery(function($) {

    // Get the DOM element for the 'When' section in the 'Display Rules' tabbed panel.
    var $whenSection = $('#campaign_target_rules_when');

    // Get the DOM element containing our Days checkboxes.
    var $daysSection = $('.icegram-weekdays-admin-when-days-section', $whenSection);

    // Get all radio buttons.
    var $radioButtons = $('input[type=radio]', $whenSection);

    // Get the radio button that is already checked.
    var $checkedRadioButton = $('input[type=radio]:checked', $whenSection);

    /**
     * Show the Days section only when the Schedule radio button is checked
     */
    function displayDaysSection($radioButton) {
        var value = $radioButton.val();
        (value === 'schedule') ? $daysSection.show() : $daysSection.hide();
    }

    /**
     * Init
     */
    function init() {
        // Display the days section any time the schedule radio button is checked.
        $radioButtons.on('change', function() {
            displayDaysSection($(this));
        });

        // Start with the Days section showing only if the Schedule radio button is checked.
        displayDaysSection($checkedRadioButton);
    }
    
    // Kick it off!
    init();
});
