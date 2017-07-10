@php
  include( get_template_directory() . '/views/utils.php' );

  $gd_price = floatval(get_field('gd_price'));
  $pt_price = floatval(get_field('pt_price'));
  $sv_price = floatval(get_field('sv_price'));
  $stock = calculate_stock(get_field('date'), get_field('gd_price'), get_field('pt_price'), get_field('sv_price'));

  $gd_label = array('K24', 'K22', 'K21.6', 'K20', 'K18', 'K14', 'K10', 'K9');
  $pt_label = array('Pt1000', 'Pt950', 'Pt900', 'Pt850');
  $sv_label = array('Sv1000', 'Sv925');
@endphp

<article @php(post_class())>
  <header>
    <h1 class="entry-title tc">本日の貴金属価格表</h1>
    <h4 class="tc">公表 {{ $stock['date'] }}</h4>
  </header>
  <div class="">
    <div class="f5 f3-ns pa3 flex flex-column flex-row-ns flex-row-p justify-center">
      <div>金<span>{{ to_price($gd_price, "円", 0) }}</span>（前日比<span>{{the_field('gd_diff')}}</span>円）</div>
      <div>Pt<span>{{ to_price($pt_price, "円", 0) }}</span>（前日比<span>{{the_field('pt_diff')}}</span>円）</div>
      <div>銀<span>{{ to_price($sv_price, "円", 0) }}</span>（前日比<span>{{the_field('sv_diff')}}</span>円）</div>
    </div>
  </div>
  <div class="flex flex-column flex-row-ns flex-row-p justify-center pa3">
    <table class="f5 f3-ns pa3 collapse mr2-ns mr2-p w-100 w-auto-ns w-auto-p " cellspacing="0">
      <tbody>
        <tr><th class="ba pa2 tc" colspan="2">金スクラップ</th></tr>
        <?php foreach ($gd_label as $gd) { ?>
        <tr>
          <th class="ba pa2 tl w4">{{ $gd }}</th><td class="ba pa2 pl4 tr">{{ to_price( $stock[$gd], "円/g" ) }}</td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
    <table class="f5 f3-ns pa3 collapse ml2-ns ml2-p w-100 w-auto-ns w-auto-p" cellspacing="0">
      <tbody>
        <tr><th class="ba pa2 tc" colspan="2">Ptスクラップ</th></tr>
        <?php foreach ($pt_label as $pt) { ?>
        <tr>
          <th class="ba pa2 tl w4">{{ $pt }}</th><td class="ba pa2 pl4 tr">{{ to_price( $stock[$pt], "円/g" ) }}</td>
        </tr>
        <?php } ?> 
        <tr><th class="ba pa2 tc" colspan="2">銀スクラップ</th></tr>
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
