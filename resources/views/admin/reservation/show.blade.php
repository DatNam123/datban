<x-app-layout>
    <div class="container-fluid pt-4 px-4 d-flex  " style="height: 80vh;justify-content:center;align-items:center">
        <div class="" >
            <form action="{{ route('admin.reservation.updateStatus', $reservation->id) }}" method="POST">
                @csrf
                @method('PUT')
                <label for="status">Table reservation status:</label>
                <select  name="status" id="status">
                    <option value="pending" {{ $reservation->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="confirmed" {{ $reservation->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                    <option value="canceled" {{ $reservation->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
                </select>
                <button class="btn btn-primary ms-2" type="submit">Update status</button>
            </form>
        </div>
    </div>
</x-app-layout>