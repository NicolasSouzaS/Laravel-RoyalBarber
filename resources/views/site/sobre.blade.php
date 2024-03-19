@extends('layout.layout')

@section('title','Sobre')

@section('conteudo')


    <section class="site-hero overlay" data-stellar-background-ratio="0.5" style="background-image: url(images/big_image_1.jpg);">
      <div class="container">
        <div class="row align-items-center site-hero-inner justify-content-center">
          <div class="col-md-8 text-center">

            <div class="mb-5 element-animate">
              <!-- <img src="images/banner_text_1.png" alt="Image placeholder" class="img-md-fluid"> -->
              <h1 class="mb-4">Sobre Nós</h1>
              <p class="lead">Tradição e estilo se encontram na Royal Barber: onde cada corte é uma obra-prima.</p>
            </div>

          </div>
        </div>
      </div>
    </section>
    <!-- END section -->

    <section class="quick-info element-animate" data-animate-effect="fadeInLeft">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 bgcolor">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="media">
                                <div class="mr-3 icon-wrap"><span class="icon ion-ios-telephone"></span></div>
                                <div class="media-body">
                                    <h5>11 951694143</h5>
                                    <p>Nos ligue 24/7, responderemos o mais rápido possível</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="media">
                                <div class="mr-3 icon-wrap"><span class="icon ion-location"></span></div>
                                <div class="media-body">
                                    <h5>Avenida Marechal Tito, 1500</h5>
                                    <p>São Paulo, São Paulo <br> CEP 08010-090 - Brasil</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="media">
                                <div class="mr-3 icon-wrap"><span class="icon ion-android-time"></span></div>
                                <div class="media-body">
                                    <h5>Diariamente: 8h - 22h</h5>
                                    <p>Segunda a Sábado <br> Domingo: Fechado</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END section -->


    <section>

        <h2>Sobre nós</h2>

        <div>Bem-vindo à Royal Barber, o seu destino definitivo para cuidados masculinos de primeira classe. Fundada com a missão de oferecer mais do que apenas um corte de cabelo, somos uma barbearia que valoriza a tradição, o estilo e a excelência em serviço.</div>

        <img src="{{ asset('images/sobre.jpeg') }}" alt="">

    </section>


    <section class="site-section pb-5">
        <div class="container">
          <div class="row mb-5 justify-content-center">
            <div class="col-md-8 text-center">
              <h1>Equipe</h1>
              <p class="lead">Conheça nossa equipe de talentosos barbeiros, dedicados a proporcionar a você o melhor em cuidados com o cabelo e barba.</p>
            </div>
          </div>
          <div class="row element-animate">
            <div class="col-md-6 video-wrap mb-5">
              <img src="images/img_5.jpg" alt="Imagem" class="img-fluid">
              <a href="https://vimeo.com/channels/staffpicks/93951774" class="popup-vimeo btn-video"><span class="fa fa-play"></span></a>
            </div>
            <div class="col-md-6 pl-md-5">
              <h3>Jay Ramzee</h3>
              <p class="lead">Barbeiro Especialista</p>
              <p>Nascido para cortar cabelos, Jay traz consigo anos de experiência e paixão pela arte da barbearia. Seu compromisso com a excelência garante que cada cliente saia da cadeira com um visual impecável e renovado.</p>
              <p>Quando não está transformando penteados, Jay gosta de passar seu tempo livre explorando novas técnicas de corte e estilos, sempre buscando inovação e perfeição.</p>
            </div>
          </div>
        </div>
      </section>
      <!-- Fim da seção -->

      <section class="pt-5 pb-5">
        <div class="container">
          <div class="row element-animate">
            <div class="col-md-6 video-wrap mb-5">
              <img src="images/img_7.jpg" alt="Imagem" class="img-fluid">
              <a href="https://vimeo.com/channels/staffpicks/93951774" class="popup-vimeo btn-video"><span class="fa fa-play"></span></a>
            </div>
            <div class="col-md-6 pl-md-5">
              <h3>Chris Worth</h3>
              <p class="lead">Barbeiro Especialista</p>
              <p>Chris é apaixonado por cortes de cabelo desde muito jovem, e sua dedicação à arte da barbearia é evidente em cada trabalho que realiza. Ele é conhecido por sua habilidade em entender as preferências individuais de cada cliente e transformá-las em realidade.</p>
              <p>Além de sua expertise em cortes clássicos e modernos, Chris é um mestre em cuidados com a barba, fornecendo conselhos e produtos personalizados para garantir que sua barba esteja sempre no seu melhor estado.</p>
            </div>
          </div>
        </div>
      </section>
      <!-- Fim da seção -->

      <section class="pt-5 pb-5">
        <div class="container">
          <div class="row element-animate">
            <div class="col-md-6 video-wrap mb-5">
              <img src="images/img_8.jpg" alt="Imagem" class="img-fluid">
              <a href="https://vimeo.com/channels/staffpicks/93951774" class="popup-vimeo btn-video"><span class="fa fa-play"></span></a>
            </div>
            <div class="col-md-6 pl-md-5">
              <h3>Dan Fisher</h3>
              <p class="lead">Barbeiro Especialista</p>
              <p>Com um olho aguçado para detalhes e uma paixão pela precisão, Dan é um barbeiro que supera as expectativas de seus clientes. Ele combina habilidades tradicionais com as técnicas mais recentes para oferecer cortes de cabelo e barba que impressionam.</p>
              <p>Além de seu talento para a arte da barbearia, Dan é conhecido por sua personalidade acolhedora e habilidade em criar um ambiente relaxante para seus clientes. Cada visita à sua cadeira é uma experiência única e rejuvenescedora.</p>
            </div>
          </div>
        </div>
      </section>
    <!-- END section -->

@endsection
