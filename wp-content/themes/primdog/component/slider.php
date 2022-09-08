<?php
function render_top_slider(){
?>
<div class="slider">
    <?php
    $slides = carbon_get_post_meta(396, 'crb_slider');
    if ($slides) :
        foreach ($slides as $slide): ?>
            <a href="<?php echo $slide['url']; ?>">
                <img class="slide__img" src="<?php echo $slide['image'] ?>"/>
            </a>
    <?php endforeach;
    endif
    ?>
</div>
<?php }?>