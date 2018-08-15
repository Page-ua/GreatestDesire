
$('.active-star-rating').starRating({
    totalStars: 5,
    initialRating: 0,
    disableAfterRate: false,
    useFullStars: true,
    callback: function(currentRating, $el){
        console.log();
        $.ajax({
            'type': 'POST',
            'url': '/index.php/rating/rating/add',
            'cache': false,
            'data': {'objectId': $($el).attr('data-id-desire'), 'rating': currentRating},
            'success': function (html) {
                console.log(html);
            }});

    }
});