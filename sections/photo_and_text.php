<?php $image =  get_sub_field('image'); ?>
<?php $content =  get_sub_field('content'); ?>
<?php $image_position = get_sub_field('image_position'); ?>
<?php $size = get_sub_field('size'); ?>
<?php $bubble_image = get_sub_field('bubble_image'); ?>
<?php


$classes = [ 'col-sm-6', 'col-sm-6'  ];

if ( $image_position == 'right' ) {
    if ($size == 'small') {
        $classes = [ 'col-sm-8', 'col-sm-4'  ];
    } else {
        $classes = [ 'col-sm-6', 'col-sm-6'  ];
    }
} else {
    if ($size == 'small') {
        $classes = [ 'col-sm-8 col-sm-push-4', 'col-sm-4 col-sm-pull-8'  ];
    } else {
        $classes = [ 'col-sm-6 col-sm-push-6', 'col-sm-6 col-sm-pull-6'   ];
    }
};



?>

<div class="container">
    <div class="row">
        <div class="<?php echo $classes[0]; ?>">
            <div class="blob_text">
                <?php echo $content; ?>
            </div>

        </div>
        <div class="<?php echo $classes[1]; ?>">

                <?php if ($bubble_image == 'yes') { ?>
                    <div class="image_blob image_blob_<?php echo $size; ?> "  style="background-image:url('<?php echo $image['url']; ?>');">
                        <div  class="image_blob_inner"></div>
                    </div>
                <?php } else  { ?>
                    <img class="sidebar_photo" src="<?php echo $image['url']; ?>" alt="" />
                <?php }; ?>




        </div>

    </div> <!-- END OF ROW -->
</div><!--  END OF CONTAINER -->
