<?php

namespace App;

/*
 * h1
 */
add_shortcode('h1', function ($atts, $content) {
    ob_start();
?>
    <h1 class="black-90 tc pa2"><?php echo htmlspecialchars($content); ?></h1>
<?php
    return ob_get_clean();
});

/*
 * h2
 */
add_shortcode('h2', function ($atts, $content) {
    ob_start();
?>
    <h2 class="black-90 tc shadow-1 bg-black-10 pa2"><?php echo htmlspecialchars($content); ?></h2>
<?php
    return ob_get_clean();
});

/*
 * Add shortcode for item category lists
 */
add_shortcode('subcategory', function ($atts) {
    ob_start();
?>
<li class="mw5 center bg-white br3 pa1 mv1 ba b--black-10">
  <div class="tc">
      <img src="<?php echo htmlspecialchars($atts[2]); ?>" alt="<?php echo htmlspecialchars($atts[0]); ?>の画像" class="h5 w5" />
      <h4 class="f6 ma0 pv1" ><?php echo htmlspecialchars($atts[0]); ?></h4>
  </div>
</li>
<?php
    return ob_get_clean();
});


