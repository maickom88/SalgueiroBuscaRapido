<div class="row mb-4">

@foreach ($eventos as $evento)
<?php
$dataMes = array('01' => 'Janeiro', '02' => 'Fevereiro', '03' => 'Março', '04'=> 'Abril', '05' => 'Maio', '06' => 'Junho', '07' => 'Julho', '08' => 'Agosto', '09' => 'Setembro', '10' => 'Outubro', '11' => 'Novembro', '12' => 'Dezembro');
$data1 = $evento->inicio_data_evento;
$data2 = $evento->fim_data_evento;

$data1 = explode('/', $data1);
$mes = $data1[1];
$mes = $dataMes[$mes];

$hora1 = $evento->inicio_hora_evento;
$hora2 = $evento->fim_hora_evento;
$hora1 = explode(':', $hora1);
$hora2 = explode(':', $hora2);
$str = $evento->nome_evento;
$str2 = str_replace(' ', '-', $str);
?>
<div class="col-md-4 card-content">
    <div class="card" style="width: 20rem;">
        <div class="img-card" style="width:318px; height:180px;">
            <div class="gradient">
                <img  class="card-img-top"  src={{asset('storage/eventos/'.$evento->banner)}} alt="Eventos de salgueiro {{$evento->nome_evento}}">
            </div>
        </div>
        <div class="card-body">
            <h5 class="card-title"><a href={{route('eventos').'/'.$str2.'_'.$evento->id}} >{{$evento->nome_evento}}</a></h5>
                    <h5 class="card-text" style="color:#33414E; font-weight:bold">{{$evento->endereco}}</h5>
            <h4 class="card-text" style="color:#33414E; font-weight:bold"><i class="fa fa-clock-o"></i> {{$hora1[0].':'.$hora1[1]}} - {{$hora2[0].':'.$hora2[1]}} </h4>
        </div>
        <div class="dropdown-divider"></div>
        <div class="local">
            <span><i class="fas fa-calendar-alt"></i></span><p style="font-size:16px;">{{$data1[0]}} de {{$mes}} de {{end($data1)}}</p><br><span> <span><i class="fa fa-money"></i></span><p style="font-size:16px;">{{$evento->ingresso}}</p><br><span><span><i class="fas fa-tags"></i></span><p>Evento</p>
        </div>
    </div>
</div>
@endforeach
</div>
{{$eventos->links()}}
