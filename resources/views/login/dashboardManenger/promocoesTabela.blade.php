
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
                <th>Usúario</th>
                <th>Autor</th>
                <th>Titulo</th>
                <th>Empresa</th>
                <th>Data de fim de promoção</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody id="myTable">
            @foreach ($promotions as $promotion)
                <tr>
                <td>
                    <span class="custom-checkbox">
                        <input type="checkbox" class="checkDelete" name="check" value=1>
                        <label for="checkbox1"></label>
                    </span>
                </td>
                <td>{{$promotion->id}}</td>
                <td>{{$promotion->empresa->permissions->users->email}}</td>
                <td>{{$promotion->empresa->permissions->users->name}}</td>
                <td>{{$promotion->title}}</td>
                <td>{{$promotion->empresa->name}}</td>
                <td>{{$promotion->data_fim_promocao}}</td>
                <td>
                    @if ($promotion->status == 'sim')
                        <span class="btn btn-success">Ativa</span>
                    @else
                        <span class="btn btn-danger">Expirado</span>
                    @endif
                </td>
                <td><button class="btn btn-danger" onclick="excluirPromocao({{$promotion->id}})" " class="delete " ><i class="fa fa-trash-o" data-toggle="tooltip" title="Excluir"></i></button></button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @if(isset($todas))

    @elseif(isset($desativadas))

    @else
    {{$promotions->links()}}

    <div class="clearfix">
        <div class="hint-text">Mostrando <b>{{$promotions->count()}}</b> de <b> {{$promotions->total()}} </b>Contratos</div>
    </div>
    @endif
