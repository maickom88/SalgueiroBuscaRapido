@extends('templetes.tampletesDashboard.Manenger.site')

@section('titulo','SALGUEIRO BUSCA RÁPIDO: PAINEL ADMINISTRATIVO - PARCERIA ')

@section('links')

<link rel="stylesheet" type="text/css" href={{asset("lib/bootstrap-datepicker/css/datepicker.css")}}/>
<link rel="stylesheet" type="text/css" href={{asset("lib/bootstrap-daterangepicker/daterangepicker.css")}} />
<link rel="stylesheet" type="text/css" href={{asset("lib/bootstrap-timepicker/compiled/timepicker.css")}} />
<link rel="stylesheet" type="text/css" href={{asset("lib/bootstrap-datetimepicker/datertimepicker.css")}} />
<style>
.month {
    cursor: pointer !important;
}
.prev, .next{
    cursor: pointer;
}
.day{
    cursor: pointer;
}
</style>
@endsection

@section('eventos', 'active')

@section('conteudo')
<div class="loader loader-bouncing "></div>
<section id="main-content">
	<section class="wrapper site-min-height">
		<div class="row mt">
			<div class="container">
					<h2>1. Qual é o nome do evento?</h2>
					<p style="margin-left:20px">Você tambem pode divulgar imagem com as principais informações</p>
					<form action="" style="margin-bottom:29px;">
						<div class="form-group" style="width:60%;">
                        <label>Nome do evento</label>
							<input type="text" id="" name="" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="bannerEmp" class="btn btn-info">Adicionar um banner</label>
							<input type="file" style="display:none;" id="bannerEmp" onchange="previewBanner()" name="banner" class="form-control" >
						</div>
						<div class="infoBanner" style="width:220px; letter-spacing:1px; font-size:14px; float:left">
									<p>A dimensão recomendada é de <b>350 x 200.</b>
										Formato <b>JPEG, GIF ou PNG de no máximo 2MB.</b>
										Imagens com dimensões diferentes serão redimensionadas.
									</p>
							</div>
						<div class="form-group" id="previaBanner">
							<div class="previaImg" id="prevImg" style="left: 10px !important; width: 300px !important;height:120px !important; background:black !important; border:none;"><div id="prev" ><img class="previa" id="prevBanner" src={{asset('img/bannerDefault.png')}}  ></div><div class="cancelarOp" id="excluirBanner"><i class="fa fa-times fa-2x" style="cursor:pointer; margin-left: 40px !important;"></i></div></div>
						</div>
						<h2>2. Quando o evento vai acontecer?</h2>
						<p style="margin-left:20px">Informe ao público a data de realização do seu evento.</p>
						<div class="row">
							<div class="col-md-4" style="margin-bottom:10px;">
                                <div style="width:300px;" class="input-group input-large" data-date-format="dd-mm-yyyy" data-date="01/01/2020" >
                                    <input style="padding-right:-4px;"type="text" data-date-format="dd-mm-yyyy" data-date="01/01/2020" class="form-control dpd1" name="from" autocomplete="off" placeholder="Inicio">
                                    <span class="input-group-addon">Até</span>
                                    <input type="text" data-date-format="dd-mm-yyyy" data-date="01/01/2020" class="form-control dpd2" name="to" autocomplete="off"  placeholder=" Término">
                                </div>
							</div>

                           <div class="col-md-8" style="display:flex">

                                <div class="input-group bootstrap-timepicker" style="width:230px; margin-right:20px;">
                                    <input type="text" placeholder="Hora de inicio" name="" id="" class="form-control timepicker-24">
                                    <span class="input-group-btn">
                                        <button class="btn btn-theme04" type="button"><i class="fa fa-clock-o"></i></button>
                                    </span>
                                </div>
                                 <div class="input-group bootstrap-timepicker" style="width:230px;">
                                    <input type="text" placeholder="Hora de Término" name="" id="" class="form-control timepicker-24">
                                    <span class="input-group-btn">
                                        <button class="btn btn-theme04" type="button"><i class="fa fa-clock-o"></i></button>
                                    </span>
                                </div>
                            </div>
						</div>
						<h2>3. Ingressos</h2>
						<div id="ingressoGratuito" class="btn btn-info">Ingresso gratuito </div>
						<div id="ingressoPago" class="btn btn-info">Ingresso pago</div>
						<div  style="display:none; margin-top:10px;" id="dinheiroIngresso">
							<div class="form-group">
							<label><b>R$</b>
								<input type="text" name="" id="" class="dinheiro form-control">
                            </label>
                            </div>
						</div>
                        <h2>4. Onde o seu evento vai acontecer?</h2>
                        <p style="margin-left:20px">Ajude o público a chegar até o seu evento! Informe o endereço completo de onde ele irá acontecer.</p>
                        <div class="form-group" style="width:260px;">
                            <select  name="opEvento" id="opEvento" class="form-control"  style="margin-bottom: 5px;;width: 80% !important; display:inline-block; text-transform:uppercase" id="" required>
                                <option value="endereco">Informar endereço</option>
                                <option value="online">Evento online</option>
                            </select>
						</div>
                        <div id="form-locale" class="form-group" style="width:60%;">
                            <label>Informe o endereço ou o nome do local do evento</label>
                            <input type="text" name="" id="Emp" class="form-control" >
                        </div>
                        <h2>5. Descrição do evento</h2>
                        <p style="margin-left:20px">Conte todos os detalhes do seu evento, como a programação e os diferenciais da sua produção!</p>
                        <div class="container" style="width:100%; margin-bottom:50px;">
                            <div id="editor">
                                <p id="editoContent">Escreva a descrição do evento...</p>
                            </div>
                        </div>
                        <h2>6. Sobre o Organizador</h2>
                        <p style="margin-left:20px">Conte um pouco sobre você ou a sua empresa. É importante mostrar ao público quem está por trás do evento, dando mais credibilidade à sua produção.</p>
                        <div id="nome" class="form-group" style="width:80%;">
                            <label>Nome</label>
                            <input type="text" name="" id="Emp" class="form-control" >
                        </div>
                        <div class="form-group" style="width:100%;">
                            <label>Descrição</label>
                            <textarea class="form-control" id="" name="" maxlength="400"></textarea>
                        </div>
                        <h2>7. Outras definições</h2>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Categoria</label>
                                    <select  name="" id="" class="form-control"  style="margin-bottom: 5px;;width: 80% !important; text-transform:uppercase" id="ninchoEmp" required>
                                        <option disabled selected value="">Selecione uma categoria</option>
                                        <option value="">Congresso, seminário</option>
                                        <option value="">Curso, workshop</option>
                                        <option value="">Esportivo</option>
                                        <option value="">Encontro, network</option>
                                        <option value="">Feira, exposição</option>
                                        <option value="">Filme, cinema e teatro</option>
                                        <option value="">Gastrônomico</option>
                                        <option value="">Religioso, espiritual</option>
                                        <option value="">Show, música e festa</option>
                                    </select>
                                </div>
						    </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="">Nomeclatura</label>
                                    <select  name="" id="" class="form-control"  style="margin-bottom: 5px;;width: 60% !important; text-transform:uppercase" id="" required>
                                        <option value="">Ingresso</option>
                                        <option value="">Inscrição</option>
                                        <option value="">Contribuição</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <h2>8. Responsabilidades</h2>
                        <div class="termos" style="font-size:17px; margin-bottom:20px;">
                            <input required type="checkbox" name="check_termo" value="sim"  id="termos" > <label> Estou ciente dos <a href="#">Termos de Uso</a> da SBR.</label>
                        </div>
                        <button type="submit" class="btn btn-info">Publicar evento</button>
                        <button id="resetEvento" type="reset" class="btn btn-dark">Resetar evento</button>
                </form>
			</div>
		</div>
	</section>
