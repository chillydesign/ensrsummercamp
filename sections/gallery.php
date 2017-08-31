<?php $images =  get_sub_field('images'); ?>

<div class="container">

<ul class="gallery_images ">
    <?php while ( have_rows('images') ) : the_row() ; ?>
        <?php $image_file = get_sub_field('image');?>
        <li  class="gallery_image">
            <a class="gallery"  href="<?php echo $image_file['url']; ?>"><img src="<?php echo $image_file['sizes']['medium']; ?>"  alt="" /></a>
        </li>
    <?php endwhile; ?>



</ul>

</div>
