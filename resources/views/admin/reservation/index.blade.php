<x-app-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h5 class="mb-3">Reservation List</h5>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">UserName</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Guest number</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reservations as $reservation)
                                <tr>
                                    <td>{{$reservation->name}}</td>
                                    <td>{{$reservation->user->name}}</td>
                                    <td>{{$reservation->email}}</td>
                                    <td>{{$reservation->tel_number}}</td>
                                    <td>{{$reservation->res_date}}</td>
                                    <td>{{$reservation->guest_number}}</td>
                                    <td>{{$reservation->status}}</td>
                                    <td>{{$reservation->message}}</td>
                                    <td>
                                        <div class="d-flex justify-content-between">
                                            <a href="{{route('admin.reservation.show',$reservation->id)}}" class="btn btn-info" ><i class="fa-solid fa-list-check"></i></a>
                                        <form class=""
                                            method="POST"
                                            action="{{route('admin.reservation.destroy',$reservation->id)}}"
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
                </div>
            </div>
        </div>

    </div>
 </x-app-layout>
 