</section>

@section('scripts')

<script type="text/javascript" src={{asset("lib/bootstrap-datepicker/js/bootstrap-datepicker.js")}}></script>
<script type="text/javascript" src={{asset("lib/bootstrap-daterangepicker/date.js")}}></script>
<script type="text/javascript" src={{asset("lib/bootstrap-daterangepicker/daterangepicker.js")}}></script>
<script type="text/javascript" src={{asset("lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js")}}></script>
<script type="text/javascript" src={{asset("lib/bootstrap-daterangepicker/moment.min.js")}}></script>
<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
<script type="text/javascript" src={{asset("lib/bootstrap-timepicker/js/bootstrap-timepicker.js")}}></script>
<script src={{asset("lib/advanced-form-components.js")}}></script>
<script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
<script>



ClassicEditor
    .create( document.querySelector( '#editor' ), {
        removePlugins: [ 'Link' ],
        toolbar: [ 'Heading', 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote',]
    } )
    .catch( error => {
        console.log( error );
    } );

$('#resetEvento').click(function(){
    location.reload();
});


$('#opEvento').change(function(){
    var op = $('#opEvento').val();
    if(op == 'online'){
        $('#form-locale').slideUp();
    }
    else{
        $('#form-locale').slideDown();
    }
});
$('.dinheiro').mask('#.##0,00', {reverse: true}).append('R$');


$('#ingressoGratuito').click(function(){
    $('#ingressoPago').text('Ingresso pago');
    $('#ingressoGratuito').attr('class', 'btn btn-success');
    $('#ingressoGratuito').html('Ingresso gratuito <i class="fa fa-check"></i>');
    $('#ingressoPago').attr('class', 'btn btn-info');
	 $('#dinheiroIngresso').slideUp();
});

$('#ingressoPago').click(function(){
    $('#ingressoGratuito').text('Ingresso gratuito');
    $('#ingressoPago').html('Ingresso pago <i class="fa fa-check"></i>');
	$('#ingressoGratuito').attr('class', 'btn btn-info');
	$('#ingressoPago').attr('class', 'btn btn-success');
	$('#dinheiroIngresso').slideDown();
});

    $(".dpd1").datepicker({
    format: 'dd/mm/yyyy',
    language: 'pt'
});
    $(".dpd2").datepicker({
    format: 'dd/mm/yyyy',
    language: 'pt'
});
$('#excluirBanner').click(function(){
	$('#prevBanner').attr('src', "{!!asset('img/bannerDefault.png')!!}");
	$('#bannerEmp').val('');
	$('#prevBanner').hover(function(){
	$(this).css('opacity', '1');
	$('#excluirBanner').hide();
});
});
$('#prevBanner').hover(function(){
	$(this).css('opacity', '1');
	$('#excluirBanner').hide();
});



$('#bannerEmp').change(function(){
;
	$('#prevBanner').hover(function(){
		$(this).css('opacity', '0.6');
		$('#excluirBanner').show();
	},
	function(){
		$(this).css('opacity', '1');
	});
	$('#excluirBanner').hover(function(){
		$('#prevbanner').css('opacity', '0.6');
		$('#excluirBanner').show();
	},
	function(){
		$('#prevBanner').css('opacity', '1');
	});

	var imagem = document.querySelector('input[name=banner]').files[0];
	var preview = document.getElementById('prevBanner');
	var reader = new FileReader();

	reader.onload = function(){
		preview.src = reader.result;
	}

	if(preview){
		reader.readAsDataURL(imagem);
	}else{
		preview.src = '';
	}
});

</script>
@endsection
@endsection

