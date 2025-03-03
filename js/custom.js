jQuery(document).ready(function($) {
    function loadCasestudy(category = 'all', page = 1) {
        $.ajax({
            url: ajax_object.ajax_url,
            type: "POST",
            data: {
                action: "load_case_study",
                category: category,
                page: page
            },
            beforeSend: function() {
                $('#case-study-posts').html('<div class="loading"></div>');
            },
            success: function(response) {
                $('#case-study-posts').html(response);
            }
        });
    }

    // Load initial posts
    loadCasestudy();

    // Handle category click
    $(document).on('click', '.category-btn', function() {
        $('.category-btn').removeClass('active');
        $(this).addClass('active');

        let category = $(this).data('id');
        loadCasestudy(category);
    });

    // Handle pagination click
    $(document).on('click', '.case-study-pagination-link', function(e) {
        e.preventDefault();
        let page = $(this).data('page');
        let category = $('.category-btn.active').data('id');
        loadCasestudy(category, page);
    });
});






