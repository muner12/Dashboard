// script.js

$(document).ready(function () {
    const searchInput = $('#searchInput');
    const searchResults = $('#searchResults');
    const searchHistory = $('#searchHistory');

    // Load search history from local storage
    const history = JSON.parse(localStorage.getItem('searchHistory')) || [];

    // Display search history
    function displayHistory() {
        searchHistory.empty();
        let newHistory = history.slice(-5);
        newHistory.forEach(query => { // Use 'newHistory' here
            searchHistory.append(`<li>${query}</li>`);
        });
    }

    // Function to display recommended species
    function displayRecommendedSpecies(species) {
        species = JSON.parse(species);
        const recommendedSpeciesContainer = $('#recommendedSpecies');
        recommendedSpeciesContainer.empty();
        console.log(species);
        const maxSpeciesToDisplay = 5; // Change this number as needed

        if (species.length > 0) {
            recommendedSpeciesContainer.append('<h2>Recommended Species</h2>');
            species.slice(0, maxSpeciesToDisplay).forEach(species => {
                recommendedSpeciesContainer.append('<div class="border result-item">' +
                    '<strong>Botanical:</strong> ' + species.botanical + '<br>' +
                    '<strong>Synonyms:</strong> ' + species.synonyms + '<br>' +
                    '<strong>Family:</strong> ' + species.family +
                    '</div>');
            });
        }
    }

    // Handle search input
    searchInput.on('input', function () {
        const query = $(this).val();
        if (query.length >= 3) {
            // Send the query to the server using AJAX
            $.ajax({
                url: 'search.php',
                method: 'POST',
                data: { query: query },
                success: function (data) {
                    
                    searchResults.html(data);
                }
            });

            // Update search history
            history.push(query);
            localStorage.setItem('searchHistory', JSON.stringify(history));
            displayHistory();

            // Send the search history to the server to get recommended species
            $.ajax({
                url: 'search_history_recommendations.php',
                method: 'POST',
                data: { searchHistory: JSON.stringify(history) },
                success: function (data) {
                    displayRecommendedSpecies(data);
                }
            });
        } else {
            // Clear search results when query length is less than 3
            searchResults.empty();
        }
    });

    // Initial display of search history (only call this once)
    displayHistory();
});
