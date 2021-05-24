$("#fetch_properties_form").submit(function(event) {
    event.preventDefault();

    var fetchButton = $("#fetch_button");
    var apiFetchedDataMessage = $("#api_fetched_data_message");
    var apiFetchedDataTable = $("#api_fetched_data_table");

    $.ajax({
        url: '/api/properties',
        dataType: 'json',
        headers: {
            'X-CSRF-Token': $('meta[name=csrf-token]').content
        },
        data: $( this ).serialize(),
        beforeSend: function() {
            // Show loader animation in fetch button
            var loaderDiv = document.createElement('div');
            loaderDiv.className = 'loader';
            fetchButton.html(loaderDiv);

            // Remove alert message
            apiFetchedDataMessage.empty();
            apiFetchedDataMessage.addClass("hidden");

            // Remove data from table
            apiFetchedDataTable.find('tbody').empty();
            var tableRow = document.createElement('tr');
            tableRow.className = 'text-center no-data-message';

            var tableDivide = document.createElement('td');
            tableDivide.setAttribute('colspan', 2);
            tableDivide.textContent = 'No Data Retrieved';

            tableRow.append(tableDivide);
            apiFetchedDataTable.find('tbody').html(tableRow);
        },
        complete: function() {
            fetchButton.text('Fetch');
        },
        success: function(properties) {
            $("#api_fetched_data_table").find(".no-data-message").remove();

            properties['data'].forEach(function(property) {
                var tableRow = document.createElement('tr');
                var tableHeadUUID = document.createElement('th');
                var tableDivideData = document.createElement('td');

                tableHeadUUID.innerText = property.uuid;
                tableDivideData.innerHTML = JSON.stringify(property);

                tableRow.append(tableHeadUUID);
                tableRow.append(tableDivideData);

                apiFetchedDataTable.find('tbody').append(tableRow);
            });

            apiFetchedDataMessage.text("Successful saved properties API Data");
            apiFetchedDataMessage.removeClass("hidden");
        }
    });
});
