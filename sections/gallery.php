<?php $images =  get_sub_field('images'); ?>
<?php $tdu = get_template_directory_uri(); ?>
<?php $image_array = []; ?>
<?php
foreach( $images as $image ):
    $str = '<li  class="gallery_image">';
    $str .= '<a data-featherlight="image"  class="gallery"  href="'. $image['url'] . '">';
    $str .= '<img width="' . $image['sizes']['medium-width'] . '" height="' . $image['sizes']['medium-height'] . '" class="lazy" data-original="' . $image['sizes']['medium'] . '"  alt="" />';
    $str .= '<img  src="' . $tdu . '/img/image_blob3.svg" class="gallery_blob" />';
    $str .= '</a>';
    $str .= '</li>';
    array_push($image_array, $str);
endforeach;


shuffle($image_array);

?>



<div class="container">

    <ul class="gallery_images ">
        <?php echo implode($image_array, " "); ?>
    </ul>

</div>
