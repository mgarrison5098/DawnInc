<?php
/**
 * Example Block Template.
 *
 * @var  array  $attributes Block attributes.
 * @var  array  $block Block data.
 * @var  string $context Preview context [editor,frontend].
 */

?>
<div id="hero_cover" class="uk-background-cover uk-light relative" uk-parallax="bgy: -200" style="background-image:url('<?php echo $attributes['hero-background']['url'] ?>');" >
    <div class="absolute h-full w-full z-0" style="background-color:<?php echo $attributes['overlay-color'] ?>"></div>
    <div class="absolute h-full w-full z-auto flex flex-col justify-center items-center">
        <div class="px-4 text-center"><span class="md:text-6xl text-4xl font-bold uppercase" style="color:<?php echo $attributes['text-color'] ?>"><?php echo $attributes['title'] ?></span></div>
        <div class="px-4 text-center"><span class="md:text-4xl text-2xl font-body uppercase" style="color:<?php echo $attributes['text-color'] ?>"><?php echo $attributes['subtitle'] ?></span></div>
        <div class="m-5 md:h-4 h-2" style="background-color:<?php echo $attributes['line-color'] ?>; width: 200px;"></div>
    
        <?php if ( $attributes['chevron-overlay'] ) : ?>
            <div class="absolute w-full" style="bottom: 0">
                <svg viewBox="5 0 1441 170" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g id="Symbols" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Clip-Line" transform="translate(5.000000, 5.000000)">
                            <polygon id="Rectangle" fill="<?php echo $attributes['chevron-background-color'] ?>" points="0 1 721 123.5 1441 1 1441 245 0 245"></polygon>
                            <g id="Group" stroke="<?php echo $attributes['chevron-line-color'] ?>" stroke-linecap="round" stroke-width="11">
                                <line x1="720.5" y1="122.5" x2="0.5" y2="0.5" id="Line-3"></line>
                                <line x1="721.5" y1="122.5" x2="1440.5" y2="0.5" id="Line-5"></line>
                            </g>
                        </g>
                    </g>
                </svg>
            </div>
        <?php endif; ?>
    </div> 
</div>
<script>
  const resize_ob = new ResizeObserver(function(entries) {
	  let rect = entries[0].contentRect;
	  let height = rect.height;
	  let cover = document.getElementById("hero_cover");
	  cover.style.height = `calc(100vh - ${height}px)`;
      cover.style.minHeight = "450px"
  });
resize_ob.observe(document.getElementsByTagName("header")[0]);
</script>