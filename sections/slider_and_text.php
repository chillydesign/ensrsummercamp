<?php $content =  get_sub_field('content'); ?>
<?php $slider_position =  get_sub_field('slider_position'); ?>
<?php  $classes = ($slider_position == 'right') ?  [ 'col-sm-6 ', 'col-sm-6' ]  :  [ 'col-sm-6 col-sm-push-6', 'col-sm-6 col-sm-pull-6' ]  ; ?>
<?php $tdu = get_template_directory_uri(); ?>
<div class="container">
    <div class="row">

        <div class="<?php echo $classes[0]; ?>">
            <div class="blob_text">
                <?php echo $content; ?>
            </div>
        </div>
        <div class="<?php echo $classes[1]; ?>">

            <div class="blob_slider">
                <ul class="bxslider">
                    <?php while ( have_rows('slides') ) : the_row() ; ?>
                        <?php $image =  get_sub_field('image'); ?>
                        <li><img src="<?php echo $image['url']; ?>" alt="" /></li>
                    <?php endwhile; ?>
                </ul>

                <img src="<?php echo $tdu; ?>/img/image_blob3.svg" class="blob_slider_blob" />
            </div>

        </div>



    </div>
</div>
