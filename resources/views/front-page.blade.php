@extends('layouts.app')
@section('content')
  <div class="f5 f3-ns fw5 bg-near-white pv4">
    <div class="w-90 center">
      <p class="ma0 pb2 tc"><span class="fw9 red">質イコー</span>は埼玉県越谷市の質屋です</p>
      <p class="ma0 pv2 tc">あなたのお品物でご融資いたします</p>
      <p class="ma0 pv2 tc">堅牢な質蔵にて大切に保管致します</p>
      <p class="ma0 pt2 tc">買取と合わせて気軽にご相談下さい</p>
    </div>
  </div>
  <div class="f5 f3-ns fw5 bg-tea-green washed-yellow pv3">
    <div class="w-90 center">
      <p class="f3 f2-ns b ma0 tc">質融資</p>
      <hr />
      <p class="ma0 pb2 tc">大切なお品物を売らずに</p>
      <p class="ma0 pv2 tc">お金をお貸し致します</p>
      <p class="ma0 pv2 tc">質料もリーズナブルな設定です</p>
      <p class="ma0 pv2 tc">審査や取立の無い安心なシステム</p>
      <p class="ma0 pt2 tc">お品物の価値の範囲内で即ご融資</p>
    </div>
  </div>
  <div class="f5 f3-ns fw5 bg-washed-yellow tea-green pv3">
    <div class="w-90 center">
      <p class="f3 f2-ns b ma0 tc">ご売却</p>
      <hr />
      <p class="ma0 pb2 tc">不要の品物を買い取らさせて頂きます</p>
      <p class="ma0 pv2 tc">新機種の購入資金に即売却が有効です</p>
      <p class="ma0 pv2 tc">終活のご相談の方も増えています</p>
      <p class="ma0 pv2 tc">下取りならばさらに査定アップ</p>
      <p class="ma0 pt2 tc">売りになりたくない場合は質融資も</p>
    </div>
  </div>
  @include('front.stock')
  @include('front.items')
  @include('front.shopinfo')
  @include('front.access')
  @include('front.calendar')
  @include('front.contact')
@endsection
<?php /* このスクリプトタグが無いとGoogle Mapsが表示されない */ ?>
<script></script>

