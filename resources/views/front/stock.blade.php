@php
  /* 最も最近の地金買取価格を表示する */
  include( get_template_directory() . '/views/utils.php' );

  $args = array(
    'post_type' => 'stock',
    'orderby' => 'meta_value',
    'order' => 'DESC',
    'posts_per_page' => 1,
    'meta_key' => 'stock_date'
  );

  $posts = new WP_Query( $args );

  while ( $posts->have_posts() ) : $posts->the_post();
    $stock = calculate_stock(
      $posts->post->stock_date,
      $posts->post->gd_price,
      $posts->post->pt_price,
      $posts->post->sv_price
    );
@endphp
<div class="f5 f3-ns bg-wasabi-green pv2">
  <div class="w-90 center">
    <p class="ma0 pv1 tc">地金買取価格</p>
    <p class="ma0 pv1 tc">{{ $stock['date'] }}</p>
    <table class="f5 f4-ns collapse center" cellspacing="0">
      <tbody>
        <tr>
          <th class="bb tc pa0" colspan="2"><div class="pa2">金</div></th>
          <th class="bb tc pa0" colspan="2"><div class="pa2">プラチナ</div></th>
        </tr>
        <tr>
          <td class="bb pa2 tl w4-ns">K24</td>
          <td class="bb pa2 tr code">{{ to_price( $stock['sell']['K24'], '円/g' ) }}</td>
          <td class="bb pa2 tl w4-ns">Pt1000</td>
          <td class="bb pa2 tr code">{{ to_price( $stock['sell']['Pt1000'], '円/g' ) }}</td>
         </tr>
        <tr>
          <td class="bb pa2 tl w4-ns">K18</td>
          <td class="bb pa2 tr code">{{ to_price( $stock['sell']['K18'], '円/g' ) }}</td>
          <td class="bb pa2 tl w4-ns">Pt900</td>
          <td class="bb pa2 tr code">{{ to_price( $stock['sell']['Pt900'], '円/g' ) }}</td>
         </tr>
       </tbody>
    </table>
    <p class="ma0 mt2 pv3 tc">
        <span class="ba bw1 pa2 dim">
            <a href="{{the_permalink()}}" class="link black ">全ての価格表はこちら</a>
        </span >
    </p>
  </div>
</div>
@php
  endwhile;
  wp_reset_postdata();
@endphp
