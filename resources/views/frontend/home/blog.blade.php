@php
  $latestPosts = App\Models\BlogPost::latest()->limit(3)->get();
@endphp 

<section class="blog">
  <div class="container">
    <div class="row gx-0 justify-content-center">
      @foreach($latestPosts as $post)
        <div class="col-lg-4 col-md-6 col-sm-9">
          <div class="blog__post__item">
            <div class="blog__post__thumb">
              <a href="blog-details.html">
                <img src="{{ $post->image ? asset($post->image) : asset('uploads/no_image.jpg') }}" alt="">
              </a>
              <div class="blog__post__tags">
                <a href="{{ route('blog_posts_user.index') }}?category_id={{ $post->blogCategory->id }}">{{ $post->blogCategory->name }}</a>
              </div>
            </div>
            <div class="blog__post__content">
              <span class="date">{{ date('d M, Y', strtotime($post->created_at)) }}</span>
              <h3 class="title">{{ $post->title }}</h3>
              <a href="{{ route('blog_posts.show', $post->id) }}" class="read__more">Read mORe</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    <!-- <div class="blog__button text-center">
      <a href="blog.html" class="btn">more blog</a>
    </div> -->
  </div>
</section>