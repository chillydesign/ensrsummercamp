<?php $image =  get_sub_field('image'); ?>
<?php $title =  get_sub_field('title'); ?>
<?php $tdu = get_template_directory_uri(); ?>
<h2><?php echo $title; ?></h2>

<img src="<?php echo $tdu; ?>/img/squiggle_bottom.svg" class="squiggle squiggle_bottom" />
<img src="<?php echo $tdu; ?>/img/squiggle_top.svg" class="squiggle squiggle_top" />
<div class="background" style="background-image:url('<?php echo $image["url"]; ?>')"></div>
