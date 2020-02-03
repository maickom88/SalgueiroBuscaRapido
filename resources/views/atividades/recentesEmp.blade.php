

@foreach ($likesUser as $likeUser)

@php
    $data1 = new DateTime();
    $data2 = $likeUser->created_at;


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

    $str = $user->empresas->name;
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
        @php
        $idUser = $likeUser->user_id;
        $userLike = $userModel::find($idUser);
        $nameUser = $userLike->name;
        @endphp
        <a href="empresa/{{$str2}}/{{$user->empresas->id}}">{{$nameUser}}</a> Curtiu sua empresa!<br/>
        </p>
    </div>
</div>
@endforeach

@foreach ($commentsUser as $commentUser)

@php
    $data1 = new DateTime();
    $data2 = $commentUser->created_at;


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

    $str = $user->empresas->name;
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
        @php
        $idUser = $likeUser->user_id;
        $userLike = $userModel::find($idUser);
        $nameUser = $userLike->name;
        @endphp
        <a href="empresa/{{$str2}}/{{$user->empresas->id}}">{{$nameUser}}</a> Curtiu sua empresa!<br/>
        </p>
    </div>
</div>
@endforeach
