
    <div class="sidebar" data-aos="fade-left">

        <h3 class="sidebar-title">Search</h3>
        <div class="sidebar-item search-form">
            <form action="/blog">
                <input type="text" name="search">
                <button type="submit"><i class="icofont-search"></i></button>
            </form>

        </div><!-- End sidebar search formn-->

        <h3 class="sidebar-title">Categories</h3>
        <div class="sidebar-item categories">
            <ul>
                @foreach ($categories as $cate)
                    <li><a href="/blog?{{ $cate->category_name }}">{{ $cate->category_name }}</a></li>
                @endforeach
            </ul>

        </div><!-- End sidebar categories-->

        <h3 class="sidebar-title">Recent Posts</h3>
        <div class="sidebar-item recent-posts">
            @foreach ($allBlog as $blog)
                <div class="post-item clearfix">
                    <img src="{{ env('APP_URL')}}/{{ $blog->image }}" alt="">
                    <h4><a href="{{ env('APP_URL')}}/blog/{{ $blog->id }}">{{ $blog->title }}</a></h4>
                    <time datetime="2020-01-01">{{ $blog->created_at }}</time>
                </div>
            @endforeach
        </div><!-- End sidebar recent posts-->

        {{-- <h3 class="sidebar-title">Tags</h3>
        <div class="sidebar-item tags">
            <ul>
                <li><a href="#">App</a></li>
                <li><a href="#">IT</a></li>
                <li><a href="#">Business</a></li>
                <li><a href="#">Business</a></li>
                <li><a href="#">Mac</a></li>
                <li><a href="#">Design</a></li>
                <li><a href="#">Office</a></li>
                <li><a href="#">Creative</a></li>
                <li><a href="#">Studio</a></li>
                <li><a href="#">Smart</a></li>
                <li><a href="#">Tips</a></li>
                <li><a href="#">Marketing</a></li>
            </ul>

        </div> --}}
        <!-- End sidebar tags-->


