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
    <h1 class="ma0 entry-title tc pv4">本日の貴金属価格表</h1>
    <h4 class="ma0 tc f4 f3-ns">公表 {{ $stock['date'] }}</h4>
  </header>
  <div class="tc">
    <table class="f4 dib code">
        <tr>
            <td class="pa2 tl">金</td>
            <td class="pa2 tr">{{ to_price($gd_price, "円", 0) }}</td>
            <td class="pa2 tl">(前日比</td>
            <td class="pa2 tr">{{ add_sign($gd_diff) }}円)</td>
        </tr>
        <tr>
            <td class="pa2 tl">プラチナ</td>
            <td class="pa2 tr">{{ to_price($pt_price, "円", 0) }}</td>
            <td class="pa2 tl">(前日比</td>
            <td class="pa2 tr">{{ add_sign($pt_diff) }}円)</td>
        </tr>
        <tr>
            <td class="pa2 tl">銀</td>
            <td class="pa2 tr">{{ to_price($sv_price, "円", 0) }}</td>
            <td class="pa2 tl">(前日比</td>
            <td class="pa2 tr">{{ add_sign($sv_diff) }}円)</td>
        </tr>
    </table>
  </div>
  <h2 class="tc">当社での買取金額および融資金額（1gあたり・税込）</h2>
  <div class="flex flex-column flex-row-l flex-row-p justify-center items-center pa3">
    <table class="f5 f3-ns f2-p pa3 collapse mr2-l mr2-p w-100 w-auto-l w-auto-p " cellspacing="0">
      <tbody>
        <tr><th class="ba tc pa0" colspan="3"><div class="pa2 bg-gold washed-yellow">金製品</div></th></tr>
        <tr><td class="ba"></td><td class="ba pv2 tc">買取金額</td><td class="ba pv2 tc">融資金額</td></tr>
        <?php foreach ($gd_label as $gd) { ?>
        <tr>
          <th class="ba pa2 tl w4-ns">{{ $gd }}</th>
          <td class="ba pa2 tr code">{{ to_price( $stock['sell'][$gd], "円/g" ) }}</td>
          <td class="ba pa2 tr code">{{ to_price( $stock['pawn'][$gd], "円/g" ) }}</td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
    <table class="f5 f3-ns f2-p pa3 collapse ml2-l ml2-p w-100 w-auto-l w-auto-p justify" cellspacing="0">
      <tbody>
        <tr><th class="tc pa0 br bl bb bt-l bt-p" colspan="3"><div class="pa2 bg-light-silver washed-yellow">プラチナ製品</div></th></tr>
        <tr><td class="ba"></td><td class="ba pv2 tc">買取金額</td><td class="ba pv2 tc">融資金額</td></tr>
        <?php foreach ($pt_label as $pt) { ?>
        <tr>
          <th class="ba pa2 tl w4-ns">{{ $pt }}</th>
          <td class="ba pa2 tr code">{{ to_price( $stock['sell'][$pt], "円/g" ) }}</td>
          <td class="ba pa2 tr code">{{ to_price( $stock['pawn'][$pt], "円/g" ) }}</td>
        </tr>
        <?php } ?> 
        <tr><th class="ba tc pa0" colspan="3"><div class="pa2 bg-silver washed-yellow">銀製品</div></th></tr>
        <tr><td class="ba"></td><td class="ba pv2 tc">買取金額</td><td class="ba pv2 tc">融資金額</td></tr>
        <?php foreach ($sv_label as $sv) { ?>
        <tr>
          <th class="ba pa2 tl w4-ns">{{ $sv }}</th>
          <td class="ba pa2 tr code">{{ to_price( $stock['sell'][$sv], "円/g" ) }}</td>
          <td class="ba pa2 tr code">{{ to_price( $stock['pawn'][$sv], "円/g" ) }}</td>
        </tr>
        <?php } ?> 
       </tbody>
    </table>
  </div>
  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
</article>
