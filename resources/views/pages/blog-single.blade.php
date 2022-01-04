@extends('layouts.master_home')

@section('home_content')


    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Blog</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Blog</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container">

        <div class="row">

          <div class="col-lg-8 entries">

            <article class="entry entry-single" data-aos="fade-up">

              <div class="entry-img">
                <img src="assets/img/blog-1.jpg" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="blog-single.html">{{ $blog->title }}</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="blog-single.html">{{ $blog->user_id }}</a></li>
                  <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">{{ $blog->created_at }}</time></a></li>
                  {{-- <li class="d-flex align-items-center"><i class="icofont-comment"></i> <a href="blog-single.html">12 Comments</a></li> --}}
                </ul>
              </div>

              <div class="entry-content">
                {!! $blog->body !!}

              </div>

              <div class="entry-footer clearfix">
                <div class="float-left">
                  <i class="icofont-folder"></i>
                  <ul class="cats">
                    <li><a href="#">Business</a></li>
                  </ul>

                  <i class="icofont-tags"></i>
                  <ul class="tags">
                    <li><a href="#">Creative</a></li>
                    <li><a href="#">Tips</a></li>
                    <li><a href="#">Marketing</a></li>
                  </ul>
                </div>

                <div class="float-right share">
                  <a href="" title="Share on Twitter"><i class="icofont-twitter"></i></a>
                  <a href="" title="Share on Facebook"><i class="icofont-facebook"></i></a>
                  <a href="" title="Share on Instagram"><i class="icofont-instagram"></i></a>
                </div>

              </div>

            </article><!-- End blog entry -->

            <div class="blog-author clearfix" data-aos="fade-up">
              <img src="data:image/jpeg;base64,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" class="rounded-circle float-left" alt="">
              <h4>Jane Smith</h4>
              <div class="social-links">
                <a href="https://twitters.com/#"><i class="icofont-twitter"></i></a>
                <a href="https://facebook.com/#"><i class="icofont-facebook"></i></a>
                <a href="https://instagram.com/#"><i class="icofont-instagram"></i></a>
              </div>
              <p>
                Itaque quidem optio quia voluptatibus dolorem dolor. Modi eum sed possimus accusantium. Quas repellat voluptatem officia numquam sint aspernatur voluptas. Esse et accusantium ut unde voluptas.
              </p>
            </div><!-- End blog author bio -->

            <div class="blog-comments" data-aos="fade-up">

              <h4 class="comments-count">8 Comments</h4>

              <div id="comment-1" class="comment clearfix">
                <img src="https://picsum.photos/200/300" class="comment-img  float-left" alt="">
                <h5><a href="">Georgia Reader</a> <a href="#" class="reply"><i class="icofont-reply"></i> Reply</a></h5>
                <time datetime="2020-01-01">01 Jan, 2020</time>
                <p>
                  Et rerum totam nisi. Molestiae vel quam dolorum vel voluptatem et et. Est ad aut sapiente quis molestiae est qui cum soluta.
                  Vero aut rerum vel. Rerum quos laboriosam placeat ex qui. Sint qui facilis et.
                </p>

              </div><!-- End comment #1 -->

              <div id="comment-2" class="comment clearfix">
                <img src="https://picsum.photos/200/300" class="comment-img  float-left" alt="">
                <h5><a href="">Aron Alvarado</a> <a href="#" class="reply"><i class="icofont-reply"></i> Reply</a></h5>
                <time datetime="2020-01-01">01 Jan, 2020</time>
                <p>
                  Ipsam tempora sequi voluptatem quis sapiente non. Autem itaque eveniet saepe. Officiis illo ut beatae.
                </p>

                <div id="comment-reply-1" class="comment comment-reply clearfix">
                  <img src="https://picsum.photos/200/300" class="comment-img  float-left" alt="">
                  <h5><a href="">Lynda Small</a> <a href="#" class="reply"><i class="icofont-reply"></i> Reply</a></h5>
                  <time datetime="2020-01-01">01 Jan, 2020</time>
                  <p>
                    Enim ipsa eum fugiat fuga repellat. Commodi quo quo dicta. Est ullam aspernatur ut vitae quia mollitia id non. Qui ad quas nostrum rerum sed necessitatibus aut est. Eum officiis sed repellat maxime vero nisi natus. Amet nesciunt nesciunt qui illum omnis est et dolor recusandae.

                    Recusandae sit ad aut impedit et. Ipsa labore dolor impedit et natus in porro aut. Magnam qui cum. Illo similique occaecati nihil modi eligendi. Pariatur distinctio labore omnis incidunt et illum. Expedita et dignissimos distinctio laborum minima fugiat.

                    Libero corporis qui. Nam illo odio beatae enim ducimus. Harum reiciendis error dolorum non autem quisquam vero rerum neque.
                  </p>

                  <div id="comment-reply-2" class="comment comment-reply clearfix">
                    <img src="https://picsum.photos/200/300" class="comment-img  float-left" alt="">
                    <h5><a href="">Sianna Ramsay</a> <a href="#" class="reply"><i class="icofont-reply"></i> Reply</a></h5>
                    <time datetime="2020-01-01">01 Jan, 2020</time>
                    <p>
                      Et dignissimos impedit nulla et quo distinctio ex nemo. Omnis quia dolores cupiditate et. Ut unde qui eligendi sapiente omnis ullam. Placeat porro est commodi est officiis voluptas repellat quisquam possimus. Perferendis id consectetur necessitatibus.
                    </p>

                  </div><!-- End comment reply #2-->

                </div><!-- End comment reply #1-->

              </div><!-- End comment #2-->

              <div id="comment-3" class="comment clearfix">
                <img src="https://picsum.photos/200/300" class="comment-img  float-left" alt="">
                <h5><a href="">Nolan Davidson</a> <a href="#" class="reply"><i class="icofont-reply"></i> Reply</a></h5>
                <time datetime="2020-01-01">01 Jan, 2020</time>
                <p>
                  Distinctio nesciunt rerum reprehenderit sed. Iste omnis eius repellendus quia nihil ut accusantium tempore. Nesciunt expedita id dolor exercitationem aspernatur aut quam ut. Voluptatem est accusamus iste at.
                  Non aut et et esse qui sit modi neque. Exercitationem et eos aspernatur. Ea est consequuntur officia beatae ea aut eos soluta. Non qui dolorum voluptatibus et optio veniam. Quam officia sit nostrum dolorem.
                </p>

              </div><!-- End comment #3 -->

              <div id="comment-4" class="comment clearfix">
                <img src="https://picsum.photos/200/300" class="comment-img  float-left" alt="">
                <h5><a href="">Kay Duggan</a> <a href="#" class="reply"><i class="icofont-reply"></i> Reply</a></h5>
                <time datetime="2020-01-01">01 Jan, 2020</time>
                <p>
                  Dolorem atque aut. Omnis doloremque blanditiis quia eum porro quis ut velit tempore. Cumque sed quia ut maxime. Est ad aut cum. Ut exercitationem non in fugiat.
                </p>

              </div><!-- End comment #4 -->

              <div class="reply-form">
                <h4>Leave a Reply</h4>
                <p>Your email address will not be published. Required fields are marked * </p>
                <form action="">
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input name="name" type="text" class="form-control" placeholder="Your Name*">
                    </div>
                    <div class="col-md-6 form-group">
                      <input name="email" type="text" class="form-control" placeholder="Your Email*">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <input name="website" type="text" class="form-control" placeholder="Your Website">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <textarea name="comment" class="form-control" placeholder="Your Comment*"></textarea>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Post Comment</button>

                </form>

              </div>

            </div><!-- End blog comments -->

          </div><!-- End blog entries list -->

          <div class="col-lg-4">

            @include('layouts.body.blog_master')

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->

@endsection
