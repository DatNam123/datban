<x-app-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <a href="{{route('admin.posts.index')}}" class="btn btn-primary mb-4"><i class="fa-solid fa-circle-left"> Back</i></a>

                    <form action="{{route('admin.posts.update',$post->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    <div class="form-floating mb-3">
                        <input type="text"
                         class="form-control @error('title') is-invalid @enderror"
                         value="{{$post->title}}" name="title" id="title"
                        placeholder="title">
                        <label for="title">Title</label>
                        @error('title')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                    </div>
                    <div class=" mb-3">
                        <label for="image"  class="form-babel">Image</label>
                        <input class="form-control bg-dark @error('image') is-invalid @enderror" type="file" id="image" name="image">
                        @error('image')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" value="{{$post->excerpt}}"
                         class="form-control @error('excerpt') is-invalid @enderror" name="excerpt" id="excerpt"
                        placeholder="excerpt">
                        <label for="excerpt">Excerpt</label>
                        @error('excerpt')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="body">Description</label>
                        <textarea class="ckeditor form-control @error('description') is-invalid @enderror" name="body" placeholder="Description for category"
                            id="body" style="height: 150px;">{{$post->body}}</textarea>
                            @error('body')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="checkbox" name="is_published"  @checked(old('is_published', $post->is_published))>
                        <label for="is_published">Show Post</label>
                        
                    </div>
                    <button type="submit" class="btn btn-primary mt-2"><i class="fa-solid fa-circle-arrow-up"> Update</i></button>

                </form>
                </div>
            </div>
        </div>
    </div>        
 </x-app-layout>
 