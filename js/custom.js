/**
 * Created by Bill Hinostroza on 5/19/15.
 */


/**
 * Makes nav stick to the top after user scrolls.
 */
var  mn = $(".main-nav");
mns = "main-nav-scrolled";
hdr = $('main').height();

$(window).scroll(function() {
    if( $(this).scrollTop() > hdr ) {
        mn.addClass(mns);
    } else {
        mn.removeClass(mns);
    }
});

/**
 * Shows title of portfolio work.
 */
$(document).ready( function() {

    $('.gallery-item').hover( function() {
        $(this).find('.img-title').fadeIn(300);
    }, function() {
        $(this).find('.img-title').fadeOut(100);
    });

	/**
	* Randomize my profile picture
	*/
	var images = ['me.jpg', 'me2.jpg', 'me3.jpg', 'me4.jpg'];
	$('<img id="me" class="img-circle" src="img/' + images[Math.floor(Math.random() * images.length)] + '" alt="Bill Hinostroza Profile Picture">').appendTo('#img-load');

});

/**
 * Smoothens nav transition animation.
 */
$('.nav a[href*=#]').on('click', function(e){
    e.preventDefault();
    if( $( $.attr(this, 'href') ).length > 0 )
    {
        $('html, body').animate(
            {
                scrollTop: $( $.attr(this, 'href') ).offset().top
            }, 400);
    }
    return false;
});

/**
 * Adds active class to selected nav item.
 */
$('.nav a').click(function(){
    $(this).parent().addClass('active').siblings().removeClass('active');
});

/**
 * Randomly Changes main bg section
 */
function changeMainBg(){
    var bg = ['/img/city1.jpg','/img/city2.jpg','/img/earth.jpg',
    '/img/jarvis.png', '/img/world.jpg', '/img/matrix.jpg', '/img/touchtable.jpg'];

    var length = bg.length;

    var num = Math.floor(Math.random() * length);

    $('#intro-row').css('background-image','url(' + bg[num] + ')');
}

changeMainBg();

/**
 * Obfuscate Email Address
 */
var parts = ["h93", "bill", 64, "il.com", "gma"];
document.getElementById("obfuscate").textContent = parts[1] + parts[0] + String.fromCharCode(parts[2]) + parts[4] + parts[3];




