@extends('menu.menu_cliente')
 
@section('title', 'IMPERIUM')

@section('content')

    <h2>Escaneie para pagar</h2>

    <img
    class="margin-left-60"
    src="data:image/png;base64, {{ $QR_code}}" alt="QR Code PIX">

    <h3>Copia e cola: {{$copia_cola}}</h3>




@endsection