<script>
    let currentStep = 1;
    let FleetPrice = 0;
    let Fleet_id = 0;
    let Fleet_name = '';
    isChildSeat = false;
    meet_nd_greet = false;
    isExtraLauggage = false;
    let FleetTaxes = [];
    let user_name = '';
    let user_email = '';
    let user_phone_number = '';
    let other_name = '';
    let other_email = '';
    let other_phone_number = '';
    let no_of_passenger = '';
    let no_suite_case = '';
    let no_hand_luggage = '';
    let summary = '';
    let pickup_location = '';
    let dropoff_location = '';
    let dates_times = '';
    let flight_name = '';
    let flight_time = '';
    let flight_type = '';
    let Total_price = '';
    let service_type = '';
    let coupon_apply = '';
    let fleet_price_id = '';
    let distance = '';
    let service_id = 0;
    let droplocationss = 0;
    let payment_method = '';
    let current_booking_id = 0;
    let lessTimeError = false;
    let via_locations = '';
    let is_return = 0;

    function showReturn() {
        var returnCheckbox = document.getElementById('return');
        var returnLocation = document.getElementById('return_location');
        var pickupLocation = document.getElementById('pickupLocation').value;
        var dropLocation = document.getElementById('dropLocation0').value;
        var dropoffvalue = document.getElementById('return_pickupLocation');
        var dropoffLocation = document.getElementById('return_dropLocation');
        if (returnCheckbox.checked) {
            is_return = 1;
            returnLocation.style.display = 'block';
            if (pickupLocation && dropLocation) {
                dropoffvalue.value = dropLocation;
                dropoffLocation.value = pickupLocation;
            }

        } else {
            is_return = 0;
            returnLocation.style.display = 'none';
            dropoffvalue.value = '';
            dropoffLocation.value = '';
        }
    }


    $(document).ready(function() {
        var selectService = document.getElementById('service');

        // Function to handle the service selection
        function handleServiceSelection(select) {
            var selectedOption = select.options[select.selectedIndex];
            var selectedServiceName = selectedOption.text.trim();
            service_type = selectedServiceName;
            var selectedServiceId = selectedOption.value;
            service_id = selectedServiceId;

            var airportServiceElements = document.querySelectorAll('.airportservice');

            if (selectedServiceName === 'Airport transfers') {
                airportServiceElements.forEach(element => element.style.display = 'flex');
                document.getElementById("flight_type").style.display = "block";
            } else {
                isChildSeat = false;
                meet_nd_greet = false;
                isExtraLauggage = false;

                // Uncheck the checkboxes
                document.getElementById('child_seat').checked = false;
                document.getElementById('meet_greet').checked = false;
                document.getElementById('extra_lauggage').checked = false;

                airportServiceElements.forEach(element => element.style.display = 'none');
                document.getElementById("flight_type").style.display = "none";
            }

            // Update checkboxes based on the current state
            updateCheckboxStates();
        }

        // Function to update the state of checkboxes
        function updateCheckboxStates() {
            var checkBox = document.getElementById("child_seat");
            var meetgreet = document.getElementById("meet_greet");
            var extra = document.getElementById("extra_lauggage");

            isChildSeat = checkBox.checked;
            meet_nd_greet = meetgreet.checked;
            isExtraLauggage = extra.checked;
        }

        // Call the function initially to set the correct state on page load
        handleServiceSelection(selectService);

        // Add event listener for service selection change
        selectService.addEventListener('change', function() {
            handleServiceSelection(this);
        });

        // Add event listeners for checkboxes to update their state
        document.getElementById('child_seat').addEventListener('change', updateCheckboxStates);
        document.getElementById('meet_greet').addEventListener('change', updateCheckboxStates);
        document.getElementById('extra_lauggage').addEventListener('change', updateCheckboxStates);
    });



    function showChildSeat() {
        var checkBox = document.getElementById("child_seat");
        if (checkBox.checked == true) {
            isChildSeat = true;
        } else {
            isChildSeat = false;
        }
    }

    function showExtraLauggage() {
        var checkBox = document.getElementById("extra_lauggage");
        if (checkBox.checked == true) {
            isExtraLauggage = true;
        } else {
            isExtraLauggage = false;
        }
    }

    function meetNdGreet() {
        var checkBox = document.getElementById("meet_greet");
        if (checkBox.checked == true) {
            meet_nd_greet = true;
        } else {
            meet_nd_greet = false;
        }
    }
    function updateReturnSummary() {
    var returnCheckbox = document.getElementById('return');
    var returnSummaryContainer = document.getElementById('return_summary');
    var returnDateTimeInput = document.getElementById('return_date_time');
    
    // Clear the container before adding new elements
    if (returnSummaryContainer) {
        returnSummaryContainer.innerHTML = '';
    }

    if (returnCheckbox && returnCheckbox.checked && returnDateTimeInput) {
        var returnDateTimeValue = returnDateTimeInput.value.trim();
        if (returnDateTimeValue) {
            // Create the first div element with d-flex and gap-4 classes
            var returnDiv1 = document.createElement('div');
            returnDiv1.className = 'd-flex gap-4';

            var returnStrong = document.createElement('strong');
            returnStrong.textContent = 'Return:';

            var returnP = document.createElement('p');
            returnP.textContent = 'Yes';

            returnDiv1.appendChild(returnStrong);
            returnDiv1.appendChild(returnP);

            // Create the second div element with d-flex and gap-4 classes
            var returnDiv2 = document.createElement('div');
            returnDiv2.className = 'd-flex gap-4';

            var returnDateTimeStrong = document.createElement('strong');
            returnDateTimeStrong.textContent = 'Return Date & Time:';

            var returnDateTimeP = document.createElement('p');
            returnDateTimeP.textContent = returnDateTimeValue;

            returnDiv2.appendChild(returnDateTimeStrong);
            returnDiv2.appendChild(returnDateTimeP);

            // Append both div elements to the container
            returnSummaryContainer.appendChild(returnDiv1);
            returnSummaryContainer.appendChild(returnDiv2);
        }
    }
}

