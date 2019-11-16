@extends('templetes.site')

@section('links')
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Open+Sans+Condensed:300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href={{asset('css/blog.css')}}>
    <link href={{asset('css/blog-single.css')}} rel="stylesheet">
    <link href={{asset('css/style-empresa.css')}} rel="stylesheet">

@endsection

@section('titulo','SALGUEIRO BUSCA RÁPIDO: NOTÍCIA ')

@section('conteudo')
@include('templetes.top-menu')
<section class="blog">
    <div class="container-blog text-center">
            <h1>Titulo do Post</h1>
        <div class="lis">  
            <a href="#" style="color:#d1d1d1">Home</a>
            <a class="ponto">.</a>
            <a href="#" style="color:#d1d1d1">Blog</a>
            <a class="ponto">.</a>
            <a href="#">Blog-pagina</a>
        </div>
        
        <div class="lestget">
            <a href="#postagem">Ler Postagem</a>
        </div>
        <div class="row">
            <div class="post-detalhes">
                <div class="avatar-blog">
                    <img src={{asset('img/ui-sam.jpg')}}>
                    <p>Joao Farias</p>
                </div>
                <div class="horario">
                    <i class="fas fa-clock"></i><p>22 Abril 2019</p>
                </div>
                <div class="coment">
                    <i class="fas fa-comments"></i><p>3 Comentarios</p>
                </div>
                <div class="share-blog">
                    <div class="dropdown">
                        
                        <button style="background-color:transparent; border:none;"class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-share-alt"></i>
                        </button>
                        
                        <div class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#"><i class="fab fa-facebook-square"style="color:black;"></i></a>
                            <a class="dropdown-item" href="#"><i style="color:black;" class="fab fa-whatsapp-square"></i></a>
                        </div>
                        </div>
                </div>
            </div>   
        </div>
    </div>
</section>

<section id="postagem" class="postagem">
    <div class="container">
        <div class="artigo">
            <article>
                
                <div class="dropdown-divider"></div><br>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus luctus elementum nunc, non efficitur risus tempus non. Nunc et augue ac ante maximus vulputate et non erat. Praesent tristique convallis mollis. Integer at blandit massa. Curabitur vehicula nibh a erat porttitor varius at auctor orci. Sed commodo pretium ligula at pretium. Vestibulum dui ligula, blandit vel tincidunt ut, aliquet et erat. Proin id pharetra orci. Nulla viverra lectus elit, sed ultricies sem sagittis quis. Nam congue in augue porta accumsan. Vestibulum sapien nibh, convallis ut sagittis vitae, pellentesque elementum ipsum. Praesent ornare auctor accumsan. Donec ac fringilla metus.

                Curabitur vitae aliquam nisl. Praesent tincidunt est sed risus fringilla ornare. Pellentesque sapien velit, accumsan sed ipsum eu, vehicula condimentum tortor. Cras iaculis, justo id bibendum sollicitudin, nisl magna molestie massa, a commodo elit quam lacinia lectus. Maecenas bibendum nisl in enim mollis malesuada. Mauris blandit eros eget commodo euismod. Curabitur vel odio sit amet tortor feugiat consequat. Aenean et tempor lorem. Nunc sagittis tristique mauris non tristique. Proin condimentum arcu nec justo placerat tincidunt. Nam dictum odio ullamcorper, tincidunt massa blandit, gravida risus. Quisque blandit consectetur augue a malesuada. Curabitur euismod pellentesque purus, eu pharetra orci elementum ac. Proin gravida ligula a purus tempor, in pellentesque lectus auctor.

                Ut quis eleifend urna, in lacinia lorem. Phasellus volutpat interdum tellus eget tristique. Aliquam nec pretium ante. Pellentesque leo arcu, auctor nec blandit at, finibus vel mauris. Proin ac tortor a velit varius imperdiet tempus a purus. Nam luctus, est eget vestibulum faucibus, mi libero euismod lectus, quis hendrerit ipsum enim sit amet ex. Proin non risus varius velit dignissim maximus id nec ipsum.</p>
                <h4>All Stunning Places</h4>
                
                <ol>
                    <li>It is a long established fact that a reader will be distracted by the readable content.</li>
                    <li>Lorem Ipsum their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have many web sites still in their infancy.</li>
                    <li>It is a long established fact that a reader will be distracted by the readable content.</li>
                </ol>
                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution ofevolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                    
                <div class="citacao">
                    <blockquote>
                        
                        <h5><em>"Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy Etiam porta sem malesuada magna mollis euismod. Maecenas sed diam eget risus varius blandit sit amet non magna. Vivamus sagittis lacus vel augue laoreet."</em></h5>
                    </blockquote>
                </div>
                <div class="dropdown-divider"></div><br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="img-blog">
                            <img src="img/header 2.jpg" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="img-blog">
                            <img src="img/negocio.jpg" class="img-fluid">
                        </div>
                    </div>
                </div>
                <h4>Text That Where It Came From It</h4>
                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution ofevolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                <div class="dropdown-divider"></div><br>

                <div class="row">
                    <div class="btn-seta">
                        <div class="prev">
                            <i class="fas fa-chevron-left"></i>
                            <a href="#" color="#f9f9f9">Prev</a>
                            <p>Meu negocio minha vida<p>
                        </div>
                        <div class="next">
                            <a href="#" color="#f9f9f9">Next</a>
                            <i class="fas fa-chevron-right"></i>
                            <p>As oportunidades do empreendorismo<p>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>
