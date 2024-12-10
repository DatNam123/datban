<x-app-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h5 class="mb-3">Reviews List</h5>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Rating</th>
                                    <th scope="col">Content</th>
                                    <th scope="col">Status</th>
                                    
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reviews as $review)
                                <tr>
                                    <td>{{$review->user->name}}</td>
                                    <td>{{$review->rating}}</td>
                                    <td>{{$review->content}}</td>
                                    <td>{{$review->approved == 1 ? "Approved" : "Not Approved"}}</td>
                                   
                                    <td>
                                       @if ($review->approved == 1)
                                       <form class=""
                                       method="POST"
                                       action="{{route('admin.reviews.notApprove',$review->id)}}"
                                       onsubmit="return confirm('You definitely want this review hidden?')">
                                       @csrf
                                       @method('PATCH')
                                       <button class="btn btn-danger" type="submit"><i class="fa-solid fa-circle-xmark"></i></button>
                                   </form>
                                       @else
                                       <form class=""
                                       method="POST"
                                       action="{{route('admin.reviews.approve',$review->id)}}"
                                       onsubmit="return confirm('You definitely want this review to show up?')">
                                       @csrf
                                       @method('PATCH')
                                       <button class="btn btn-info" type="submit"><i class="fa-solid fa-check"></i></button>
                                   </form>
                                       @endif
                                       
                                       
                                      
                                        
                                       
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
 