// Example usage: Call updateReturnSummary() whenever needed, e.g., when checkbox value or datetime input changes
document.getElementById('return').addEventListener('change', updateReturnSummary);
document.getElementById('return_date_time').addEventListener('input', updateReturnSummary);

// Initial call to display the return summary on page load if return is checked
window.onload = updateReturnSummary;


    function updateSummary() {
        updateVia();
        updateReturnSummary();
        const ids = [
            'summary-service-type', 'summary-pickup-location', 'summary-drop-location', 'summary-fleet-type',
            'summary-date', 'summary-name', 'summary-telephone', 'summary-email',
            'summary-passengers', 'summary-child-seat', 'summary-suitcases',
            'summary-hand-luggage', 'summary-summary',
            'summary-other-name', 'summary-other-telephone', 'summary-other-email',
            'summary-total-price', 'summary-child-seat_price', 'summary-meet-greet', 'summary-meets-greets',
            'summary-fleet-price',
            'summary-child-seat_price_div', 'summary-meet-greet_price_div', 'summary-extra-lauggage_price_div',
            'summary-flight-type', 'summary-flight-name', 'summary-flight-time'
        ];

        ids.forEach(id => {
            const element = document.getElementById(id);
            if (!element) {
                console.error(`Element with id '${id}' not found`);
            }
        });

        const elements = {
            'summary-service-type': service_type,
            'summary-fleet-type': Fleet_name,
            'summary-pickup-location': pickup_location,
            'summary-drop-location': dropoff_location,
            // 'summary-via-location': via_locations,

            'summary-date': dates_times,
            'summary-name': user_name,
            'summary-telephone': user_phone_number,
            'summary-email': user_email,
            'summary-passengers': no_of_passenger,
            'summary-child-seat': isChildSeat ? '1' : '-',
            'summary-meets-greets': meet_nd_greet ? '1' : '-',
            'summary-suitcases': no_suite_case,
            'summary-hand-luggage': no_hand_luggage,
            'summary-summary': summary,
            'summary-other-name': other_name ? other_name : '-',
            'summary-other-telephone': other_phone_number ? other_phone_number : '-',
            'summary-other-email': other_email ? other_email : '-',
            'summary-total-price': '£' + Total_price,
            'summary-child-seat_price': isChildSeat ? '£5' : '-',
            'summary-meet-greet': meet_nd_greet ? '£12' : '-',
            'summary-fleet-price': '£' + FleetPrice,
            'summary-extra-lauggage': extra_luggage ? '£' + extra_luggage : '-',
            'summary-flight-type': flight_type == 2 ? 'Arrival' : 'Departure',
            'summary-flight-name': flight_name,
            'summary-flight-time': flight_time
        };
        if (flight_type == 2) {
            document.getElementById('summary-flight-name-div').style.display = 'flex';
            document.getElementById('summary-flight-time-div').style.display = 'flex';
            document.getElementById('summary-flight-type-div').style.display = 'flex';
        } else {
            document.getElementById('summary-flight-name-div').style.display = 'none';
            document.getElementById('summary-flight-time-div').style.display = 'none';
            document.getElementById('summary-flight-type-div').style.display = 'none';
        }



        for (const [id, value] of Object.entries(elements)) {
            const element = document.getElementById(id);
            if (element) {
                element.innerText = value;
            }
        }

        toggleVisibility('summary-child-seat_price_div', isChildSeat);
        toggleVisibility('summary-meet-greet_price_div', meet_nd_greet);
        toggleVisibility('summary-extra-lauggage_price_div', extra_luggage);
    }

    function toggleVisibility(elementId, condition) {
        const element = document.getElementById(elementId);
        if (element) {
            element.style.display = condition ? 'flex' : 'none';
        }
    }

    function updateVia() {
    var viaLocationContainer = document.getElementById('via_locations');
    var viaLocationInputs = document.querySelectorAll('input[name="via_locations[]"]');
    viaLocationContainer.innerHTML = '';
    viaLocationInputs.forEach(function(input, index) {
        var value = input.value.trim();
        if (value) {
            var viaLocationDiv = document.createElement('div');
            viaLocationDiv.className = 'd-flex gap-4';
            var viaLocationLabel = document.createElement('strong');
            viaLocationLabel.textContent = 'Via location ' + (index + 1) + ':';
            var viaLocationP = document.createElement('p');
            viaLocationP.id = 'summary-via-location-' + (index + 1);
            viaLocationP.textContent = value;
            viaLocationDiv.appendChild(viaLocationLabel);
            viaLocationDiv.appendChild(viaLocationP);
            viaLocationContainer.appendChild(viaLocationDiv);
        }
    });
}

