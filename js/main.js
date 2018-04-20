$('#1-star').click(function() {
    console.log('clicked');
    rateNoodle(1);
});
$('#2-star').click(function() {
    rateNoodle(2);
});
$('#3-star').click(function() {
    rateNoodle(3);
});
$('#4-star').click(function() {
    rateNoodle(4);
});
$('#5-star').click(function() {
    rateNoodle(5);
});

function rateNoodle(rating) {
    for(i = 1; i <= 5; i++) {
        $('#' + i + '-star').off();
    }

    for(i = 1; i <= rating; i++) {
        $('#' + i + '-star').removeClass('fa-star-o').addClass('fa-star');
    }
    $('#rated').fadeIn('fast', function(){
        setTimeout(function() {
            $('#rated').fadeOut('slow', function () {});
        }, 3000);
    });

    // will add ajax here to change noodle's rating
}
