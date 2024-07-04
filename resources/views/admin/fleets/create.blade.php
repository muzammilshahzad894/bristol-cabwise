@extends('layouts.admin.app')

@section('styles')
    <style>
        .tax-row {
            border: 2px solid #F89723;
            padding: 3px;
            border-radius: 8px;
            margin-bottom: 13px;
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
                    <div class="basic-form">
                        <form action="{{ route('admin.fleets.store') }}" method="POST" enctype="multipart/form-data">
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
                                    <label class="form-label">About Car <span class="text-danger">*</span></label>
                                    <input type="text" name="about_car" class="form-control" placeholder="About Car" value="{{ old('about_car') }}" required>
                                    @error('about_car')
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
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Max Passengers <span class="text-danger">*</span></label>
                                    <input type="number" name="max_passengers" class="form-control" placeholder="Max Passengers" value="{{ old('max_passengers') }}" required>
                                    @error('max_passengers')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Max Suitecases <span class="text-danger">*</span></label>
                                    <input type="number" name="max_suitecases" class="form-control" placeholder="Max Suitecases" value="{{ old('max_suitecases') }}" required>
                                    @error('max_suitecases')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Max Hand Luggage <span class="text-danger">*</span></label>
                                    <input type="number" name="max_hand_luggage" class="form-control" placeholder="Max Hand Luggage" value="{{ old('max_hand_luggage') }}" required>
                                    @error('max_hand_luggage')
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
                                    <label class="form-label">Price after 50 miles <span class="text-danger">*</span></label>
                                    <input type="number" name="price_after_50_miles" class="form-control" placeholder="Price after 50 miles" value="{{ old('price_after_50_miles') }}" required onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                    @error('price_after_50_miles')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Price after 100 miles <span class="text-danger">*</span></label>
                                    <input type="number" name="price_after_100_miles" class="form-control" placeholder="Price after 100 miles" value="{{ old('price_after_100_miles') }}" required onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                    @error('price_after_100_miles')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Price after 150 miles <span class="text-danger">*</span></label>
                                    <input type="number" name="price_after_150_miles" class="form-control" placeholder="Price after 150 miles" value="{{ old('price_after_150_miles') }}" required onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                    @error('price_after_150_miles')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Price after 200 miles <span class="text-danger">*</span></label>
                                    <input type="number" name="price_after_200_miles" class="form-control" placeholder="Price after 200 miles" value="{{ old('price_after_200_miles') }}" required onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                    @error('price_after_200_miles')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Minimum Booking Price <span class="text-danger">*</span></label>
                                    <input type="number" name="min_booking_price" class="form-control" placeholder="Minimum Booking Price" value="{{ old('min_booking_price') }}" required onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                    @error('min_booking_price')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Detail Page Description <span class="text-danger">*</span></label>
                                    <textarea name="detail_page_description" class="form-control" rows="5" placeholder="Detail Page Description" required>{{ old('detail_page_description') }}</textarea>
                                    @error('detail_page_description')
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
                                <!-- Meet and Greet Section -->
                                {{-- <h4>Meet and Greet</h4>
                                <div class="mb-3 col-md-6">
                                    <div class="form-check custom-checkbox mb-3 checkbox-success">
                                        <input type="checkbox" class="form-check-input" id="meetAndGreetCheckbox" name="meet_and_greet" {{ old('meet_and_greet') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="meetAndGreetCheckbox">Meet and Greet</label>
                                    </div>
                                    <div id="meet_greet_price_sec" style="{{ old('meet_and_greet') ? '' : 'display: none;' }}">
                                        <label class="form-label">Price <span class="text-danger">*</span></label>
                                        <input type="number" name="meet_and_greet_price" class="form-control" placeholder="Meet and Greet Price" value="{{ old('meet_and_greet_price', 0) }}" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                        @error('meet_and_greet_price')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div> --}}
                                <!-- End Meet and Greet Section -->
                                <hr>
                                <!-- Features Section -->
                              
                                <h4>Features</h4>
                                <div class="mb-3">
                                    <input type="text" data-role="tagsinput" name="features" class="form-control" placeholder="Add Features" value="{{ old('features') }}">
                                    @error('features')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                
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
