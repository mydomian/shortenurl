@extends('layouts.master')
@section('content')
    <div class="row py-3">
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Create Tickets</h3>
                </div>
                <form action="{{ route('tickets.store') }}" method="post" role="form">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="issueTitile">Issue Title</label>
                            <input type="text" name="ticket_title" class="form-control" id="issueTitile"
                                placeholder="Enter Issue Title" required>
                        </div>
                        <div class="form-group">
                            <label for="issues">Your Issues</label>
                            <textarea name="ticket_issues" class="form-control" id="issues" placeholder="Enter your issues" required></textarea>
                        </div>
                    </div>
                    <div class="card-footer float-right">
                        <button type="submit" class="btn btn-info">Create Ticket</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
