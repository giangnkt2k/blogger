@extends('layouts.master_home')

@section('home_content')

    <main id="main">

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
                        @for ($i = 0; $i < count($blogs); $i++)
                            <article class="entry" data-aos="fade-up">

                                <div class="entry-img">
                                    <img src="{{ env('APP_URL')}}/{{ $blogs[$i]->image }}" alt="" class="img-fluid">
                                </div>

                                <h2 class="entry-title">

                                    <a href="blog-single.html">{{ $blogs[$i]->title }}</a>
                                </h2>

                                <div class="entry-meta">
                                    <ul>
                                        <li class="d-flex align-items-center"><i class="icofont-user"></i> <a
                                                href="blog-single.html">{{ $packs[$i] }}</a></li>
                                        <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a
                                                href="blog-single.html"><time
                                                    datetime="2020-01-01">{{ $blogs[$i]->created_at }}</time></a></li>
                                    </ul>
                                </div>

                                <div class="entry-content">
                                    <p>
                                        {!! $blogs[$i]->short_dip !!}
                                    </p>
                                    <div class="read-more">
                                        <a href="{{ url('blog/' .$blogs[$i]->id) }}">Read More</a>
                                    </div>
                                </div>

                            </article><!-- End blog entry -->

                        @endfor

                        {{-- <div class="blog-pagination">
                            <ul class="justify-content-center">
                                <li><a href="{{ $blogs->previousPageUrl() }}"><i class="icofont-rounded-left"></a></i></li>
                                @for ($i = 1; $i <= $blogs->lastPage(); $i++)
                                <li><a href="{{ $blogs->path().'?page='.$i }}">{{ $i }}</a></li>
                                @endfor
                                <li><a href="{{$blogs->nextPageUrl()  }}"><i class="icofont-rounded-right"></i></a></li>
                            </ul>
                        </div> --}}
                        {{ $blogs->links('vendor.pagination.bootstrap-4') }}



                    </div><!-- End blog entries list -->

                    <div class="col-lg-4">

                      @include('layouts.body.blog_master')

                    </div><!-- End blog sidebar -->

                </div>

            </div>
        </section><!-- End Blog Section -->

    </main><!-- End #main -->
@endsection
