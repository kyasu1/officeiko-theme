@php
  $ts = time();
  $next = strtotime( '+1 month', $ts );
@endphp

<div id="calendar" class="f5 fw5 bg-tea-green white pt2 pb3">
  <div class="w-80 center washed-yellow pt2">
    <p class="f3 f2-ns b ma0 pv2 tc gold ba">
      <span class="gold">夏季休業のお知らせ</span></p>
    <p class="f5 f3-ns ma0 pv2 tc">8月2日(水)から8月9日(水)まで</p>
  </div>
  <div class="flex justify-around">
    <div class="w-50 mw5-ns">
      <img class="w-auto h-auto" src="https://elixir.officeiko.co.jp/services/calendar/{{date('Y', $ts)}}-{{date('m', $ts)}}.png">
    </div>
    <div class="w-50 mw5-ns">
      <img class="w-auto h-auto" src="https://elixir.officeiko.co.jp/services/calendar/{{date('Y', $next)}}-{{date('m', $next)}}.png">
    </div>
  </div>
</div> 
