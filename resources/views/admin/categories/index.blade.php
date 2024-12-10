<x-app-layout>
    
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <a href="{{route('admin.categories.create')}}" class="mb-4 btn btn-primary">New Category</a>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Name Category</th>
                                    <th scope="col">List Menus</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                <tr>
                                    <td>{{$category->name}}</td>
                                   
                                    <td>@foreach ($category->menus as $menu)
                                        <ul>
                                            <li>{{$menu->name}} - {{$menu->price}}$</li>
                                        </ul>
                                    @endforeach</td>
                                    <td>
                                        <div class="d-flex">
                                        <a href="{{route('admin.categories.edit',$category->id)}}" class="btn btn-info me-2"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <form class=""
                                            method="POST"
                                            action="{{route('admin.categories.destroy',$category->id)}}"
                                            onsubmit="return confirm('Are you sure you want to delete this category?')">
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
                </div>
            </div>
        </div>

    </div>
 </x-app-layout>
 