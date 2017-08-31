
        <div class="container">
            <div class="row">

                <?php while ( have_rows('icons') ) : the_row() ; ?>
                        <?php $image =  get_sub_field('image'); ?>
                        <?php $title =  get_sub_field('title'); ?>
                        <?php $content =  get_sub_field('content'); ?>
                    <div class="col-6 col-sm-4 col-md-4 col-xl-2 swiss_icon_container ">
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $title; ?>">
                        <h3><?php echo $title; ?></h3>
                        <p><?php echo $content; ?></p>
                    </div>
                <?php endwhile; ?>


            </div>
        </div>
