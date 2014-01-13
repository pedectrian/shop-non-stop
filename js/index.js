$(window).load(function(){
    $('.bwWrapper').BlackAndWhite({
        hoverEffect : true, // default true
        // set the path to BnWWorker.js for a superfast implementation
        webworkerPath : false,
        // for the images with a fluid width and height
        responsive: false,
        speed: { //this property could also be just speed: value for both fadeIn and fadeOut
            fadeIn: 200, // 200ms for fadeIn animations
            fadeOut: 800 // 800ms for fadeOut animations
        }
    });

    $('.partner-logo').on('click', function(){

        if(!$(this).hasClass('no-redirect'))
            document.location = '/woman/discounts';
    })
});
$(document).ready(function(){

    if ($('.offer-countdown')) {
        $('.offer-countdown').each(function(){
            var endDate =  parseDate($(this).text());
            $(this).countdown({
                date: endDate,
                render: function(data) {
                    $(this.el).html('<span class="countdown-icon"></span>' + this.leadingZeros(data.days, 2) + " дн. " + this.leadingZeros(data.hours, 2) + ":" + this.leadingZeros(data.min, 2) + ":" + this.leadingZeros(data.sec, 2));
                }
            });
        })

    }

    $('.choose-man').on('click', function(e){
        e.preventDefault();
        popup.show();
    });

    $('.popup-close').on('click', function(e){
        e.preventDefault();
        popup.close();
    });

    $('input, textarea').placeholder();

    if($('.companies-holder') && $('.companies-filter')) {
        var comps = $.parseJSON($('.companies-holder').val());

        $.each(comps, function(key, value) {
             $('.companies-filter')
                 .append($("<option></option>")
                 .attr("value",key)
                 .text(value));
        });
    }

    $('.companies-filter').on('change', function(){
        var id = $(this).val();
        var initial = 'block';
        if($('.data-row').hasClass('offer-row'))
            var initial = 'inline-block';

        if(id) {
            $('.data-row').css('display', 'none');

            $('.data-row')
            .filter(function(){
                return id == $(this).attr('attr-company');
            }).css('display', initial);
        } else {
            $('.data-row').css('display', initial);
        }

    });


});
function parseDate(input) {
  var parts = input.split(/[ ]/);
  var parts_d = parts[0].split(/[-]/);
  var parts_t = parts[1].split(/[:]/);
  // new Date(year, month [, date [, hours[, minutes[, seconds[, ms]]]]])
  return new Date(parts_d[0], parts_d[1]-1, parts_d[2], parts_t[0], parts_t[1]); // months are 0-based
}
var popup = {};

popup.show = function() {
    $('.popup-wrap')
        .height($(document).height())
        .fadeIn('slow');
};

popup.close = function() {
    $('.popup-wrap')
        .fadeOut('slow');
};

