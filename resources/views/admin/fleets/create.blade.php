@extends('layouts.admin.app')

@section('styles')
    <style>
        .tax-row {
            border: 2px solid #F89723;
            padding: 3px;
            border-radius: 8px;
            margin-bottom: 13px;
        }
        .btn-primary {
            padding: 0.625rem 1rem !important;
        }
    </style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('partials.messages')
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add New Fleet</h4>
                </div>
                <div class="card-body">
                    @if($services->count() == 0)
                        <div class="alert alert-danger">Please add services first to add fleets.</div>
                    @else
                        <div class="basic-form">
                            <form action="{{ route('admin.fleets.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Service Type <span class="text-danger">*</span></label>
                                        <select name="service_id" class="form-control" required>
                                            <option value="">Select Service</option>
                                            @foreach($services as $service)
                                                <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>{{ $service->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('service_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}" required>
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Price / mile <span class="text-danger">*</span></label>
                                        <input type="number" name="price" class="form-control" placeholder="Price" value="{{ old('price') }}" required onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                        @error('price')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Image <span class="text-danger">*</span></label>
                                        <input type="file" name="image" class="form-control" placeholder="Image" value="{{ old('image') }}" required>
                                        @error('image')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <hr>
                                    <!-- Tax fields section -->
                                    <h4>Tax Section</h4>
                                    <div id="taxes-section">
                                        
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-success mb-3" onclick="addTaxRow()">Add Tax</button>
                                    </div>
                                    <hr>
                                    <!-- End tax fields section -->
                                </div>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    let taxIndex = 0;

    function addTaxRow() {
        const taxSection = document.getElementById('taxes-section');
        const newTaxRow = document.createElement('div');
        newTaxRow.classList.add('tax-row', 'row');

        newTaxRow.innerHTML = `
            <div class="mb-3 col-md-5">
                <label class="form-label">Tax Name</label>
                <input type="text" name="taxes[${taxIndex}][name]" class="form-control" placeholder="Tax Name">
                <div class="tax-name-error[${taxIndex}] text-danger"></div>
            </div>
            <div class="mb-3 col-md-5">
                <label class="form-label">Tax Price</label>
                <input type="number" name="taxes[${taxIndex}][price]" class="form-control" placeholder="Tax Price" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                <div class="tax-price-error[${taxIndex}] text-danger"></div>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-danger mt-4" onclick="removeTaxRow(this)">Remove</button>
            </div>
        `;

        taxSection.appendChild(newTaxRow);
        taxIndex++;
    }

    function removeTaxRow(button) {
        const row = button.parentElement.parentElement;
        row.remove();
    }
</script>
@endsection
