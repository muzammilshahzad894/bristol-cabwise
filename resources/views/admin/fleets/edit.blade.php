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
                        <h4 class="card-title">Edit Fleet</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('admin.fleets.update', $fleet->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control" placeholder="Name"
                                            value="{{ $fleet->name }}" required>
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">About Car <span class="text-danger">*</span></label>
                                        <input type="text" name="about_car" class="form-control" placeholder="About Car"
                                            value="{{ $fleet->about_car }}" required>
                                        @error('about_car')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Image</label>
                                        <input type="file" name="image" class="form-control" placeholder="Image"
                                            value="{{ $fleet->image }}">
                                        @error('image')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Max Passengers <span class="text-danger">*</span></label>
                                        <input type="number" name="max_passengers" class="form-control"
                                            placeholder="Max Passengers" value="{{ $fleet->max_passengers }}" required>
                                        @error('max_passengers')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Max Suitecases <span class="text-danger">*</span></label>
                                        <input type="number" name="max_suitecases" class="form-control"
                                            placeholder="Max Suitecases" value="{{ $fleet->max_suitecases }}" required>
                                        @error('max_suitecases')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Max Hand Luggage <span
                                                class="text-danger">*</span></label>
                                        <input type="number" name="max_hand_luggage" class="form-control"
                                            placeholder="Max Hand Luggage" value="{{ $fleet->max_hand_luggage }}" required>
                                        @error('max_hand_luggage')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Price / mile <span class="text-danger">*</span></label>
                                        <input type="number" name="price" class="form-control" placeholder="Price"
                                            value="{{ $fleet->price }}" required
                                            onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                        @error('price')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Price after 50 miles <span
                                                class="text-danger">*</span></label>
                                        <input type="number" name="price_after_50_miles" class="form-control"
                                            placeholder="Price after 50 miles" value="{{ $fleet->price_after_50_miles }}"
                                            required onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                        @error('price_after_50_miles')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Price after 100 miles <span
                                                class="text-danger">*</span></label>
                                        <input type="number" name="price_after_100_miles" class="form-control"
                                            placeholder="Price after 100 miles" value="{{ $fleet->price_after_100_miles }}"
                                            required onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                        @error('price_after_100_miles')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Price after 150 miles <span
                                                class="text-danger">*</span></label>
                                        <input type="number" name="price_after_150_miles" class="form-control"
                                            placeholder="Price after 150 miles"
                                            value="{{ $fleet->price_after_150_miles }}" required
                                            onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                        @error('price_after_150_miles')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Price after 200 miles <span
                                                class="text-danger">*</span></label>
                                        <input type="number" name="price_after_200_miles" class="form-control"
                                            placeholder="Price after 200 miles"
                                            value="{{ $fleet->price_after_200_miles }}" required
                                            onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                        @error('price_after_200_miles')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Minimum Booking Price <span
                                                class="text-danger">*</span></label>
                                        <input type="number" name="min_booking_price" class="form-control"
                                            placeholder="Minimum Booking Price" value="{{ $fleet->min_booking_price }}"
                                            required onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                        @error('min_booking_price')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Detail Page Description <span
                                                class="text-danger">*</span></label>
                                        <textarea name="detail_page_description" class="form-control" rows="5" placeholder="Detail Page Description" required>{{ old('detail_page_description') ?? $fleet->detail_page_description }}
                                        </textarea>
                                        @error('detail_page_description')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <hr>
                                    <!-- Tax fields section -->
                                    <h4>Tax Section</h4>
                                    <div id="taxes-section">
                                        @foreach ($fleetTaxes as $index => $tax)
                                            <div class="tax-row row">
                                                <div class="mb-3 col-md-5">
                                                    <label class="form-label">Tax Name</label>
                                                    <input type="text" name="taxes[{{ $index }}][name]"
                                                        class="form-control" placeholder="Tax Name"
                                                        value="{{ $tax->name }}">
                                                </div>
                                                <div class="mb-3 col-md-5">
                                                    <label class="form-label">Tax Price</label>
                                                    <input type="text" name="taxes[{{ $index }}][price]"
                                                        class="form-control" placeholder="Tax Price"
                                                        value="{{ $tax->price }}"
                                                        onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                                </div>
                                                <div class="col-md-2">
                                                    <button type="button" class="btn btn-danger mt-4"
                                                        onclick="removeTaxRow(this)">Remove</button>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-success mb-3" onclick="addTaxRow()">Add
                                            Tax</button>
                                    </div>
                                    <hr>
                                    <!-- End tax fields section -->
                                    <!-- Meet and Greet Section -->
                                    {{-- <h4>Meet and Greet</h4>
                                <div class="mb-3 col-md-6">
                                    <div class="form-check custom-checkbox mb-3 checkbox-success">
                                        <input type="checkbox" class="form-check-input" id="meetAndGreetCheckbox" name="meet_and_greet" {{ $fleet->meet_and_greet ? 'checked' : '' }}>
                                        <label class="form-check-label" for="meetAndGreetCheckbox">Meet and Greet</label>
                                    </div>
                                    <div id="meet_greet_price_sec" style="{{ $fleet->meet_and_greet ? '' : 'display: none;' }}">
                                        <label class="form-label">Price <span class="text-danger">*</span></label>
                                        <input type="number" name="meet_and_greet_price" class="form-control" placeholder="Meet and Greet Price" value="{{ $fleet->meet_and_greet_price }}" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
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
                                        <input type="text" data-role="tagsinput" name="features" class="form-control"
                                            placeholder="Add Features" value="{{ old('features') ?? $fleet->features }}">
                                        @error('detail_page_features')
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
        let taxIndex = {{ count($fleetTaxes) }};

        function addTaxRow() {
            const taxSection = document.getElementById('taxes-section');
            const newTaxRow = document.createElement('div');
            newTaxRow.classList.add('tax-row', 'row');

            newTaxRow.innerHTML = `
            <div class="mb-3 col-md-5">
                <label class="form-label">Tax Name</label>
                <input type="text" name="taxes[${taxIndex}][name]" class="form-control" placeholder="Tax Name">
            </div>
            <div class="mb-3 col-md-5">
                <label class="form-label">Tax Price</label>
                <input type="text" name="taxes[${taxIndex}][price]" class="form-control" placeholder="Tax Price" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
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

        document.getElementById('meetAndGreetCheckbox').addEventListener('change', function() {
            const meetGreetPriceSec = document.getElementById('meet_greet_price_sec');
            meetGreetPriceSec.style.display = this.checked ? '' : 'none';
        });
    </script>
@endsection
