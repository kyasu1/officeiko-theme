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
  
  $sell['K24']   = $gd_price * 24   / 24 - 350;
  $sell['K22']   = $gd_price * 22   / 24 - 250;
  $sell['K21.6'] = $gd_price * 21.6 / 24 - 250;
  $sell['K20']   = $gd_price * 20   / 24 - 250;
  $sell['K18']   = $gd_price * 18   / 24 - 100;
  $sell['K14']   = $gd_price * 14   / 24 - 350;
  $sell['K10']   = $gd_price * 10   / 24 - 500;
  $sell['K9']    = $gd_price *  9   / 24 - 500;
  
  $pawn['K24']   = $gd_price * 24   / 24 - 350 - 450 * 24   / 24;
  $pawn['K22']   = $gd_price * 22   / 24 - 250 - 450 * 22   / 24;
  $pawn['K21.6'] = $gd_price * 21.6 / 24 - 250 - 450 * 21.6 / 24;
  $pawn['K20']   = $gd_price * 20   / 24 - 250 - 450 * 20   / 24;
  $pawn['K18']   = $gd_price * 18   / 24 - 100 - 450 * 18   / 24;
  $pawn['K14']   = $gd_price * 14   / 24 - 350 - 450 * 14   / 24;
  $pawn['K10']   = $gd_price * 10   / 24 - 500 - 450 * 10   / 24;
  $pawn['K9']    = $gd_price *  9   / 24 - 500 - 450 * 9    / 24;

  $sell['pt_price'] = $pt_price;
  $sell['Pt1000'] = $pt_price * 1000 / 1000 - 250;
  $sell['Pt950']  = $pt_price *  950 / 1000 - 250;
  $sell['Pt900']  = $pt_price *  900 / 1000 - 250;
  $sell['Pt850']  = $pt_price *  850 / 1000 - 250;
  
  $pawn['pt_price'] = $pt_price;
  $pawn['Pt1000'] = $pt_price * 1000 / 1000 - 650;
  $pawn['Pt950']  = $pt_price *  950 / 1000 - 650;
  $pawn['Pt900']  = $pt_price *  900 / 1000 - 650;
  $pawn['Pt850']  = $pt_price *  850 / 1000 - 650;

  $sell['sv_price'] = $sv_price;
  $sell['Sv1000'] = $sv_price * 1000 / 1000 - 20;
  $sell['Sv925']  = $sv_price *  925 / 1000 - 20;

  $pawn['sv_price'] = $sv_price;
  $pawn['Sv1000'] = $sv_price * 1000 / 1000 - 20;
  $pawn['Sv925']  = $sv_price *  925 / 1000 - 20;

  $stock['pawn'] = $pawn;
  $stock['sell'] = $sell;

  return $stock;
}

function to_price($num, $suffix = "", $precision = -1) {
  return number_format(round(floatval($num), $precision)) . $suffix;
}

function add_sign($num) {
    if ($num == 0) {
        return "±0";
    } else if ($num > 0) {
        return "+" . $num;
    } else {
        return $num;
    }
}
?>
