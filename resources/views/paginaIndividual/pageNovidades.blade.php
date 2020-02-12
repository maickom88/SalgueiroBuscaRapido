
    <div class="container contato-empresa">
        <h4>Última Novidade!</h4>
        @foreach ($novidades as $novidade)
		  @php
			$avatar = $empresa->logoMarca;
		  @endphp
				<div style="margin-bottom:20px; background:url({{asset("../img/bg.png")}}); background-size:size; background-repeat:no-repeat; border-radius:5px; padding:10px; box-shadow: 0px 0px 3px rgba(0,0,0,0.2)">
				<div class="container">
					<div class="row">
						<div class="col-md-3 text-center">
							<img src={{asset('storage/logo-empresas/'.$avatar)}} style="border-radius: 50%; border: 6px solid #fff" width="120"  alt="">
						</div>
						<div id="conteudo-novidade" class="col-md-9"  style="border-radius: 5px;background:rgba(0,0,0,0.4); color:white;font-size:21px; padding:30px;">
							{!!$novidade->content!!}
						</div>
					</div>

						<div class="page-head">
						<div class="demo-gallery">
						<ul id="lightgallery">
					@php
						$email = $empresa->permissions->users->email;
						$count = $novidade->photos->count();
					for ($i=0; $i <$count ; $i++):

					@endphp
					<li  class="visi" data-src={{asset('storage/album-novidades/'.$email.'/'.$novidade->photos[$i]->album)}}>
					<a href="">
						<img class="img-responsive" style="width:120px !important; height:120px !important" src={{asset('storage/album-novidades/'.$email.'/'.$novidade->photos[$i]->album)}}>
						<div class="demo-gallery-poster">
						<img src="https://sachinchoolur.github.io/lightGallery/static/img/zoom.png">

						</div>
					</a>
					</li>
					@php
					endfor
					@endphp

					</ul>
					</div>
					</div>
				</div>
		</div>
		@endforeach
		<div class="col-sm-12" style="display: flex; justify-content:center; align-items:center">
			{{$novidades->links()}}
		</div>
	</div>
	<script>
	$('#lightgallery').lightGallery({
	pager: true
	});

	</script>
