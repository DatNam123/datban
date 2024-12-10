<x-app-layout>
    <div class="container-fluid  pt-4 px-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h2>Show Post</h2>
                    <div class="row h-100 p-4 ">
                        <div class="col-md-6">
                                <div class="form-group">
                                    <strong class="text-primary">Title:</strong>
                                    {{$post->title}}
                                </div>
                        </div>
                        <div class="col-md-6">
                                <div class="form-group">
                                    <strong class="text-primary">Excerpt:</strong>
                                    {{$post->excerpt ?? 'No excerpt'}}
                                </div>
                        </div>
                        <div class="col-md-6">
                                <div class="form-group">
                                    <strong class="text-primary">Image:</strong>
                                    <img src="{{Storage::url($post->image)}}" width="100%" height="400"  style="object-fit: cover" alt="">
                                </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <strong class="text-primary">Body:</strong>
                                {!!$post->body!!}
                            </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Published:</strong>
                            {{$post->is_published == 1 ? "Post showed": "Post hidden"}}
                        </div>
                </div>
                    
                    </div>
                </div>
            </div>
        </div>
       
    </div>
</x-app-layout>