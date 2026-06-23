<?php

namespace App\Http\Controllers;

use App\Models\Denda;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;

class PaymentController extends Controller
{

public function bayar()
{

$denda = Denda::where(
'user_id',
auth()->id()
)
->where(
'status',
'belum_bayar'
)
->firstOrFail();



Config::$serverKey = trim(env('MIDTRANS_SERVER_KEY'));

Config::$isProduction=false;

Config::$isSanitized=true;

Config::$is3ds=true;



$params=[

'transaction_details'=>[

'order_id'=>
'DENDA-'.$denda->id.'-'.time(),

'gross_amount'=>
(int) $denda->jumlah_denda

],


'customer_details'=>[

'first_name'=>
auth()->user()->name,

'email'=>
auth()->user()->email

]

];


$snapToken =
Snap::getSnapToken($params);



return view(
'pembayaran.index',
compact(
'snapToken'
)
);


}


}