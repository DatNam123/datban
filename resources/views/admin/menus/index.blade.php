<x-app-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <a href="{{route('admin.menus.create')}}" class="mb-4 btn btn-primary">New Menu</a>
                    <form action="{{ route('admin.menus.search') }}" method="GET" class="mb-3">
                        <div class="input-group">
                            <input type="text" name="query" class="form-control" placeholder="Search menu here">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Categories</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($menus as $menu)
                                <tr>
                                    <td>{{$menu->name}}</td>
                                    <td>
                                        <img
                                            src="{{Storage::url($menu->image)}}"
                                            alt=""
                                            width="300px"
                                            height="250px"
                                            style="object-fit: cover"
                                        />
                                    </td>
                                    <td>{{$menu->price}}</td>
                                    <td>
                                        @foreach ($menu->categories as $category)
                                        <div class="">
                                            {{$category->name}}
                                        </div>
                                        @endforeach
                                    </td>
                                    <td>{{$menu->description}}</td>
                                    <td>
                                        <div class="d-flex">
                                        <a href="{{route('admin.menus.edit',$menu->id)}}" class="btn btn-info me-2"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <form class=""
                                            method="POST"
                                            action="{{route('admin.menus.destroy',$menu->id)}}"
                                            onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end">{{$menus->links()}}</div>
                </div>
            </div>
        </div>

    </div>
 </x-app-layout>
 