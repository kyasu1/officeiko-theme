@php
  include( get_template_directory() . '/views/utils.php' );

  $date = get_post_meta(get_the_ID(), 'stock_date', true);
  $gd_price = get_post_meta(get_the_ID(), 'gd_price', true);
  $pt_price = get_post_meta(get_the_ID(), 'pt_price', true);
  $sv_price = get_post_meta(get_the_ID(), 'sv_price', true);
  $gd_diff = get_post_meta(get_the_ID(), 'gd_diff', true);
  $pt_diff = get_post_meta(get_the_ID(), 'pt_diff', true);
  $sv_diff = get_post_meta(get_the_ID(), 'sv_diff', true);
  $stock = calculate_stock($date, $gd_price, $pt_price, $sv_price);

  $gd_label = array('K24', 'K22', 'K21.6', 'K20', 'K18', 'K14', 'K10', 'K9');
  $pt_label = array('Pt1000', 'Pt950', 'Pt900', 'Pt850');
  $sv_label = array('Sv1000', 'Sv925');
@endphp

<article @php(post_class("mv3")) >
  <header>
    <h1 class="entry-title tc pt4">本日の貴金属価格表</h1>
    <h4 class="tc f4 f3-ns">公表 {{ $stock['date'] }}</h4>
  </header>
  <div class="">
    <div class="f4 pa3 flex flex-column flex-row-ns justify-center">
      <p class="tc ma2">金<span>{{ to_price($gd_price, "円", 0) }}</span>（前日比<span>{{$gd_diff}}</span>円）</p>
      <p class="tc ma2">Pt<span>{{ to_price($pt_price, "円", 0) }}</span>（前日比<span>{{$pt_diff}}</span>円）</p>
      <p class="tc ma2">銀<span>{{ to_price($sv_price, "円", 0) }}</span>（前日比<span>{{$sv_diff}}</span>円）</p>
    </div>
  </div>
  <div class="flex flex-column flex-row-ns flex-row-p justify-center pa3">
    <table class="f5 f3-ns pa3 collapse mr2-ns mr2-p w-100 w-auto-ns w-auto-p " cellspacing="0">
      <tbody>
        <tr><th class="ba tc pa0" colspan="2"><div class="pa2 bg-gold washed-yellow">金製品</div></th></tr>
        <?php foreach ($gd_label as $gd) { ?>
        <tr>
          <th class="ba pa2 tl w4">{{ $gd }}</th><td class="ba pa2 pl4 tr">{{ to_price( $stock[$gd], "円/g" ) }}</td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
    <table class="f5 f3-ns pa3 collapse ml2-ns ml2-p w-100 w-auto-ns w-auto-p" cellspacing="0">
      <tbody>
        <tr><th class="ba tc pa0" colspan="2"><div class="pa2 bg-light-silver washed-yellow">プラチナ製品</div></th></tr>
        <?php foreach ($pt_label as $pt) { ?>
        <tr>
          <th class="ba pa2 tl w4">{{ $pt }}</th><td class="ba pa2 pl4 tr">{{ to_price( $stock[$pt], "円/g" ) }}</td>
        </tr>
        <?php } ?> 
        <tr><th class="ba tc pa0" colspan="2"><div class="pa2 bg-silver washed-yellow">銀製品</div></th></tr>
        <?php foreach ($sv_label as $sv) { ?>
        <tr>
          <th class="ba pa2 tl w4">{{ $sv }}</th><td class="ba pa2 pl4 tr">{{ to_price( $stock[$sv], "円/g" ) }}</td>
        </tr>
        <?php } ?> 
       </tbody>
    </table>
  </div>
  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
</article>
