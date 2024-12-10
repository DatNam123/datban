<x-app-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <a href="{{route('admin.posts.create')}}" class="mb-4 btn btn-primary">New Post</a>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Author</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($posts as $post)
                                <tr>
                                    <td>{{$post->title}}</td>
                                    <td>
                                        <img
                                            src="{{Storage::url($post->image)}}"
                                            alt=""
                                            width="100%"
                                            height="200px"
                                            style="object-fit: cover"
                                        />
                                    </td>
                                    <td>{{$post->is_published == 1 ? 'Posted' : 'Hidden'}}</td>
                                    <td>{{$post->user->name == Auth::user()->name ? "You" : $post->user->name}}</td>
                                    @if ($post->user->name == Auth::user()->name )
                                    <td>
                                        <div class="d-flex">
                                        <a href="{{route('admin.posts.edit',$post->id)}}" class="btn btn-info me-2"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="{{route('admin.posts.show',$post->id)}}" class="btn btn-success me-2"><i class="fa-solid fa-circle-info"></i></a>
                                        <form class=""
                                            method="POST"
                                            action="{{route('admin.posts.destroy',$post->id)}}"
                                            onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </div>
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                            
                                
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end">{{$posts->links()}}</div>
                </div>
            </div>
        </div>

    </div>
 </x-app-layout>
 