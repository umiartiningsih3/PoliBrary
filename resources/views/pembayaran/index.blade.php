@extends('layouts.app')

@section('content')

<div class="bg-gray-50 min-h-screen py-10 px-4">

    <div class="max-w-xl mx-auto bg-white rounded-2xl shadow p-8">

        <h1 class="text-2xl font-bold text-center mb-6">
            Pembayaran Denda
        </h1>


        <div class="grid gap-4">


            {{-- PEMBAYARAN ONLINE --}}
            <div class="border rounded-xl p-5">

                <h2 class="font-bold text-lg mb-2">
                    💳 Pembayaran Online
                </h2>

                <p class="text-gray-500 text-sm mb-4">
                    Bayar menggunakan QRIS, e-wallet, virtual account,
                    dan metode digital lainnya.
                </p>


                <button 
                    id="pay-button"
                    class="w-full bg-blue-600 text-white py-3 rounded-xl font-bold hover:bg-blue-700">

                    Bayar Dengan Midtrans

                </button>

            </div>



            {{-- PEMBAYARAN CASH --}}
            <div class="border rounded-xl p-5">

                <h2 class="font-bold text-lg mb-2">
                    💵 Bayar Tunai di Kasir
                </h2>


                <p class="text-gray-500 text-sm mb-4">

                    Datang ke bagian administrasi perpustakaan
                    untuk melakukan pembayaran secara langsung.

                </p>


                <form action="{{ route('denda.cash') }}" method="POST">

    @csrf

    <button type="submit"
        class="w-full bg-green-600 text-white py-3 rounded-xl">
        Ajukan Pembayaran Cash
    </button>

</form>


            </div>


        </div>

    </div>

</div>



{{-- MIDTRANS --}}
<script src="https://app.sandbox.midtrans.com/snap/snap.js"
data-client-key="{{ config('services.midtrans.client_key') }}">
</script>


<script>

document
.getElementById('pay-button')
.onclick = function(){


snap.pay(
"{{ $snapToken }}",
{

onSuccess:function(result){

alert(
"Pembayaran berhasil!"
);

window.location.href="/denda";


},


onPending:function(result){

alert(
"Menunggu pembayaran"
);


},


onError:function(result){

alert(
"Pembayaran gagal"
);


},


onClose:function(){

alert(
"Anda menutup pembayaran"
);

}


}

);


}


</script>


@endsection