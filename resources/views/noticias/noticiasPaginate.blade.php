<div class="container">
            <div class="row mb-4">
    @foreach ($posts as $post)
    <?php
    $str = $post->title;
    $str2 = str_replace(' ', '-', $str);
    ?>

    <div class="col-md-4 card-content">
    <div class="card" style="width: 19rem;">
        <div class="img-card">
            <div class="gradient">
            <img class="card-img-top" height="182px" src={{asset('storage/posts-header/'.$post->banner)}} alt="Card image cap">
            </div>
        </div>
        <div class="avatar">
            @if(!empty($post->user->info))
                @if(!empty($post->user->info->avatar))
                    <img src={{asset('storage/avatar/'.$post->user->info->avatar)}} alt="">
                @else
                    <img src={{asset('img/profilezim.png')}} alt="">
                @endif
            @else
                <img src={{asset('img/profilezim.png')}} alt="">
            @endif
        </div>
        <div class="card-body">
        <h5 class="card-title"><a href={{route('blog.page').'/'.$str2.'/'.$post->id}} > {{$post->title}}</a></h5>
        @php
            $description = substr($post->conteudo, 0, 200);
            $description =  strip_tags($description);
            $dataMes = array('01' => 'Janeiro', '02' => 'Fevereiro', '03' => 'Março', '04'=> 'Abril', '05' => 'Maio', '06' => 'Junho', '07' => 'Julho', '08' => 'Agosto', '09' => 'Setembro', '10' => 'Outubro', '11' => 'Novembro', '12' => 'Dezembro');
            $dataReplace = explode(' ',$post->created_at);
            $data = explode('-', $dataReplace[0]);
            $mes = $data[1];
            $mes = $dataMes[$mes];
        @endphp
        <p class="card-text">{!!$description!!}...</p>
            <a class="lermais" href={{route('blog.page').'/'.$str2.'/'.$post->id}}>Ler mais <i class="fas fa-eye"></i></a>
        </div>
        <div class="dropdown-divider"></div>
        <div class="local">
            <span><i class="fas fa-calendar-alt"></i></span> <p>{{end($data)}} de {{$mes}} de {{$data[0]}}</p><br><span><i class="fas fa-comments"></i></span><p>Comentarios</p><br><span><i class="fas fa-tags"></i></span><p>Blog</p>
        </div>
    </div>
</div>

@endforeach
</div>
{{$posts->links()}}
</div>


</div>
