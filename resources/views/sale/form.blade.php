@extends('layout.app')

@section('content')
    <div class="container">
        <h2>Find Top Theater by Sales Date</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Error!</strong> Please fix the following issues:
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-warning">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('sale.show') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="sold_at">Select Date:</label>
                <input type="date" name="sold_at" id="sold_at" class="form-control" value="{{ old('sold_at') }}" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Find Top Theater</button>
        </form>
    </div>
@endsection