document.querySelectorAll('input[name="via_locations[]"]').forEach(function(input) {
    input.addEventListener('input', updateVia);
});

window.onload = updateVia;





    function nextStep() {
        if (currentStep == 1) {
            var maplocation = document.getElementById('mapMarkplaces');
            maplocation.style.display = 'block';
        } else {
            var maplocation = document.getElementById('mapMarkplaces');
            maplocation.style.display = 'none';
        }
        var returnCheckbox = document.getElementById('return');
        if (returnCheckbox.checked) {
            var returnDateTime = document.getElementById('return_date_time').value;
            console.log('returnDateTime3', returnDateTime);
            if (returnDateTime == '') {
                alert('Please choose the return date time ');
                return;
            }
        }
        if (currentStep < 4) {

            if (currentStep === 1) {
                showReturn();
                if (lessTimeError) {
                    return;
                }

                if (!validateFirstStep()) {
                    return;
                }
                if (distance == '') {
                    alert('Please select the correct locations.');
                    return;
                }
                if (distance > 150) {
                    var login_user = document.getElementById('login_user').value;
                    if (login_user == "user") {
                        alert('For you booking plese contact to supports.');
                        return;
                    }
                }


                showFleetsHtml();

            }

            if (currentStep === 2) {
                if (!validateSecondStep()) {
                    return;
                }
                if (service_type != 'Airport transfers') {
                    document.getElementById('child_seat').checked = false;
                    document.getElementById('meet_greet').checked = false;
                }
            }

            if (currentStep === 3) {
                if (!validateThirdStep()) {
                    return;
                }

            }
            if (currentStep == 3) {

                childset = isChildSeat ? 5 : 0;
                meet_greet_price = meet_nd_greet ? 12 : 0;
                extra_luggage = isExtraLauggage ? 6 : 0;
                updatefleetPrice = parseFloat(FleetPrice);
                Total_price = updatefleetPrice + childset + meet_greet_price + extra_luggage;
                user_name = document.getElementById('name').value;
                user_email = document.getElementById('email').value;
                user_phone_number = document.getElementById('telephone').value;
                other_name = document.getElementById('someone_else_name').value;
                other_email = document.getElementById('someone_else_email').value;
                other_phone_number = document.getElementById('someone_else_telephone').value;
                no_of_passenger = document.getElementById('no_passenger').value;
                no_suite_case = document.getElementById('suit_case').value;
                no_hand_luggage = document.getElementById('hand_lauggage').value;
                summary = document.getElementById('summary').value;
                pickup_location = document.getElementById('pickupLocation').value;
                let dropoff_locations = [];
                document.querySelectorAll('input[name="dropLocation[]"]').forEach((input, index) => {
                    if (input.value) {
                        dropoff_locations.push(input.value);
                    }
                });
                if (dropoff_locations.length > 1) {
                    droplocationss = dropoff_locations.length;
                }

                dropoff_location = dropoff_locations.join(', ');
                let via_locationss = [];
                document.querySelectorAll('input[name="via_locations[]"]').forEach((input, index) => {
                    if (input.value) {
                        //add count 
                        via_locationss.push(input.value + ' ,');
                    }
                });
                
                via_locations = via_locationss.join(',');
                dates_times = document.getElementById('date-time').value;
                flight_name = document.getElementById('flightName').value;
                flight_time = document.getElementById('flight_time').value;
                flight_type = document.getElementById('carType').value;
                total_price = Total_price;

                updateSummary();
                bookAndPay();
            }

            currentStep++;
            updateProgress();
            updateFormVisibility();
            updateButtonVisibility();
        }
        if (currentStep == 4) {
            document.querySelector("#next_btn").style.display = "none";
            document.getElementById("form_submit").style.display = "block";
        }
    }

    function showFleetsHtml() {
        const urlParams = new URLSearchParams(window.location.search);
        const serviceId = service_id;

        fetch('/all-fleets')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                }
                return response.json();
            })
            .then(data => {
                var fleets = data.fleets;
                var fleetHtml = '';

                fleets.forEach((fleet, index) => {
                    if (serviceId) {
                        fetch(`/get-service-tax?service_id=${serviceId}`)
                            .then(response => response.json())
                            .then(serviceTaxData => {
                                if (serviceTaxData.error) {
                                    console.error('Error fetching service tax:', serviceTaxData.error);
                                    renderFleetHtml(fleet,
                                        index); // Render without service tax if there's an error
                                    return;
                                }

                                var totalServiceTax = parseFloat(serviceTaxData.total_tax);
                                fleet.taxes.push({
                                    name: 'Service Tax',
                                    price: totalServiceTax
                                });

                                // Proceed with the rest of the logic after adding service tax
                                renderFleetHtml(fleet, index);
                            })
                            .catch(error => {
                                console.error('Error fetching service tax:', error);
                                renderFleetHtml(fleet,
                                    index); // Render without service tax if there's an error
                            });
                    } else {
                        renderFleetHtml(fleet,
                            index);
                    }
                });

                function renderFleetHtml(fleet, index) {
                    var fleetPrice = calculateFleetPrice(fleet);
                    var totalTax = fleet.taxes.reduce((sum, tax) => sum + parseFloat(tax.price),
                        0); // Convert tax.price to number
                    var totalPrice = fleetPrice + totalTax;
                    if (isNaN(totalPrice)) {
                        console.log('Total price is NaN.');
                        alert('An error occurred: Total price is not a number.');
                        location.reload();
                        return;
                    }

                    fleetHtml += `
                <div class="col-md-6 form-container ${index === 0 ? 'selected-fleet' : ''}" data-fleet-name="${fleet.name}" data-fleet-id="${fleet.id}" onclick="selectFleet(this)">
                    <div class="p-6">
                        <img src="/uploads/fleets/${fleet.image}" alt="" />
                        <strong>${fleet.name}</strong>
                        <p class="about_car">${fleet.about_car}</p>
                        <div style="display: flex; flex-direction: column; justify-content: center;">
                            <div class="d-flex gap-2 align-items-center">
                                <i class="fa fa-users"></i>
                                <p style="margin-bottom: 0px">max.</p>
                                <span>${fleet.max_passengers}</span>
                            </div>
                            <div class="d-flex gap-2 align-items-center">
                                <i class="fa-solid fa-suitcase"></i>
                                <p style="margin-bottom: 0;">max.</p>
                                <span>${fleet.max_suitecases}</span>
                            </div>
                            <div class="d-flex gap-2 align-items-center">
                                <i class="fa fa-briefcase"></i>
                                <p style="margin-bottom: 0;">max.</p>
                                <span>${fleet.max_hand_luggage}</span>
                            </div>
                        </div>
                    </div>
                    <div class="footer-box d-flex align-items-center">
                        <p class="color">price: <strong id="fleetPrice_value${index + 1}"> £${totalPrice.toFixed(2)}</strong></p>
                        <div>
                            <input type="radio" class="fleet_id" name="fleet_id" id="fleet_id${index + 1}" onclick="handleCheckboxClick(this, 'fleetPrice_value${index + 1}')" value="${totalPrice}">
                        </div>
                    </div>
                </div>
                `;
                    document.getElementById('fleets-section').innerHTML = fleetHtml;
                }
            })
            .catch(error => {
                console.error('There has been a problem with your fetch operation:', error);
            });
    }

    function calculateFleetPrice(fleet) {
        let newdistancevalue = parseFloat(distance.replace('km', '').trim());
        let dist = Math.round(newdistancevalue);
        let fleetPrice = 0;
        let price = parseFloat(fleet.price);
        let price_after_10_miles = parseFloat(fleet.price_after_10_miles);
        let price_after_20_miles = parseFloat(fleet.price_after_20_miles);
        let price_after_30_miles = parseFloat(fleet.price_after_30_miles);
        let price_after_40_miles = parseFloat(fleet.price_after_40_miles);
        let price_after_50_miles = parseFloat(fleet.price_after_50_miles);
        let price_after_100_miles = parseFloat(fleet.price_after_100_miles);
        let price_after_120_miles = parseFloat(fleet.price_after_120_miles);
        let price_after_150_miles = parseFloat(fleet.price_after_150_miles);

        let min_booking_price = parseFloat(fleet.min_booking_price);
        let returnPrice = 1;
        if(is_return == 1){
           returnPrice = 2;
        }

        if (dist > 150) {
            fleetPrice = dist * priceAfter200Miles * returnPrice;
        } else if (dist > 120) {
            fleetPrice = dist * priceAfter150Miles * returnPrice;
        } else if (dist > 100) {
            fleetPrice = dist * priceAfter120Miles * returnPrice;
        } else if (dist > 50) {
            fleetPrice = dist * priceAfter100Miles * returnPrice;
        } else if (dist > 40) {
            fleetPrice = dist * priceAfter50Miles * returnPrice;
        } else if (dist > 30) {
            fleetPrice = dist * priceAfter40Miles * returnPrice;
        } else if (dist > 20) {
            fleetPrice = dist * priceAfter30Miles * returnPrice;
        } else if (dist > 10) {
            fleetPrice = dist * priceAfter20Miles * returnPrice;
        } else {
            fleetPrice = dist * price * returnPrice;
        }
        if (fleetPrice < min_booking_price) {
            fleetPrice = min_booking_price * returnPrice;
        }

        return fleetPrice;
    }




    function validateFirstStep() {
        const validations = [{
                selector: '#pickupLocation',
                errorSelector: '#pickup-error',
                message: 'Pickup location is required'

            },
            {
                selector: '.drop-location input',
                errorSelector: '#drop-error',
                message: 'All drop locations are required',
                isMultiple: true
            },
            {
                selector: '#date-time',
                errorSelector: '#date-time-error',
                message: 'Date and time is required'
            },
            {
                selector: '#service',
                errorSelector: '#service-error',
                message: 'Service is required'
            }
        ];
        const flightValidation = [{
                selector: '#flightName',
                errorSelector: '#flightName-error',
                message: 'Flight Name is required'
            },
            {
                selector: '#flight_time',
                errorSelector: '#flight_time-error',
                message: 'Flight Time is required'
            },
        ];
        const returnValidation = [{
            selector: '#return_date-time',
            errorSelector: '#return-date-time-error',
            message: 'Return Date and time is required'
        }, ];


        let isValid = true;
        validations.forEach(({
            selector,
            errorSelector,
            message,
            isMultiple
        }) => {
            const elements = $(selector);
            const hasError = isMultiple ?
                elements.filter((_, el) => !$(el).val()).length > 0 :
                !elements.val();

            $(errorSelector).text(hasError ? message : '');

            if (hasError) {
                isValid = false;
                elements.first().focus();
            }
        });

        if ($('#carType').val() == 2) {
            flightValidation.forEach(({
                selector,
                errorSelector,
                message
            }) => {
                const element = $(selector);
                const hasError = !element.val();
                $(errorSelector).text(hasError ? message : '');
                if (hasError) {
                    isValid = false;
                    element.focus();
                }
            });

        }

        return isValid;
    }

    function validateSecondStep() {
        $('#error_msg_show').hide();

        let isValid = true;
        if ($('.fleet_id:checked').length === 0) {
            $('#error_msg_show').show();
            isValid = false;

            // scroll to the error message
            $('html, body').animate({
                scrollTop: $('#error_msg_show').offset().top
            }, 1000);
            return;
        }

        return isValid;
    }

    function validateThirdStep() {
        const validations = [{
                selector: '#name',
                errorSelector: '#name-error',
                message: 'Name is required'
            },
            {
                selector: '#telephone',
                errorSelector: '#telephone-error',
                message: 'Telephone is required'
            },
            {
                selector: '#email',
                errorSelector: '#email-error',
                message: 'Email is required'
            },
            {
                selector: '#no_passenger',
                errorSelector: '#passenger-error',
                message: 'Number of passengers is required'
            },
        ];

        const someOneElseValidation = [{
                selector: '#someone_else_name',
                errorSelector: '#someone_else_name_error',
                message: 'Name is required'
            },
            {
                selector: '#someone_else_telephone',
                errorSelector: '#someone_else_telephone_error',
                message: 'Telephone is required'
            },
            {
                selector: '#someone_else_email',
                errorSelector: '#someone_else_email_error',
                message: 'Email is required'
            },
        ];


        let isValid = true;
        validations.forEach(({
            selector,
            errorSelector,
            message
        }) => {
            const element = $(selector);
            const hasError = !element.val();
            $(errorSelector).text(hasError ? message : '');
            if (hasError) {
                isValid = false;
                element.focus();
            }
        });

        if ($('#booking_for_someone').is(':checked')) {
            someOneElseValidation.forEach(({
                selector,
                errorSelector,
                message
            }) => {
                const element = $(selector);
                const hasError = !element.val();
                $(errorSelector).text(hasError ? message : '');
                if (hasError) {
                    isValid = false;
                    element.focus();
                }
            });
        }


        return isValid;
    }

    function prevStep() {
        if (currentStep == 1) {
            var maplocation = document.getElementById('mapMarkplaces');
            maplocation.style.display = 'block';
        } else {
            var maplocation = document.getElementById('mapMarkplaces');
            maplocation.style.display = 'none';
        }

        if (currentStep > 1) {

            currentStep--;
            updateProgress();
            updateFormVisibility();
            updateButtonVisibility();
        }
        if (currentStep < 4) {
            document.querySelector("#next_btn").style.display = "block";
            document.getElementById("form_submit").style.display = "none";
        }
    }

    function updateProgress() {
        const steps = document.querySelectorAll(".progress-step");
        steps.forEach((step) => step.classList.remove("active"));
        document.getElementById(`step${currentStep}`).classList.add("active");
    }

    function updateFormVisibility() {
        const forms = document.querySelectorAll(".new_form");
        forms.forEach((form) => (form.style.display = "none"));
        document.querySelector(`.step${currentStep}`).style.display = "block";
    }

    function updateButtonVisibility() {
        const prevButton = document.querySelector(".previous_btn");
        if (currentStep === 1) {
            prevButton.style.display = "none";
        } else {
            prevButton.style.display = "block";
        }
    }


    function closeAlert() {
        document.getElementById('error_msg_show').style.display = 'none';
    }
    // Initial call to ensure correct button visibility and form visibility
    updateButtonVisibility();
    updateFormVisibility();

    $(document).ready(function() {
        // Allow only numeric input for telephone field
        $('#tele').on('input', function() {
            this.value = this.value.replace(/\D/g, '');
        });
    });

    function toggleFlightIdVisibility() {
        var selectedValue = document.getElementById('carType').value;
        var flightIdDiv = document.getElementById('flightId');

        if (selectedValue == 2) { // Arrival
            flightIdDiv.style.display = 'block';
        } else {
            flightIdDiv.style.display = 'none';
        }
    }

    function selectFleet(fleet) {
        const fleets = document.querySelectorAll("#fleets-section");
        fleets.forEach((fleet) => fleet.classList.remove("selected-fleet"));
        fleet.classList.add("selected-fleet");
        const fleetId = fleet.getAttribute("data-fleet-id");
        Fleet_name = fleet.getAttribute("data-fleet-name");

        Fleet_id = fleetId;

        fetch(`/fleet-details/${fleetId}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                }
                return response.json();
            })
            .then(data => {
                updateSelectOptions('no_passenger', data.fleet.max_passengers);
                updateSelectOptions('suit_case', data.fleet.max_suitecases);
                updateSelectOptions('hand_lauggage', data.fleet.max_hand_luggage);

                FleetTaxes = data.fleetTax;
            })
            .catch(error => {
                console.error('There has been a problem with your fetch operation:', error);
            });

    }

    function updateSelectOptions(selectId, max) {
        const selectElement = document.getElementById(selectId);
        selectElement.innerHTML = ''; // Clear existing options

        for (let i = 1; i <= max; i++) {
            const option = document.createElement('option');
            option.value = i;
            option.textContent = i;
            selectElement.appendChild(option);
        }
    }

    function showSomeoneElse() {
        var checkBox = document.getElementById("booking_for_someone");
        var someoneElse = document.getElementById("someone_else");
        if (checkBox.checked == true) {
            someoneElse.style.display = "block";
        } else {
            someoneElse.style.display = "none";
        }
    }

    function handleCheckboxClick(checkbox, id) {

        var value = checkbox.value;
        FleetPrice = value;
        fleet_price_id = id;
        const checkboxes = document.querySelectorAll('input[name="fleet_id"]');
        if (checkbox.checked) {
            handleupdateprice(id);
        }
        checkboxes.forEach(cb => {
            if (cb !== checkbox) {
                cb.checked = false;
            }
        });
    }

    function handleupdateprice(id) {
        var value = id;
        var FleetPrice = document.getElementById(value).textContent;
        var TotalPrice = FleetPrice;


    }


    function triggerCheckedCheckbox() {
        const checkedCheckbox = document.querySelector('input[name="fleet_id"]:checked');

        var checkedId = checkedCheckbox.id;

        if (checkedCheckbox) {

            handleCheckboxClick(checkedCheckbox, checkedId);

            const fleetContainer = checkedCheckbox.closest('.form-container');
            if (fleetContainer) {
                selectFleet(fleetContainer);
            }
        }
    }

    // Call the function on page load
    document.addEventListener('DOMContentLoaded', triggerCheckedCheckbox);


    function paypalRedirect(bookingId) {

        var url = '/paypal/payment?id=' + bookingId;

        window.location.href = url;
    }

    function bookAndPay() {
        payment_method = "stripe";
        
        var viaLocationInputs = document.querySelectorAll('input[name="via_locations[]"]');
        var viaLocations = Array.from(viaLocationInputs).map(input => input.value);        var formData = {
            name: getElementValue('name'),
            email: getElementValue('email'),
            phone_number: getElementValue('telephone'),
            other_name: getElementValue('someone_else_name'),
            other_email: getElementValue('someone_else_email'),
            other_phone_number: getElementValue('someone_else_telephone'),
            no_of_passenger: getElementValue('no_passenger'),
            no_suite_case: getElementValue('suit_case'),
            no_hand_luggage: getElementValue('hand_lauggage'),
            child_seat: document.getElementById('child_seat').checked ? 1 : 0,
            meet_greet: document.getElementById('meet_greet').checked ? 1 : 0,
            summary: getElementValue('summary'),
            pickup_location: getElementValue('pickupLocation'),
            dropoff_location: dropoff_location,
            date_time: getElementValue('date-time'),
            return_date_time: getElementValue('return_date_time'),
            flight_name: getElementValue('flightName'),
            flight_time: getElementValue('flight_time'),
            flight_type: getElementValue('carType'),
            extra_lauggage: document.getElementById('extra_lauggage').checked ? 1 : 0,
            return: is_return,
            service_id: service_id,
            fleet_id: Fleet_id,
            total_price: Total_price,
            payment_method: payment_method,
            via_locations: viaLocations,

        };

        $fleet_id = document.querySelector('input[name="fleet_id"]:checked').value;
        if (formData.date_time) {
            var dateTimeArray = formData.date_time.split('T');
            var date = dateTimeArray[0];
            var time = dateTimeArray[1];
            formData.date = date;
            formData.time = time;
        }
        if (formData.return_date_time) {
            var dateTimeArray = formData.return_date_time.split('T');
            var date = dateTimeArray[0];
            var time = dateTimeArray[1];
            formData.return_date = date;
            formData.return_time = time;
        }

        fetch('/booking', {
                method: 'POST',
                body: JSON.stringify(formData),
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
            })
            .then(response => {
                if (!response.ok) {
                    console.error('Network response was not ok', response.statusText);
                }
                return response.json();
            })
            .then(data => {
                if (data.error) {
                    $('#exampleModal').modal('show');
                    return;
                } else {


                    var login_user = document.getElementById('login_user').value;

                    if (login_user == "user") {
                        if (droplocationss > 1) {
                            $('#exampleModal').modal('show');
                            document.getElementById('message').textContent =
                                "Via Booking please contact to the support."
                            return;
                        }
                    }
                    var login_user = document.getElementById('login_user').value;
                    if (login_user == "admin") {
                        $('#exampleModal').modal('show');
                        document.getElementById('message').textContent =
                            "Your booking has been successfully updated.";
                        var Debitcard = window.location.origin + '/client-booking-payment?payment_id=' + data
                            .booking_id;


                        var modalStyleElements = document.getElementsByClassName('modal_style_p');
                        for (var i = 0; i < modalStyleElements.length; i++) {
                            modalStyleElements[i].style.display = 'block';
                        }
                        document.getElementById('client_url').textContent = Debitcard;

                    } else {
                        current_booking_id = data.booking_id;
                    }
                }
            })
            .catch(error => {
                console.error('There has been a problem with your fetch operation:', error);
            });
    }

    // Helper function to get element value by ID
    function getElementValue(id) {
        var element = document.getElementById(id);
        if (element) {
            return element.value;
        } else {
            console.error('Element with ID ' + id + ' not found');
            return ''; // Return empty string if element not found
        }
    }
    var bookingHours = @json($bookingHours); // Assuming $bookingHours is a number


    function pad(n) {
        return n < 10 ? '0' + n : n;
    }

    function setMinDateTime() {
        var blockDates = @json($blockDates); // Assuming this is an array of strings in 'YYYY-MM-DD' format
        var login_user = document.getElementById('login_user').value;
        var now = new Date();
        var year = now.getFullYear();
        var month = pad(now.getMonth() + 1);
        var day = pad(now.getDate());
        var hours = pad(now.getHours());
        var minutes = pad(now.getMinutes());

        var currentDateTime = new Date(year, now.getMonth(), day, hours, minutes);
        var minDateTime = year + '-' + month + '-' + day + 'T' + hours + ':' + minutes;

        function validateDateTime(dateInput) {
            dateInput.setAttribute('min', minDateTime);

            dateInput.addEventListener('input', function() {
                var selectedDate = new Date(this.value);
                selectedDate.setSeconds(0);
                selectedDate.setMilliseconds(0);
                var isBlocked = blockDates.some(function(blockDate) {
                    var blockDateObj = new Date(blockDate);
                    blockDateObj.setHours(0, 0, 0, 0);
                    return selectedDate.toDateString() === blockDateObj.toDateString();
                });

                // Check if the user is logged in and the selected date is less than minimum booking hours from now
                if (login_user === "user") {
                    var minBookingTime = new Date(currentDateTime.getTime() + (bookingHours * 60 * 60 *
                        1000)); // Convert hours to milliseconds
                    if (selectedDate < minBookingTime) {
                        $('#exampleModal').modal('show');
                        document.getElementById('message').textContent =
                            "Booking must be made at least " + bookingHours +
                            " hours in advance. Please select another date or time.";
                        this.value = '';
                        return; // Exit function to prevent further processing
                    }
                }

                var now = new Date();
                now.setSeconds(0);
                now.setMilliseconds(0);

                if (selectedDate < now || isBlocked) {
                    $('#exampleModal').modal('show');
                    document.getElementById('message').textContent =
                        "Booking is not available at this time. Please contact support.";
                    this.value = '';
                }
            });
        }

        var dateInput = document.getElementById('date-time');
        var returnDateInput = document.getElementById('return_date_time');

        if (dateInput) {
            validateDateTime(dateInput);
        }

        if (returnDateInput) {
            validateDateTime(returnDateInput);
        }
    }

    window.onload = setMinDateTime;




    document.addEventListener('DOMContentLoaded', function() {
        function getParameterByName(name, url) {
            if (!url) url = window.location.href;
            name = name.replace(/[\[\]]/g, '\\$&');
            var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)');
            var results = regex.exec(url);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, ' '));
        }

        var serviceName = getParameterByName('name');
        if (serviceName && serviceName === 'Airport-transfers') {
            document.getElementById('flight_type').style.display = 'block';
        }
    });
    document.getElementById('triggerModal').addEventListener('click', function() {
        $('#exampleModal').modal('show');
    });

    function showFlightId(select) {
        var selectedServiceName = select.options[select.selectedIndex].text.trim();
        service_type = selectedServiceName;
        var selectedOption = select.options[select.selectedIndex];
        var selectedServiceId = selectedOption.value;

        service_id = selectedServiceId;
        var airportServiceElements = document.querySelectorAll('.airportservice');

        if (selectedServiceName == 'Airport transfers') {
            airportServiceElements.forEach(element => element.style.display = 'flex');
            document.getElementById("flight_type").style.display = "block";
        } else {
            isChildSeat = false;
            meet_nd_greet = false;
            document.getElementById('child_seat').checked = false;
            document.getElementById('meet_greet').checked = false;

            airportServiceElements.forEach(element => element.style.display = 'none');
            document.getElementById("flight_type").style.display = "none";
        }
    }




    function AddCoupon() {
        var coupon = document.getElementById('coupon_input').style.display = "block";
    }

    function applyCoupon() {
        var coupon = document.getElementById('coupon').value;
        var applyButton = document.getElementById('add_coupon');
        applyButton.disabled = true;
        applyButton.removeAttribute('onclick');

        $.ajax({
            url: `/apply-coupon/${coupon}`,
            type: 'GET',
            success: function(data) {
                if (data.error) {
                    console.log(data.error)
                    $('#exampleModal').modal('show');
                    document.getElementById('message').textContent = "Coupon is not valid.";
                    return;
                } else {
                    document.getElementById('summary-coupon-discount').innerText = data.discount + '%';
                    coupon_apply = coupon;
                    Total_price = Total_price - (Total_price * data.discount / 100);

                    if (Total_price % 1 <= 0.5) {

                        Total_price = Math.floor(Total_price);
                    } else {

                        Total_price = Math.ceil(Total_price);
                    }

                    document.getElementById('summary-total-price').innerText = '£' + Total_price;
                    $('#exampleModal').modal('show');
                    document.getElementById('message').textContent = "Coupon applied successfully.";
                }
            },
            error: function(xhr, status, error) {
                $('#exampleModal').modal('show');
                document.getElementById('message').textContent = "Coupon is not valid.";
                return;
                console.error('There has been a problem with your AJAX request:', error);
            }
        });
    }

    function StoreCouponCode() {
        if (coupon_apply !== '') {
            console.log('hereee');
            $.ajax({
                url: '/store-coupon',
                type: 'POST',
                data: {
                    coupon: coupon_apply
                },
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(response) {
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error); // Log the error to the console
                }
            });
        } else {
            alert('Coupon code is empty.');
            location.reload();
        }
    }

    function copyToClipboard() {
        var urlText = document.getElementById('client_url').innerText; // Get the URL text
        navigator.clipboard.writeText(urlText).then(function() {
            alert('URL copied to clipboard'); // Success
        }, function(err) {
            alert('Unable to copy URL'); // Error
        });
    }
</script>
