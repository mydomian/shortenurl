@extends('layouts.master')
@section('content')
    <div class="row py-3">
        <div class="col-md-12">
            @foreach ($tickets as $ticket)
                <div class="card card-info collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title"><b>Issue Title : </b> {{ $ticket->ticket_title ?? '' }} |
                            {{ $ticket->created_at->format('Y-m-d') ?? '' }}</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-sm {{ $ticket->status ? 'btn-danger' : 'btn-warning' }} disabled">
                                {{ $ticket->status ? 'Closed' : 'Pending' }}
                            </button>
                            <button type="button" class="btn btn-sm btn-dark" data-card-widget="collapse">
                                <i class="fas fa-plus"></i>
                                View
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        {{ $ticket->ticket_issues ?? '' }}
                    </div>
                    <div class="card-footer">
                        <a href="#" data-href="{{ route('ticket.destroy', $ticket->id) }}"
                            class="btn btn-sm btn-danger delete-ticket">
                            <i class="fa fa-trash"></i> Delete
                        </a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.delete-ticket').on('click', function(e) {
                e.preventDefault();
                var href = $(this).data('href');
                if (confirm('Are you sure you want to delete this ticket?')) {
                    window.location.href = href;
                }
            });
        });
    </script>
@endpush
