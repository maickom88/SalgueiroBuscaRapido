	<footer class="site-footer">
		<div class="text-center">
			<p>
				&copy; Copyrights <strong>Salgueiro Busca Rápido</strong>. Todos os direitos reservados!
			</p>
			<div class="credits">
				Criado com Dashio template by <a href="https://templatemag.com/">TemplateMag</a>
			</div>
			<a href="paineluser.html#" class="go-top">
				<i class="fa fa-angle-up"></i>
			</a>
		</div>
	</footer>
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
<script type="text/javascript" language="javascript" src={{asset("lib/advanced-datatable/js/jquery.dataTables.js")}}></script>
  <script type="text/javascript" src={{asset("lib/advanced-datatable/js/DT_bootstrap.js")}}></script>
<script src={{asset('lib/common-scripts.js')}}></script>
<script type="text/javascript" src={{asset('lib/gritter/js/jquery.gritter.js')}}></script>
<script type="text/javascript" src={{asset('lib/gritter-conf.js')}}></script>


<script type="text/javascript" src={{asset('js/jBox.all.js')}}></script>
<script type="text/javascript" src={{asset('js/demo.js')}}></script>


<script>
  
	var decisao = $('#grabMe').attr('aria-details')
	
	if(decisao == "ok"){
		var modal = new jBox('Modal', {
		attach: '#test',
		title: '<div width="100%" class="text-center"><i class="fa fa-check fa-3x" style="color: green"></i></div>',
		content: $('#grabMe'),
		animation: 'zoomIn',
		audio: '../audio/bling2',
		volume: 80,
		closeButton: true,
		delayOnHover: true,
		showCountdown: true
	})
	modal.open();
	}

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

@yield('scripts')

</body>
</html>
