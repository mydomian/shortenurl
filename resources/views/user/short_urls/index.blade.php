@extends('layouts.master')
@section('content')
    <div class="row py-3">
        <div class="col-md-12">
            <div class="d-flex justify-content-end py-3">
                <a href="{{ route('short-urls.create') }}" class="btn btn-dark btn-sm"> <i class="fa fa-plus"></i> Create Shorten URL</a>
            </div>
            @foreach ($shortUrls as $shortUrl)
                <div class="card card-info collapsed-card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="card-title"><b>Original URL: </b> <a class="text-danger"
                                        href="{{ $shortUrl->url ?? '#' }}" target="_blank">{{ $shortUrl->url ?? '#' }}</a>
                                </h5>
                                <h5 class="card-title mt-2"><b>Shorter URL: </b> <a class="text-danger"
                                        href="{{ route('shortUrl.redirect',$shortUrl->short_url) }}"
                                        target="_blank">{{ url($shortUrl->short_url) ?? '#' }}</a>
                                </h5>

                            </div>
                            <div class="col-6 d-flex justify-content-end align-items-center">
                                <div class="card-tools">
                                    <button type="button" class="btn btn-sm btn-dark" data-card-widget="collapse">
                                        <i class="fas fa-plus"></i>
                                        Statistics View
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="text-info">Total Shorter URL Clicks: <span
                                class="text-danger">{{ $shortUrl->click_count ?? 0 }}</span></h5>
                        <h5 class="text-info">Original URL: <a class="text-danger" href="{{ $shortUrl->url ?? '#' }}"
                                target="_blank">{{ $shortUrl->url ?? '#' }}</a></h5>
                        <h5 class="text-info">Shorter URL: <a class="text-danger"
                                href="{{ route('shortUrl.redirect',$shortUrl->short_url) }}"
                                target="_blank">{{ url($shortUrl->short_url) ?? '#' }}</a>
                        </h5>
                        <h5 class="text-info">Created At: <span
                                class="text-danger">{{ $shortUrl->created_at->format('Y-m-d') ?? date('Y-m-d') }}</span>
                        </h5>

                    </div>
                    <div class="card-footer">
                        <form action="{{ route('short-urls.destroy', $shortUrl->id) }}" method="POST"
                            style="display:inline;" onsubmit="return confirmDelete();">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fa fa-trash"></i> Delete
                            </button>
                        </form>

                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this URL?');
        }
    </script>
@endpush
