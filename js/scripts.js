
import bxslider from '../node_modules/bxslider/dist/jquery.bxslider.js';
import Masonry from '../node_modules/masonry-layout/dist/masonry.pkgd.js';
import featherlight from '../node_modules/featherlight/release/featherlight.min.js';
import lazyload from '../node_modules/jquery-lazyload/jquery.lazyload.js';



(function ($, root, undefined) {

    $(function () {

        'use strict';









        var $blurrable = $('#main, .branding');
        var $navigation_menu = $('#navigation_menu');
        var $menu_button = $('#menu_button');

        $menu_button.on('click', function(){

            $navigation_menu.toggleClass('menu_visible');
            if ($navigation_menu.hasClass('menu_visible')){
                $blurrable.addClass('blurred_body');
            } else {
                $blurrable.removeClass('blurred_body');
            }

        });

        // if press escape key, hide menu
        $(document).on('keydown', function(e){

            if(e.keyCode == 27 ){
                $navigation_menu.removeClass('menu_visible');

                $('.search_box').removeClass('visible');
            }

        })


        $('.bxslider').bxSlider({
            controls: false,
            auto: true
        });



        // MAP
        // MEMBERS MAP
        if (typeof map_location != 'undefined') {

            var map_theme = [{"featureType":"poi","elementType":"geometry.fill","stylers":[{"color":"#C5E3BF"}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":100},{"visibility":"simplified"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"color":"#D1D1B8"}]},{"featureType":"water","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#C6E2FF"}]}];

            var map_options = {
                zoom: 11,
                mapTypeControl: true,
                scrollwheel: false,
                draggable: true,
                navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                styles: map_theme
            };


            var location_map_container = $('#map_container');
            location_map_container.css({
                width : '100%',
                //height: 560
            })

            var location_map = new google.maps.Map(location_map_container.get(0), map_options);


            var latitude = map_location.lat;
            var longitude = map_location.lng;
            var latlng = new google.maps.LatLng(  latitude , longitude);
            var marker = new google.maps.Marker({
                map: location_map,
                position: latlng,
                title: map_title
            });

            location_map.setCenter( latlng );



        };
        // END OF MAP




        // MASONRY GALLERY
        var grid = document.querySelector('.gallery_images');
        if (grid) {
            var msnry = new Masonry( grid, {
                // options...
                itemSelector: '.gallery_image',
                percentPosition: true,
                gutter: 10
            });

            setTimeout( function(){ msnry.layout(); }, 100 );
            setTimeout( function(){ msnry.layout(); }, 250 );

        }



        // lAZY LOAD GALLERY IMAGES
        $("img.lazy").lazyload({

            load : function(elements_left, settings) {
                if (msnry) {
                     msnry.layout();
                }

            }

        });



        // APPLICATION FORM VALIDATION
        var $application_submit_button = $('#application_submit_button');
        $application_submit_button.attr('disabled','disabled');

        var $necessary_fields = ['first_name', 'last_name' ];

        for (var i = 0; i < $necessary_fields.length; i++) {
            var $field_name = $necessary_fields[i];
            var $field = $("input[name='" + $field_name +  "']" );
            console.log($field.first());

        }





    });

})(jQuery, this);
