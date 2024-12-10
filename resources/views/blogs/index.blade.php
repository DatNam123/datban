<x-guest-layout>
  @section('title', 'Stories - Feliciano Restaurant')

    <x-hero-card namePage="Blog" bg="images/bg_5.jpg" />
    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row">
              @foreach ($posts as $post)
              <div class="col-md-4 ftco-animate">
                <div class="blog-entry">
                  <a href="{{route('post.show',$post->id)}}" class="block-20" style="background-image: url({{Storage::url($post->image)}});">
                  </a>
                  <div class="text pt-3 pb-4 px-4">
                    <div class="meta">
                      <div><a href="#">{{$post->created_at->format('d-m-Y')}}</a></div>
                      <div><a href="#">{{$post->user->name}}</a></div>
                    </div>
                    <h3 class="heading"><a href="{{route('post.show',$post->id)}}">{{$post->title}}</a></h3>
                    <p class="clearfix">
                      <a href="{{route('post.show',$post->id)}}" class="float-left read">Read more</a>
                      {{-- <a href="#" class="float-right meta-chat"><span class="icon-chat"></span> 3</a> --}}
                    </p>
                  </div>
                </div>
              </div>
              @endforeach
    </div>
    <div class="row no-gutters mb-5 mt-2" style="display:flex;justify-content:center">
      {{$posts->links()}}
    </div>
        </div>
    </section>
</x-guest-layout>