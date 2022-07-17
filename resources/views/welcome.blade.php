@extends('layouts.app')

@section('content')


    <!-- Main -->
    <main class="main">
      <!-- Dashboard Section -->
      <section class="home" id="home">
        <div class="home_container contain grid">
          <div class="home_img-bg">
            <img src="{{asset('img/home.png')}}" alt="picture" class="home_img" />
          </div>

          <div class="home_social">
            <a href="#" target="_blank" class="home_social-link"></a>
            <a href="#" target="_blank" class="home_social-link"></a>
            <a href="#" target="_blank" class="home_social-link"></a>
          </div>

          <div class="home_data">
            <h2 class="home_title">
              WELCOME 
              <br />
              TO OUR
               <br />
               FRUIT'S STORE
            </h2>
            <p class="home_description">
              Healthy Inside Fresh Outside <br />
              
            </p>
            <div class="home_btns">
              <a href="#" class="button button--gray button--small"> Explore </a>

              <a href="#products"><button class="button home_button">Shop Now</button></a>
            </div>
          </div>
        </div>
      </section>

      <!-- Services Section -->
      

      <!-- Featured Section -->
      <section class="featured section contain justify-content-center" id="featured">
        <h2 class="section_title">Recommendation</h2>

        <div class="featured_container grid">
            @foreach ($data as $item )
            @if ($item->is_sale == true)
                    <article class="featured_card">
                    <span class="featured_tag">Hot</span>

                    <img src="{{ asset($item->product_image) }}" alt="Product" class="featured_img" />

                    <div class="featured_data">
                    <h3 class="featured_title">{{ $item->title }}</h3>
                    <span class="featured_price">Rp. @php
                        echo  number_format($item->price)
                    @endphp</span>
                    </div>

                    <a href="{{ route('welcome.show', $item->slug) }}" class="btn btn-master btn-primary mt-3 button featured_button">Shop Now</a>
                </article>
            @endif

            @endforeach


          {{-- <article class="featured_card">
            <span class="featured_tag">Hot</span>

            <img src="{{asset('img/featured2.png')}}" alt="Product" class="featured_img" />

            <div class="featured_data">
              <h3 class="featured_title">Dragon Fruit</h3>
              <span class="featured_price">$1</span>
            </div>

            <a href="#" class="btn btn-master btn-primary mt-3 button featured_button">Shop Now</a>
          </article>

          <article class="featured_card">
            <span class="featured_tag">Hot</span>

            <img src="{{asset('img/featured3.png')}}" alt="Product" class="featured_img" />

            <div class="featured_data">
              <h3 class="featured_title">Pineapple</h3>
              <span class="featured_price">$2</span>
            </div>

            <a href="#" class="btn btn-master btn-primary mt-3 button featured_button">Shop Now</a>
          </article> --}}
        </div>
      </section>

      <!-- Story Section-->
      <section class="story section contain">
        <div class="story_container grid">
          <div class="story_data">
            <h2 class="section_title story_section-title">Our Story</h2>

            <h1 class="story_title">
              Fresh from the nature <br />
              
            </h1>

            <p class="story_description">We want you to enjoy the fruit fresh like new, in anywhere and anytime </p>

            <a href="#" class="button button--small">Explore</a>
          </div>

          <div class="story_images">
            <img src="{{asset('img/story.png')}}" alt="Story Image" class="story_img" />
            <div class="story_square"></div>
          </div>
        </div>
      </section>

      <br /><br /><br /><br /> <br />

      <!-- Products Section-->
      <section class="products section contain" id="products">
        <h2 class="section_title">Products</h2>

        <div class="products_container grid">

        @foreach ($data as $item)
            @if ($item->is_sale != true)
            <article class="products_card">
            <img src="{{ asset($item->product_image) }}"" alt="product" class="products_image" />

            <h3 class="products_title">{{ $item->title }}</h3>
            <span class="products_price"> Rp. @php
                        echo  number_format($item->price)
                    @endphp</span>

            <a href="{{ route('welcome.show', $item->slug)  }}" class="btn btn-master btn-primary mt-3">Shop Now</a>
          </article>
            @endif
        @endforeach


        </div>
      </section>

      <br /><br /><br /><br /> <br /><br />

      <!-- Testimonial Section -->
      <section class="testimonial section contain">
        <div class="testimonial_container grid">
          <div class="swiper testimonial-swiper p-3">
            <div class="swiper-wrapper">
              <div class="testimonial_card swiper-slide">
                <div class="testimonial_quote">
                  <i class="bx bxs-quote-alt-left"></i>
                </div>

                <p class="testimonial_description">
                  Amazing website, i'am already order and got the fruit very fresh  like pickup from the three, you should try and enjoy your fresh fruit everyday and anywhere also anytime.
                </p>
                <h3 class="testimonial_date">March 16. 2020</h3>

                <div class="testimonial_profil">
                  <img src="{{asset('img/testimonial1.jpg')}}" alt="" class="testimonial_profil-img" />

                  <div class="testimonial_profil-data">
                    <span class="testimonial_profil-name">Michael Pantow</span>
                    <span class="testimonial_profil-occupation">Freelancer</span>
                  </div>
                </div>
              </div>

              <div class="testimonial_card swiper-slide">
                <div class="testimonial_quote">
                  <i class="bx bxs-quote-alt-left"></i>
                </div>

                <p class="testimonial_description">
                Amazing website, i'am already order and got the fruit very fresh  like pickup from the three, you should try and enjoy your fresh fruit everyday and anywhere also anytime.
                </p>
                <h3 class="testimonial_date">June 22. 2021</h3>

                <div class="testimonial_profil">
                  <img src="{{asset('img/testimonial2.jpg')}}" alt="" class="testimonial_profil-img" />

                  <div class="testimonial_profil-data">
                    <span class="testimonial_profil-name">Feri Hwang</span>
                    <span class="testimonial_profil-occupation">Enterprenuer</span>
                  </div>
                </div>
              </div>

              <div class="testimonial_card swiper-slide">
                <div class="testimonial_quote">
                  <i class="bx bxs-quote-alt-left"></i>
                </div>

                <p class="testimonial_description">
                Amazing website, i'am already order and got the fruit very fresh  like pickup from the three, you should try and enjoy your fresh fruit everyday and anywhere also anytime.
                </p>
                <h3 class="testimonial_date">August 29. 2021</h3>

                <div class="testimonial_profil">
                  <img src="{{asset('img/testimonial3.jpg')}}" alt="" class="testimonial_profil-img" />

                  <div class="testimonial_profil-data">
                    <span class="testimonial_profil-name">Mao Zedong</span>
                    <span class="testimonial_profil-occupation">Police</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-button-next">
              <i class="bx bx-right-arrow-alt"></i>
            </div>
            <div class="swiper-button-prev">
              <i class="bx bx-left-arrow-alt"></i>
            </div>
          </div>
          <div class="testimonial_images">
            <div class="testimonial_square">
              <img src="{{asset('img/testimonial.png')}}" alt="" class="testimonial_img" />
            </div>
          </div>
        </div>
      </section> 

      <br /><br /><br /><br /> <br /><br />

      <!-- Newsletter Section -->
      <section class="service">
        <div class="container d-flex service mt-4">
          <div class="card-horizontal col-lg-3 col-12 justify-content-center">
            <div class="image">
              <img src="{{asset('img/carbon_delivery.png')}}" />
            </div>

            <div class="text">
              <span class="title">Fresh Guaranteed</span>
              <span class="title-description">Fresh Guaranteed 100%</span>
            </div>
          </div>

          <div class="card-horizontal col-lg-3 col-12 justify-content-center">
            <div class="image">
              <img src="{{asset('img/bxs_phone-call.png')}}" />
            </div>

            <div class="text">
              <span class="title">Order Anytime</span>
              <span class="title-description">Shopping in anywhere and anytime</span>
            </div>
          </div>
          <div class="card-horizontal col-lg-3 col-12 justify-content-center">
            <div class="image">
              <img src="{{asset('img/bi_shield-check.png')}}" />
            </div>

            <div class="text">
              <span class="title">Fast Deliver</span>
              <span class="title-description">So you can enjoy your order  </span>
            </div>
          </div>
        </div>
      </section>

      <br /> <br /><br />
    </main>

@endsection
