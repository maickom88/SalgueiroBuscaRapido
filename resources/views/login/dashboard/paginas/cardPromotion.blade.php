


@if (!empty($promotion))
    @php
        $data = $promotion->data_fim_promocao;
        $dataArray = explode('-', $data);
    @endphp

    <div class="product-panel-2 pn" style="background:linear-gradient(rgba(0,0,0,0.1), rgba(0,0,0,0.5)), url({{asset('storage/promocoes/'.$promotion->photo)}}); background-size:cover" data-jbox-content="Content 1">
        <div class="badge badge-hot">{{$promotion->desconto}}%</div>
        <img src="img/product.png" width="100" style="margin-top:20px;" alt="">
        <h4 style="color:#E74C3C; font-weight:900;  text-shadow:0px 1px 3px black">Sua Promoção</h4>
        <h5 class="" style="color:white;">{{$promotion->title}}</h5>
        <h6 style="color:white">Data de expiração</h6>
        <h6 style="color:white">{{$dataArray[2].'/'.$dataArray[1].'/'.$dataArray[0]}}</h6>
    </div>
    @else
    <div class="product-panel-2 pn" data-jbox-content="Content 1">
        <div class="badge badge-hot">0%</div>
        <img src="img/product.png" width="100" style="margin-top:20px;" alt="">
        <h5 class="mt">Nenhuma promoção pendente</h5>
        <h6>Click em anunciar e cadastre já uma oferta!</h6>
        <button id="clickModel" class="btn btn-small btn-theme04">ANUNCIAR</button>
    </div>
@endif
