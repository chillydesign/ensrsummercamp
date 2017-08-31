
import bxslider from '../node_modules/bxslider/dist/jquery.bxslider.js';
import Masonry from '../node_modules/masonry-layout/dist/masonry.pkgd.js';
import Velocity from '../node_modules/velocity-animate/velocity.js';



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
            controls: false
        });



        // MAP
        // MEMBERS MAP
    		if (typeof map_location != 'undefined') {

                console.log(map_location);

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



            // MASONRY GALLERY
            var grid = document.querySelector('.gallery_images');
            if (grid) {
                var msnry = new Masonry( grid, {
                  // options...
                  itemSelector: '.gallery_image',
                  percentPosition: true,
                  gutter: 10
                });

                setTimeout( function(){
                    msnry.layout();
                    console.log('redid layout');
                }, 100 )

            }




        // END OF MAP


    });

})(jQuery, this);
