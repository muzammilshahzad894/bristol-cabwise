@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex align-items-center mb-4 flex-wrap">
        <h3 class="me-auto">Email Content Settings</h3>
    </div>
    <div class="row">
        @include('partials.messages')
        <div class="col-xl-12">
            <div class="table-responsive">
                <table class="table display mb-4 dataTablesCard card-table" id="example5">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Subject</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($emailContentSettings->count())
                            @foreach($emailContentSettings as $contentSetting)
                                <tr>
                                    <td>{{ $contentSetting->title }}</td>
                                    <td>{{ $contentSetting->subject }}</td>
                                    <td>
                                        <a href="{{ route('admin.email-content-settings.edit', $contentSetting->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
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
        </div>
    </div>
</div>
@endsection