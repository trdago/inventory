@foreach($productos as $p)
<img src="{{ $p->barcode }}">
<br>
<small>Cod : {{ $p->id}} | {{ $p->fecha_ingreso}}</small>
<br>
<small>Des : {{ $p->descripcion}}</small>
<br>
<br>
@endforeach