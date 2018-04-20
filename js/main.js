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

$('#comment-btn').click(function() {
    console.log('clicked');
    var name = $('#comment-name').val()
    var text = $('#comment-text').val()
    if(name == '' || text == '') {
        console.log('empty');
        alert('Both fields must be filled.');
    } else {
        $.post('util/postComment.php',
        {
            name: name,
            comment: text
        },
        function() {
            $('#comment-container').fadeOut('slow', function(){
                $('#no-comment').fadeOut('fast', function() {
                    $('#comment-container').append("<div class='comment col-sm-4'><h5 class='float-left'>" + name + " said:</h5><br /><br /><p>" + text + "</p></div>");
                    $('#comment-container').fadeIn('slow', function() {});
                });
            });
        });
    }
});
