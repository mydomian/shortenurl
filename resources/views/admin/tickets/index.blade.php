@extends('admin.layouts.master')
@section('admin-content')
    <div class="row py-3">
        <div class="col-md-12">
            @foreach ($tickets as $ticket)
                <div class="card {{ $ticket->status ? 'card-danger' : 'card-info' }} collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title"><b>Issue Title : </b> {{ $ticket->ticket_title ?? '' }} |
                            {{ $ticket->created_at->format('Y-m-d') ?? '' }}</h3>
                        <div class="card-tools">
                            @if ($ticket->status == true)
                                <a href="#" class="btn btn-sm btn-secondary disabled">
                                    Already Closed
                                </a>
                            @else
                                <a href="#" data-href="{{ route('admin.ticket.status', $ticket->id) }}" class="btn btn-sm btn-warning status-ticket">
                                    Try to Close
                                </a>
                            @endif

                            <button type="button" class="btn btn-sm btn-dark" data-card-widget="collapse">
                                <i class="fas fa-plus"></i>
                                View
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        {{ $ticket->ticket_issues ?? '' }}
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection

@push('admin-scripts')
    <script>
        $(document).ready(function() {
            $('.status-ticket').on('click', function(e) {
                e.preventDefault();
                var href = $(this).data('href');
                if (confirm('Are you sure you want to Close this ticket?')) {
                    window.location.href = href;
                }
            });
        });
    </script>
@endpush
