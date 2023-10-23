$(document).ready(function() {
    $('#search-button').click(function() {
        var selectedTable = $('#table-select').val();
        var name = $('#id_name').val();
        var family = $('#id_family').val();
        var synonym = $('#id_Synonym').val();

            // Perform validation
        if (selectedTable === '' || name === '' || family === '' || synonym === '') {
            alert('Please fill in all fields.');
            return; // Do not proceed with the AJAX request
        }
        var formData = {
            table: selectedTable,
            name: name,
            family: family,
            synonym: synonym
        };

        $.ajax({
            type: 'POST',
            url: 'search.php',
            data: formData,
            success: function(response) {
                // Handle the response from the server here (e.g., display results)
                $('#result-container').html(response);
            }
        });
    });
});
