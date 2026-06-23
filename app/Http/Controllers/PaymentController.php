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
->whereIn(
    'status',
    [
        'belum_bayar',
        'menunggu_konfirmasi'
    ]
)
->first();


if(!$denda){

    return redirect('/denda')
    ->with(
        'error',
        'Tidak ada tagihan denda.'
    );

}



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

public function callback(Request $request)
{
    $serverKey = config('services.midtrans.server_key');

    $hashed = hash(
        "sha512",
        $request->order_id .
        $request->status_code .
        $request->gross_amount .
        $serverKey
    );


    if($hashed == $request->signature_key){

        if(
            $request->transaction_status == 'settlement'
            ||
            $request->transaction_status == 'capture'
        ){

            $id = explode(
                '-',
                $request->order_id
            )[1];


            Denda::where('id',$id)
            ->update([
                'status'=>'lunas',
                'tgl_bayar'=>now()
            ]);

        }

    }


    return response()->json([
        'message'=>'OK'
    ]);
}

public function cash()
{
    $denda = Denda::where('user_id', auth()->id())
        ->where('status', 'belum_bayar')
        ->first();


    if(!$denda){

        return redirect('/denda')
        ->with(
            'error',
            'Tidak ada tagihan denda.'
        );

    }


    $denda->update([
        'status' => 'menunggu_konfirmasi'
    ]);


    return redirect('/denda')
    ->with(
        'success',
        'Pengajuan pembayaran cash berhasil. Silahkan tunggu konfirmasi petugas.'
    );
}


}