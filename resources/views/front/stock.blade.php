@php
  /* 最も最近の地金買取価格を表示する */
  include( get_template_directory() . '/views/utils.php' );

  $args = array(
    'post_type' => 'stock',
    'orderby' => 'meta_value',
    'order' => 'DESC',
    'posts_per_page' => 1,
    'meta_key' => 'date'
  );

  $posts = new WP_Query( $args );

  while ( $posts->have_posts() ) : $posts->the_post();
    $stock = calculate_stock(
      $posts->post->date,
      $posts->post->gd_price,
      $posts->post->pt_price,
      $posts->post->sv_price
    );
@endphp
<div class="f5 f3-ns bg-wasabi-green pv2">
  <div class="w-90 center">
    <p class="ma0 pv1 tc">地金買取価格</p>
    <p class="ma0 pv1 tc">{{ $stock['date'] }}</p>
    <p class="ma0 pv1 tc">K24 {{ to_price( $stock['K24'], '円/g' ) }} Pt1000 {{ to_price( $stock['Pt1000'], '円/g' ) }}</p>
    <p class="ma0 pv1 tc">K18 {{ to_price( $stock['K18'], '円/g' ) }} Pt900  {{ to_price( $stock['Pt900'],  '円/g' ) }}</p>
  </div>
</div>
@php
  endwhile;
  wp_reset_postdata();
@endphp
