<?php
function calculate_stock($date, $gd, $pt, $sv) {
  $year = substr($date, 0, 4);
  $month = substr($date, 4, 2);
  $day = substr($date, 6, 2);

  $stock['date'] = $year."年".$month."月".$day."日";

  $gd_price = floatval($gd);
  $pt_price = floatval($pt);
  $sv_price = floatval($sv);

  $stock['gd_price'] = $gd_price; 
  $stock['K24']   = $gd_price * 24   / 24 - 250;
  $stock['K22']   = $gd_price * 22   / 24 - 250;
  $stock['K21.6'] = $gd_price * 21.6 / 24 - 250;
  $stock['K20']   = $gd_price * 20   / 24 - 250;
  $stock['K18']   = $gd_price * 18   / 24 - 100;
  $stock['K14']   = $gd_price * 14   / 24 - 350;
  $stock['K10']   = $gd_price * 10   / 24 - 500;
  $stock['K9']    = $gd_price *  9   / 24 - 500;
  
  $stock['pt_price'] = $pt_price; 
  $stock['Pt1000'] = $pt_price * 1000 / 1000 - 250;
  $stock['Pt950']  = $pt_price *  950 / 1000 - 250;
  $stock['Pt900']  = $pt_price *  900 / 1000 - 250;
  $stock['Pt850']  = $pt_price *  850 / 1000 - 250;
  
  $stock['sv_price'] = $sv_price; 
  $stock['Sv1000'] = $sv_price * 1000 / 1000 - 20;
  $stock['Sv925']  = $sv_price *  925 / 1000 - 20;

  return $stock;
}

function to_price($num, $suffix = "", $precision = -1) {
  return number_format( round( $num, $precision ) ) . $suffix;
}
?>
