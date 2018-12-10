
$(window).on('load', function () {
    // initialization of header
    // $.HSCore.components.HSHeader.init($('#js-header'));
    // $.HSCore.helpers.HSHamburgers.init('.hamburger');

    // initialization of HSMegaMenu component
    $('#dropdown-megamenu').HSMegaMenu({
        event: 'hover',
        pageContainer: $('.container'),
        breakpoint: 767
    });
});