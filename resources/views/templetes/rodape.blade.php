




<section class="footer-empresa">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <img src={{asset('img/logofinal1.png')}}>
            </div>
            <div class="col-md-9">
            <span>© Salgueiro Busca Rapido 2020. Todos os direitos resevados.</span><br>
				<a href={{route('privacidade')}}>Política de Privacidade</a> / <a href={{route('condicoes')}}>Termos e condições</a>
            </div>
            <div class="col-md-3">
                    <a target="_blank" href="https://www.facebook.com/salgueirosbr/"><i class="fab fa-facebook-square"></i></a>
                    <a target="_blank" href=""><i class="fab fa-instagram"></i></i></a>
                    <a target="_blank" href="https://api.whatsapp.com/send?phone=5587988382558"><i class="fab fa-whatsapp-square"></i></a>
            </div>
        </div>
    </div>
</section>

<script
      src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"
      integrity="sha384-xBuQ/xzmlsLoJpyjoggmTEz8OWUFM0/RC5BsqQBDX2v5cMvDHcMakNTNrHIW2I5f"
      crossorigin="anonymous"
    ></script>
<script src={{asset('js/typed.js')}}></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src={{asset('js/jquery-1.11.0.min.js')}}></script>
<script src={{asset('js/jquery-migrate-1.2.1.min.js')}}></script>
<script src={{asset('js/slick.min.js')}}></script>
<script src={{asset('js/menu-fixo.js')}}></script>
<script type="text/javascript" src={{asset('js/jBox.all.js')}}></script>

@yield('script')

<script>
	$(function(){
		$('#dropdownUser').click(function(){
			$('#balao').slideToggle(200);

		});


		$('#fecharMenu').click(function(){
			$('#balao').slideUp(200);
		});

		$('#dropdownMobile').click(function(){
			$('#balaoMobile').slideToggle(200);

		});


		$('#fecharMenuMenu').click(function(){
			$('#balaoMobile').slideUp(200);
		});
	});
</script>

</body>

</html>
