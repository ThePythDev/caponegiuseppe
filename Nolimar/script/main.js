$(() => {
    "use strict";
    let show = false;

    function toggleMenu() {
        $('#hamburger').toggleClass('is-active');
        if (!show) {
            $('.menu').show('slide', { direction: 'right' });
        } else {
            $('.menu').hide('slide', { direction: 'right' });
        }
        show = !show;
    }

    //Open menù
    $('#hamburger').click(() => {
        toggleMenu();
    });
    //

    $('.menu a').on('click', function (event) {
        toggleMenu();

        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {

            // Prevent default anchor click behavior
            event.preventDefault();

            // Store hash
            var hash = this.hash;

            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 900, function () {

                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
            });
        } // End if 
    });

}); (jQuery)