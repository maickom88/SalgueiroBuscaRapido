@foreach ($empresasPostAtv as $empresa)

@php
    $data1 = new DateTime();
    $data2 = $empresa->novidades[0]->created_at;


    $minuto = $data1->diff($data2)->format('%i');
    $minutoInt = intval($minuto);

    $hora = $data1->diff($data2)->format('%h');
    $horaInt = intval($hora);

    $dia = $data1->diff($data2)->format('%d');
    $diaInt = intval($dia);

    $mes = $data1->diff($data2)->format('%m');
    $mesInt = intval($mes);

    $ano = $data1->diff($data2)->format('%Y');
    $anoInt = intval($ano);

    if($minutoInt < 3){
        $minuto = 'Agora mesmo';
    }
    else{
        $minuto = $data1->diff($data2)->format('%i minutos atrás');
    }
    if($horaInt == 1){
        $hora = $data1->diff($data2)->format('%h hora atrás');
    }
    else{
        $hora = $data1->diff($data2)->format('%h horas atrás');
    }
    if($mesInt == 1){
        $mes = $data1->diff($data2)->format('%m mês atrás');
    }
    else{
        $mes = $data1->diff($data2)->format('%m meses atrás');
    }
     if($diaInt == 1){
        $dia = $data1->diff($data2)->format('%d dia atrás');
    }
    else{
        $dia = $data1->diff($data2)->format('%d dias atrás');
    }
    if($anoInt == 1){
        $ano = $data1->diff($data2)->format('%Y ano atrás');
    }
    else{
        $ano = $data1->diff($data2)->format('%Y anos atrás');
    }

    $str = $empresa->name;
    $str2 = str_replace(' ', '-', $str);

@endphp

<div class="desc">
    <div class="thumb">
        <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
    </div>
    <div class="details">
        <p>
        @if($horaInt == 0)
            <muted>{{$minuto}}</muted>
        @elseif($diaInt == 0)
            <muted>{{$hora}}</muted>
        @elseif($mesInt == 0)
            <muted>{{$dia}}</muted>
        @elseif($anoInt == 0)
            <muted>{{$mes}}</muted>
        @else
            <muted>{{$ano}}</muted>
        @endif
        <br/>
        <a href="empresa/{{$str2}}/{{$empresa->id}}#novidades">{{$empresa->name}}</a> Postou uma novidade<br/>
        </p>
    </div>
</div>
@endforeach
