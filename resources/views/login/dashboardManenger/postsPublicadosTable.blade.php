<table class="table table-striped table-hover">
	<thead>
		<tr>
		<th>
			<span class="custom-checkbox">
				<input type="checkbox" id="selectAll">
				<label for="selectAll"></label>
			</span>
		</th>
            <th>Id</th>
            <th>Autor</th>
            <th>Titulo</th>
            <th>Tags</th>
            <th>Assunto</th>
            <th>Visualizações</th>
            <th>Comentários</th>
            <th>Data do post</th>
            <th class="text-center">Ação</th>
        </tr>
	</thead>
	<tbody id="myTable">
        @foreach ($posts as $post)
        @php

        @endphp
            <tr>
		<td>
			<span class="custom-checkbox">
				<input type="checkbox" class="checkDelete" name="check" value=1>
				<label for="checkbox1"></label>
			</span>
		</td>
        @php
            $str = $post->title;
            $str2 = str_replace(' ', '-', $str);
            $dataMes = array('01' => 'Janeiro', '02' => 'Fevereiro', '03' => 'Março', '04'=> 'Abril', '05' => 'Maio', '06' => 'Junho', '07' => 'Julho', '08' => 'Agosto', '09' => 'Setembro', '10' => 'Outubro', '11' => 'Novembro', '12' => 'Dezembro');
            $dataReplace = explode(' ',$post->created_at);
            $data = explode('-', $dataReplace[0]);
            $mes = $data[1];
            $mes = $dataMes[$mes];
        @endphp
            <td>{{$post->id}}</td>
            <td>{{$post->user->name}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->tags}}</td>
            <td>{{$post->assunto}}</td>
            <td>{{$post->views}}</td>
            <td>{{$post->comments->count()}}</td>
            <td>{{end($data)}} de {{$mes}} de {{$data[0]}}</td>
            <td style="display:flex">
                <button onclick='excluirPost({{$post->id}})' class="btn btn-danger"><i class="fa fa-trash-o" data-toggle="tooltip" title="Excluir"></i></button>
                <a target="_blank" href={{route('blog.page').'/'.$str2.'/'.$post->id}} style="margin-left:5px; color:white" class="btn btn-info">Visualizar</a>
                <a target="_blank" href={{route('blogEdit').'/'.$post->id}} style="margin-left:5px; color:white" class="btn btn-warning"  data-toggle="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
            </td>
		</tr>
        @endforeach
    </tbody>

</table>
@if(isset($todas))

@elseif(isset($desativadas))

@else
{{$posts->links()}}

<div class="clearfix">
    <div class="hint-text">Mostrando <b>{{$posts->count()}}</b> de <b> {{$posts->total()}} </b>Contratos</div>
</div>
@endif
