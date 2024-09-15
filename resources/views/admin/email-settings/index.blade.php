@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex align-items-center mb-4 flex-wrap">
        <h3 class="me-auto">Email Settings</h3>
        <div>
            <a href="{{ route('admin.email-settings.create') }}" class="btn btn-primary me-3 btn-sm"><i class="fas fa-plus me-2"></i>Add New Email</a>
        </div>
    </div>
    <div class="row">
        @include('partials.messages')
        <div class="col-xl-12">
            <div class="table-responsive">
                <table class="table display mb-4 dataTablesCard job-table table-responsive-xl card-table" id="example5">
                    <thead>
                        <tr>
                            <th>User Name</th>
                            <th>User Email</th>
                            <th>Receiving Emails</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($emailSettings->count())
                            @foreach($emailSettings as $emailSetting)
                                <tr>
                                    <td>{{ $emailSetting->user_name }}</td>
                                    <td>{{ $emailSetting->user_email }}</td>
                                    <td>
                                        @foreach(explode(',', $emailSetting->receiving_emails) as $email)
                                            @php
                                                $sendEmail = \App\Models\SendingEmailList::where('label', $email)->first()->name;
                                            @endphp
                                            <span class="badge bg-primary m-2">{{ $sendEmail }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.email-settings.edit', $emailSetting->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('admin.email-settings.delete', $emailSetting->id) }}" 
                                        class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this email?')"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="text-center">No Records Found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center mt-3">
                {{ $emailSettings->links() }}
            </div>
        </div>
    </div>
</div>
@endsection