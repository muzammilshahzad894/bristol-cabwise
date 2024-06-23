@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('partials.messages')
        <div class="">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add New Service</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Tag <span class="text-danger">*</span></label>
                                    <input type="text" name="tag" class="form-control" placeholder="Tag" value="{{ old('tag') }}" required>
                                    @error('tag')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Short Description <span class="text-danger">*</span></label>
                                    <textarea name="short_description" class="form-control" rows="5" placeholder="Short Description" required>{{ old('short_description') }}</textarea>
                                    @error('short_description')
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
                               
                                <!-- Detail Page section -->
                                <h4>Detail Page Data</h4>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Detail Page Tag <span class="text-danger">*</span></label>
                                    <input type="text" name="detail_page_tag" class="form-control" placeholder="Detail Page Tag" value="{{ old('detail_page_tag') }}" required>
                                    @error('detail_page_tag')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Detail Page First Heading <span class="text-danger">*</span></label>
                                    <input type="text" name="detail_page_first_heading" class="form-control" placeholder="Detail Page First Heading" value="{{ old('detail_page_first_heading') }}" required>
                                    @error('detail_page_first_heading')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Detail Page Second Heading <span class="text-danger">*</span></label>
                                    <input type="text" name="detail_page_second_heading" class="form-control" placeholder="Detail Page Second Heading" value="{{ old('detail_page_second_heading') }}" required>
                                    @error('detail_page_second_heading')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Detail Page Description <span class="text-danger">*</span></label>
                                    <textarea name="detail_page_description" class="form-control" rows="5" placeholder="Detail Page Description" required>{{ old('detail_page_description') }}</textarea>
                                    @error('detail_page_description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Detail Page Features <span class="text-danger">*</span></label>
                                    <input type="text" data-role="tagsinput" name="detail_page_features" class="form-control" placeholder="Detail Page Features" value="{{ old('detail_page_features') }}" required>
                                    @error('detail_page_features')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <h4>Tax Section</h4>
                                <div id="taxes-section">
                                    
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-success mb-3" onclick="addTaxRow()">Add Tax</button>
                                </div>
                                <hr>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
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

    // hide and show meet and greet price field
    document.getElementById('meetAndGreetCheckbox').addEventListener('change', function() {
        const meetGreetPriceSec = document.getElementById('meet_greet_price_sec');
        meetGreetPriceSec.style.display = this.checked ? '' : 'none';
    });
</script>
@endsection

<!-- $table->string('detail_page_tag')->nullable();
            $table->string('detail_page_first_heading')->nullable();
            $table->string('detail_page_second_heading')->nullable();
            $table->text('detail_page_description')->nullable();
            $table->text('detail_page_features')->nullable(); -->