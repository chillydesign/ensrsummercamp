
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
                zoom: 10,
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
            var iconBase ="https://webfactor.ch/projets/ensrsummercamp/wp-content/themes/ensrsummercamp/img/";
            var location_map = new google.maps.Map(location_map_container.get(0), map_options);
            var icons = {
              ensr: {
                icon:{
                  url: iconBase + 'ensr_marker2.png',// url
                  scaledSize: new google.maps.Size(50, 64), // scaled size
                  origin: new google.maps.Point(0,0), // origin
                  anchor: new google.maps.Point(25,64) // anchor
                }
              },
              summercamp: {
                icon:{
                url: iconBase + 'summercamp_marker2.png',// url
                scaledSize: new google.maps.Size(50, 64), // scaled size
                origin: new google.maps.Point(0,0), // origin
                anchor: new google.maps.Point(25,64) // anchor
              }
              }
            };

            var features = [
             {
               position: new google.maps.LatLng(46.5268387,6.6548382),
               type: 'ensr',
               title:'<strong>ENSR</strong><br>Chemin de Rovéréaz 20<br>1012 Lausanne<br>Suisse'
             }, {
               position: new google.maps.LatLng(46.1778861,6.8695741),
               type: 'summercamp',
               title:'<strong>ENSR Summercamp</strong><br>Hôtel Suisse, Rue du Village 55<br>1874 Champéry<br>Suisse'
             }
           ];

            var bounds = new google.maps.LatLngBounds();
            var infowindow = new google.maps.InfoWindow({content: ''});
           features.forEach(function(feature) {
               var marker = new google.maps.Marker({
                 position: feature.position,
                 icon: icons[feature.type].icon,
                 map: location_map,
                 optimized: false 
               });

               marker.addListener('click', function(){
                 infowindow.setContent(feature.title);
                 infowindow.open(location_map, this);
               })

              bounds.extend(marker.position);
             });

              location_map.fitBounds(bounds);


            // var latitude = map_location.lat;
            // var longitude = map_location.lng;
            // var latlng = new google.maps.LatLng(  latitude , longitude);
            // var marker = new google.maps.Marker({
            //     map: location_map,
            //     position: latlng,
            //     title: map_title
            // });

            // location_map.setCenter( latlng );



        };
        // END OF MAP


        // MAP WITH 2 CUSTOM MARKERS

        if (typeof map_location != 'undefined') {

          };
        // END OF MAP WITH 2 CUSTOM MARKERS




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
        var $application_form = $('#application_form');
        var $application_submit_button = $('#application_submit_button');
        var $application_submit_button_outer = $('#application_submit_button_outer');
        var $form_submit_warning = $('#form_submit_warning').hide();
        $application_submit_button.attr('disabled','disabled').addClass('button_disabled');


        var $necessary_field_names = ['first_name' , 'last_name', 'birth_date', 'sex', 'nationality', 'passport_number', 'valid_until', 'mother_tongue', 'representative', 'address', 'city_country', 'email', 'phone', 'mobile_phone', 'lesson_choice[]', 'level_spoken', 'level_written', 'dates_stay[]', 'transportation', 'hit_we', 'insurance', 'place_date', 'terms'];
        var $amount_empty = 0;


        if ($application_form.length > 0) {

            console.log('is a form');


            $('input, textarea', $application_form).on('change keyup', function(){

                var $this = $(this);
                $amount_empty = 0;

                for (var i = 0; i < $necessary_field_names.length; i++) {
                    var $field_name = $necessary_field_names[i];
                    var $field = $("input[name='" + $field_name +  "']" );

                    if ($field.attr('type') == 'text') {
                        if($field.val().trim() == '') {
                            $amount_empty++;
                        };
                    } else if ($field.attr('type') == 'checkbox' )  {
                        if($field.is(':checked') == false) {
                                $amount_empty++;
                        };
                    } else if ($field.attr('type') == 'radio' )  {
                        // if at least one radio button is selected
                        if (!$("input[name='" + $field_name +  "']:checked").val()) {
                            $amount_empty++;
                        }


                    }


                };


                if ($amount_empty < 1 ) {
                    $application_submit_button.removeAttr('disabled').removeClass('button_disabled');
                    $form_submit_warning.hide();
                } else {
                    $application_submit_button.attr('disabled','disabled').addClass('button_disabled');
                }


            });

            $application_submit_button_outer.on('mouseover', function(){
                console.log('clic');
                if ( $application_submit_button.hasClass('button_disabled') ) {
                    $form_submit_warning.show();
                } else {

                }
            })


            for (var i = 0; i < $necessary_field_names.length; i++) {
                var $field_name = $necessary_field_names[i];
                var $field = $("input[name='" + $field_name +  "']" );

                var $allowed_to_submit = true;

                $field.on('change keyup', function() {

                    $allowed_to_submit = true;

                    if ($field.val().trim() == '' ) {
                        $allowed_to_submit = false;
                    }
                });
            }

        }



    });

})(jQuery, this);
