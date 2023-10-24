
$(document).ready(function() {
    $('.submit-button').click(function(event) {
        var hasNumeric = false;
        $('.disallow-numeric').each(function() {
            var inputValue = $(this).val();
            if (/\d/.test(inputValue)) {
                hasNumeric = true;
                $('#numeric-error').text('Numeric values are not allowed in text fields.');
                event.preventDefault(); // Prevent form submission
                return false; // Exit the loop
            }
        });

        if (!hasNumeric) {
            $('#numeric-error').text(''); // Clear any previous error message
        }
    });
});