</section>

<section id="reviwes">
    <div class="container comentarios-empresa">
    <h4>Comentarios</h4>
    <div class="block">
        <div class="row">
            <div class="col-md-2">
                <div class="img-comentarios">
                    <img src={{asset('img/1.jpg')}} class="img-fluid">
                </div>
            </div>
                <div class="col-md-7">
                    <h5>Jessica Martins<h5>
                </div>
            <div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <blockquote>
                    <p>" Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus sollicitudin mauris. "</p>    
                    <div class="calendario-post">
                        <span><i class="fas fa-calendar-alt"></i></span><p>12 Junho 2019</p>
                    </div>
                </blockquote>
            </div>
        </div>
        </div>
        </div>
        <div class="block">
        <div class="row">
            <div class="col-md-2">
                <div class="img-comentarios">
                    <img src={{'img/1.jpg'}} class="img-fluid">
                </div>
            </div>
                <div class="col-md-7">
                    <h5>Jessica Martins<h5>
                </div>
            <div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <blockquote>
                    <p>" Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus sollicitudin mauris. "</p>    
                    <div class="calendario-post">
                        <span><i class="fas fa-calendar-alt"></i></span><p>12 Junho 2019</p>
                    </div>
                </blockquote>
            </div>
        </div>
        </div>
        </div>
        <div class="block">
        <div class="row">
            <div class="col-md-2">
                <div class="img-comentarios">
                    <img src={{asset('img/1.jpg')}} class="img-fluid">
                </div>
            </div>
                <div class="col-md-7">
                    <h5>Jessica Martins<h5>
                </div>
            <div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <blockquote>
                    <p>" Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus sollicitudin mauris. "</p>    
                    <div class="calendario-post">
                        <span><i class="fas fa-calendar-alt"></i></span><p>12 Junho 2019</p>
                    </div>
                </blockquote>
            </div>
        </div>
        </div>

        </div>
    </div>
</section>

<section id="contato">
    <div class="container contato-empresa">
        <h4>Adicionar comentário</h4>
        <form action="" method="GET" enctype="multipart/form-data">

            <div class="mensagem-empresa">
                <div class="tex-input">
                    <label for="nome"><i class="fas fa-user-alt"></i></label>
                    <input type="text"placeholder="Digite seu nome" id="nome" name="nome">
                </div>
                <div class="mensagem-empresa">
                <label for="email"><i class="fas fa-envelope"></i></label>
                <input type="email" placeholder="Digite seu email" id="email" name="email">
                </div>
                <div class="text-area">
                    <textarea id="message" name="message" placeholder="Digite seu comentario..."></textarea>
                </div>
            </div>
            <div class="btn-enviar-comentario">
                <label for="enviar">Enviar comentário<i class="fas fa-paper-plane"></i></label>
                <input type="submit" id="enviar" name="enviar">    
            </div>
        </form>
    </div>
</section>

<section class="chamada-usuario-cadastro">
    <div class="container-cadastro">
        <h2>SEJA MEMBRO DA NOSSA COMUNIDADE!</h2>
        <p>Se cadastre no site e tenha as melhores notícias</p>
        <a href={{route('cadastro.site')}}>Entrar <i class="fas fa-sign-in-alt"></i></a>
    </div>
</section>


@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	 <script src={{asset('js/menu-fixo.js')}}></script>
@endsection