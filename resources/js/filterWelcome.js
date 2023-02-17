$(function(){
    $('div.adverts-count a').click(function(event) {
        event.preventDefault();
        $('a.adverts-actual-count').text($(this).text());
        getAdverts($(this).text());
    });

    $('a#filter-button').click(function(event) {
        event.preventDefault();
        getAdverts($('a.adverts-actual-count').first().text());
    });

    function getAdverts(paginate){
            const form = $('form.sidebar-filter').serialize();
            $.ajax({
                method: "GET",
                url: "/",
                data: form + "&" + $.param({paginate: paginate})
            })
                .done(function (response) {
                    $('div#adverts-wrapper').empty();
                    $.each(response.data, function(index, advert){
                        const html = '<div class="col-6 col-md-6 col-lg-4 mb-3">' +
                            '                                    <div class="card h-100 border-0">' +
                            '                                        <div class="card-img-top">' +
                            '                                                <img src="'+ '/storage/' + advert.image_path +'" class="img-fluid mx-auto d-block" alt="Card image cap">' +
                            '                                        </div>' +
                            '                                        <div class="card-body text-center">' +
                            '                                            <h4 class="card-title">' +
                                                                                advert.name +
                            '                                            </h4>' +
                            '                                            <h5 class="card-price small">' +
                            '                                                <i>' + advert.city + '</i>' +
                            '                                            </h5>' +
                            '                                        </div>' +
                            '                                    </div>' +
                            '                                </div>';
                        $('div#adverts-wrapper').append(html);
                    });
                })
                .fail(function (response) {
                    alert("ERROR");
                })
    }
});
