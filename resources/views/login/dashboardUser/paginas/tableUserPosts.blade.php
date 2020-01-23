@foreach ($posts as $post)
@php
    $str = $post->title;
    $str2 = str_replace(' ', '-', $str);
    $dataReplace = explode(' ',$post->created_at);
    $data = explode('-', $dataReplace[0]);
@endphp
<div class="row mt mb" id="search">
    <div class="col-md-4" style="display:flex; align-items:center">
        <span class="custom-checkbox" style="margin-top:0px;">
                <input type="checkbox" class="checkDelete" name="check" value="">
                <label for="checkbox1"></label>
        </span>
        <h4 id="nomeSearch">{{$post->title}}</h4>
    </div>
    <div class="col-md-4" style="display:flex; align-items:center">
        <div style="display:flex; align-items:center; margin-right:20px;">
            <h4>10</h4>
            <i style="margin-top:0px;margin-left:10px;font-size:20px;" class="fa fa-comments"></i>
        </div>
        <div style="display:flex; align-items:center; margin-right:20px;">
            <h4>{{$post->views}}</h4>
            <i style="margin-top:0px;margin-left:10px;font-size:20px;" class="fa fa-eye"></i>
        </div>
        <div style="display:flex; align-items:center; margin-right:20px;">
            <h4>{{$data[2].'/'.$data[1].'/'.$data[0]}}</h4>
        </div>
    </div>
    <div class="col-md-4" style="display:flex; align-items:center; margin-top:0px;">
        <div style="display:flex; align-items:center; ">
        <a  href={{route('blog.page').'/'.$str2.'/'.$post->id}}  class="btn btn-info" style="margin-right:10px;">Visualizar postagem</a>
        <a href={{route('blogUserEdit').'/'.$post->id}} class="btn btn-warning" style="margin-right:10px;"><i class="fa fa-edit"></i></a>
        <button onclick='excluirPost({{$post->id}})' class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" style="margin-top:5px">
            <div style="width:100%; height:2px; background:#B7B2B2"></div>
        </div>
    </div>
</div>
@endforeach
<div class="row text-center" style="padding:10px;">
@if(isset($todas))

@elseif(isset($desativadas))

@else
{{$posts->links()}}

<div>Mostrando <b>{{$posts->count()}}</b> de <b> {{$posts->total()}} </b>posts</div>

@endif
</div>
