
var filter_model_id = 0,
    filter_year = 0,
    selector = false,
    default_selector = '.sub-offers-ul';

$('.filterSelectModel').change(function(){

    applyFilters(this);
});


$('.filterSelectYear').change(function(){

    applyFilters(this);
});

function applyFilters($this) {

    var selector = $($this).data('filter-object-selector') || default_selector;

    filter_model_id = $('.filterSelectModel').find(':selected').val()*1;
    filter_year = $('.filterSelectYear').find(':selected').val()*1;


    $(selector).children().each(function() {
        var current_model_id = $(this).data('model-id')*1;
        var current_year = $(this).data('model-year')*1;

        if (
            ((filter_model_id > 0 && filter_model_id == current_model_id) || !filter_model_id)
                && ((filter_year > 0 && filter_year == current_year) || !filter_year)
            )
            $(this).removeClass('hidden');
        else
            $(this).addClass('hidden');

    });

    var count_results = $(selector).children().not('.hidden').length;

    $('#count-results').text( count_results );

    if ( count_results )
        $('.filterNoResults').addClass('hidden');
    else
        $('.filterNoResults').removeClass('hidden');
}