$(document).ready(function($) {
    var engine1 = new Bloodhound({
        remote: {
            url: '/search/name?value=%QUERY%',
            wildcard: '%QUERY%'
        },
        datumTokenizer: Bloodhound.tokenizers.whitespace('value'),
        queryTokenizer: Bloodhound.tokenizers.whitespace
    });

    $(".search-input").typeahead({
        hint: true,
        highlight: true,
        minLength: 1
    }, [
        {
            source: engine1.ttAdapter(),
            name: 'products-name',
            display: function(data) {
                return data.name;
            },
            templates: {
                empty: [
                    '<div class="list-group-item">Nothing found.</div>'
                ],
                suggestion: function (data) {
                    return '<a href="/products/' + data.id + '" class="list-group-item">' + data.name + '</a>';
                }
            }
        }
    ]);
});