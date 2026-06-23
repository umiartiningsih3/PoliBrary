@extends('layouts.app')

@section('content')

<div class="p-10 text-center">

<h1 class="text-2xl font-bold mb-5">
Pembayaran Denda
</h1>


<button id="pay-button"
class="bg-blue-600 text-white px-6 py-3 rounded-xl">

Bayar Sekarang

</button>


</div>


<script src="https://app.sandbox.midtrans.com/snap/snap.js"
data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}">
</script>


<script>

document
.getElementById('pay-button')
.onclick=function(){

snap.pay(
"{{ $snapToken }}"
);

}

</script>


@endsection