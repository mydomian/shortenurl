@extends('layouts.master')
@section('content')
    <div class="row py-3">
        <div class="col-md-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Create Short Url</h3>
                </div>
                <form action="{{ route('short-urls.store') }}" method="post" role="form">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="url">Enter URL: <span class="text-danger">(Note: A valid URL starting with http:// or https://)</span></label>
                            <input type="text" name="url" class="form-control" id="url"
                            placeholder="Please enter a valid URL starting with http:// or https://" required>
                        </div>
                    </div>
                    <div class="card-footer float-right">
                        <button type="submit" class="btn btn-info">Create Shorten</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
