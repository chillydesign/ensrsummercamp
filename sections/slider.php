<ul class="bxslider">
    <?php while ( have_rows('slides') ) : the_row() ; ?>
        <?php $image =  get_sub_field('image');   ?>
        <li> <div class="slide_div"   style="background-image: url(<?php echo $image['url']; ?>);" ></div><h3><?php echo $image['title']; ?></h3></li>
    <?php endwhile; ?>
</ul>

<?php $tdu = get_template_directory_uri(); ?>
<img src="<?php echo $tdu; ?>/img/squiggle_slider_bottom.svg" class="squiggle squiggle_bottom"></div>
<img src="<?php echo $tdu; ?>/img/squiggle_slider_top.svg" class="squiggle squiggle_top"></div>
