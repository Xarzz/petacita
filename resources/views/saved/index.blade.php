@extends('layouts.admin')

@section('content')
<div id="mainContent" class="content-transition lg:ml-64 pt-16 bg-primary min-h-screen">
    <div class="section-content p-6 fade-in max-w-7xl mx-auto">

    <h2 class="mb-4">Saved Items</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('info'))
        <div class="alert alert-info">{{ session('info') }}</div>
    @endif

    @if($savedItems->isEmpty())
        <p>Kamu belum menyimpan item apapun.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Item ID</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($savedItems as $item)
                    <tr>
                        <td>{{ ucfirst($item->item_type) }}</td>
                        <td>{{ $item->item_id }}</td>
                        <td>
                            <form action="{{ route('saved.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
</div>
@endsection
