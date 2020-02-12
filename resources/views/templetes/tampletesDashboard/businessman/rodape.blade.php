
<section class="footer-empresa"  style="position:relative; z-index:1">
    <div class="container">
        <div class="row" style="z-index:-1 !important;">
            <div class="col-md-12"  >
                <img src={{asset('img/logofinal1.png')}}>
            </div>
            <div class="col-md-9">
            <span>© Salgueiro Busca Rapido 2020 . Todos os direitos resevados.</span> <br>
				<p>Templete Empresarial criado por  <a href="https://templatemag.com/">TemplateMag</a></p>
            <a href={{route('privacidade')}}>Política de Privacidade</a> / <a href={{route('condicoes')}}>Termos e condições</a>
            </div>
            <div class="col-md-3">
                    <a href="https://www.facebook.com/salgueirosbr/"><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-instagram"></i></i></a>
                    <a href="https://api.whatsapp.com/send?phone=5587988382558"><i class="fa fa-whatsapp"></i></a>
            </div>
        </div>
    </div>
</section>
<script
      src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"
      integrity="sha384-xBuQ/xzmlsLoJpyjoggmTEz8OWUFM0/RC5BsqQBDX2v5cMvDHcMakNTNrHIW2I5f"
      crossorigin="anonymous"
    ></script>
<script src={{asset('lib/bootstrap/js/bootstrap.min.js')}}></script>
<script class="include" type="text/javascript" src={{asset('lib/jquery.dcjqaccordion.2.7.js')}}></script>
<script src={{asset('lib/jquery.scrollTo.min.js')}}></script>
<script src={{asset('lib/jquery.nicescroll.js')}} type="text/javascript"></script>
<script src={{asset('lib/jquery.sparkline.js')}}></script>
<script src={{asset('lib/common-scripts.js')}}></script>
<script type="text/javascript" src={{asset('lib/gritter/js/jquery.gritter.js')}}></script>
<script type="text/javascript" src={{asset('lib/gritter-conf.js')}}></script>
<script type="text/javascript" src={{asset('js/jBox.all.js')}}></script>
<script type="text/javascript" src={{asset('js/demo.js')}}></script>
<script src={{asset("lib/sparkline-chart.js")}}></script>
<script src={{asset("lib/zabuto_calendar.js")}}></script>

<script>


		var dadosInfo = $('#percentAtual').attr('aria-details');
		if(dadosInfo==100 && decisao =="ok"){
		window.onload = function() {
			var segundos = 4;
			setTimeout(function () {

		var n = new jBox('Notice', {
		content: 'Você completou suas informações!',
		color: 'green',
		animation: 'fli',
			attributes: {
				x: 'left',
				y: 'top'
			},
		audio: '../audio/bling4',
		delayOnHover: true,
		showCountdown: true
		});

			}, segundos * 1000);
			};
		}
</script>
<script>

	function carregarInfo(){
		var idUser = {{Auth::id()}};

		$.getJSON('../api/painel/info/user/'+idUser , function(data){
		$('#avatar-menu').attr('src', "{!!asset('storage/avatar/"+data.avatar+"')!!}");
		});
	}

	$(function(){
		carregarInfo();
	});
</script>
@yield('scripts')

</body>
</html>
