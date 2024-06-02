<script>
    let currentStep = 1;
    let FleetPrice = 0;
    let Fleet_id = 0;
    isChildSeat = false;
    meet_nd_greet = false;
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
    let Total_price ='';
    let service_type = '';


    $(document).ready(function() {

        var checkBox = document.getElementById("child_seat");
        var checkBox = document.getElementById("meet_greet");
        if (checkBox.checked == true) {
            isChildSeat = true;
        } else {
            isChildSeat = false;
        }
        if (checkBox.checked == true) {
            meet_nd_greet = true;
        } else {
            meet_nd_greet = false;
        }

    });



    function showChildSeat() {
        var checkBox = document.getElementById("child_seat");
        if (checkBox.checked == true) {
            isChildSeat = true;
        } else {
            isChildSeat = false;
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
    function updateSummary() {
    const ids = [
        'summary-service-type', 'summary-pickup-location', 'summary-drop-location', 
        'summary-date', 'summary-name', 'summary-telephone', 'summary-email', 
        'summary-passengers', 'summary-child-seat', 'summary-suitcases', 
        'summary-hand-luggage', 'summary-summary', 
        'summary-other-name', 'summary-other-telephone', 'summary-other-email', 
        'summary-total-price'
    ];

    ids.forEach(id => {
        const element = document.getElementById(id);
        if (!element) {
            console.error(`Element with id '${id}' not found`);
        }
    });

    document.getElementById('summary-service-type').innerText = service_type;
    document.getElementById('summary-pickup-location').innerText = pickup_location;
    document.getElementById('summary-drop-location').innerText = dropoff_location;
    document.getElementById('summary-date').innerText = dates_times;
    document.getElementById('summary-name').innerText = user_name;
    document.getElementById('summary-telephone').innerText = user_phone_number;
    document.getElementById('summary-email').innerText = user_email;
    document.getElementById('summary-passengers').innerText = no_of_passenger;
    document.getElementById('summary-child-seat').innerText = isChildSeat ? '1' : '0';
    document.getElementById('summary-suitcases').innerText = no_suite_case;
    document.getElementById('summary-hand-luggage').innerText = no_hand_luggage;
    document.getElementById('summary-summary').innerText = summary;
    document.getElementById('summary-other-name').innerText = other_name;
    document.getElementById('summary-other-telephone').innerText = other_phone_number;
    document.getElementById('summary-other-email').innerText = other_email;
    document.getElementById('summary-total-price').innerText = '£' + Total_price;

}

    function nextStep() {
        if (currentStep < 4) {
            var date_time = document.getElementById('date-time').value;

            if (currentStep === 1) {
                if (!validateFirstStep()) {
                    return;
                }
            }

            if (currentStep === 2) {
                if (!validateSecondStep()) {
                    return;
                }
            }

            if (currentStep === 3) {
                if (!validateThirdStep()) {
                    return;
                }
            }
            if(currentStep == 3) {
    var TotalPrice = parseInt(FleetPrice);
    FleetTaxes.forEach(tax => {
        TotalPrice += parseInt(tax.price);
    });
    TotalPrice += isChildSeat ? 6 : 0;
    TotalPrice += meet_nd_greet ? 12 : 0;
    Total_price = TotalPrice;

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
    dropoff_location = document.getElementById('dropLocation').value;
    dates_times = document.getElementById('date-time').value;
    flight_name = document.getElementById('flightName').value;
    flight_time = document.getElementById('flight_time').value;
    flight_type = document.getElementById('carType').value;
    total_price = TotalPrice;

    updateSummary();
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
     
        if($('#carType').val() == 2){
            console.log('Arrival');
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

    function addMore() {
        const dropLocationsContainer = document.getElementById("dropLocations");
        const dropLocationCount = dropLocationsContainer.children.length;
        const newDropLocation = document.createElement("div");
        newDropLocation.classList.add("drop-location");
        newDropLocation.innerHTML = `
                <label for="dropLocation${dropLocationCount + 1}">Drop Location ${dropLocationCount + 1}:</label>
                <input type="text" name="dropLocation[]" placeholder="Enter drop location" class="form-control pickupLocation" />
            `;
        dropLocationsContainer.appendChild(newDropLocation);
    }

    function selectFleet(fleet) {
        const fleets = document.querySelectorAll("#fleets-section");
        fleets.forEach((fleet) => fleet.classList.remove("selected-fleet"));
        fleet.classList.add("selected-fleet");
        const fleetId = fleet.getAttribute("data-fleet-id");
        Fleet_id = fleetId;

        fetch(`/fleet-details/${fleetId}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                }
                return response.json();
            })
            .then(data => {
                console.log(data);
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
    function handleCheckboxClick(checkbox) {
        var value = checkbox.value;
        FleetPrice = value;
        const checkboxes = document.querySelectorAll('input[name="fleet_id"]');
        checkboxes.forEach(cb => {
            if (cb !== checkbox) {
                cb.checked = false;
            }
        });
        console.log('page load ');
    }
    function triggerCheckedCheckbox() {
    const checkedCheckbox = document.querySelector('input[name="fleet_id"]:checked');
    if (checkedCheckbox) {
        handleCheckboxClick(checkedCheckbox);

        // Find the fleet container and trigger selectFleet
        const fleetContainer = checkedCheckbox.closest('.form-container');
        if (fleetContainer) {
            selectFleet(fleetContainer);
        }
    }
}

// Call the function on page load
document.addEventListener('DOMContentLoaded', triggerCheckedCheckbox);


    function paypalRedirect(bookingId) {
        var TotalPrice = parseInt(FleetPrice);
        FleetTaxes.forEach(tax => {
            TotalPrice += parseInt(tax.price);
        });
        TotalPrice += isChildSeat ? 6 : 0;
        TotalPrice += meet_nd_greet ? 12 : 0;
        var url = '/paypal/payment?id=' + bookingId;

        // window.location.href = url;
    }

    function bookAndPay(name) {
        payment_method = name;
        var formData = {
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
            dropoff_location: getElementValue('dropLocation'),
            date_time: getElementValue('date-time'),
            flight_name : getElementValue('flightName'),
            flight_time : getElementValue('flight_time'), 
            flight_type : getElementValue('carType'),
            fleet_id: Fleet_id,
            total_price: Total_price,

        };
        $fleet_id = document.querySelector('input[name="fleet_id"]:checked').value;
        if (formData.date_time) {
            var dateTimeArray = formData.date_time.split('T');
            var date = dateTimeArray[0];
            var time = dateTimeArray[1];
            formData.date = date;
            formData.time = time;
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
                }
                else{
                if(payment_method == 'paypal'){
                    paypalRedirect(data.booking_id);
                }else if(payment_method == "admin"){
                    $('#exampleModal').modal('show');
                    document.getElementById('message').textContent = "Your booking has been successfully updated.";  
                    var Debitcard = window.location.origin+'/book-online?payment_id='+data.booking_id;
                    var paypal = window.location.origin+'/paypal/payment?id='+data.booking_id;

                                 
                    document.getElementById('client_url').textContent = Debitcard + ' or ' + paypal;

                }
                else{
                    PayonStripe(data.booking_id);
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


    function pad(number) {
        return number < 10 ? '0' + number : number;
    }

    function setMinDateTime() {
        var now = new Date();
         let count = 0;
        var login_user = document.getElementById('login_user').value;
        if(login_user == "user"){
            count = 1;
        }
        now.setDate(now.getDate() + count); 
        var year = now.getFullYear();
        var month = pad(now.getMonth() + 1);
        var day = pad(now.getDate());
        var hours = pad(now.getHours());
        var minutes = pad(now.getMinutes());

        var minDateTime = year + '-' + month + '-' + day + 'T' + hours + ':' + minutes;
        document.getElementById('date-time').setAttribute('min', minDateTime);
    }

    window.onload = setMinDateTime;
    document.addEventListener('DOMContentLoaded', function () {
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
    var selectedServiceName = select.options[select.selectedIndex].text.trim(); // Get the text of the selected option
            service_type = selectedServiceName;
    if (selectedServiceName === 'Airport transfers') {
        document.getElementById("flight_type").style.display = "block"; // Show the div
    } else {
        document.getElementById("flight_type").style.display = "none"; // Hide the div
    }
}    

function AddCoupon(){
    var coupon = document.getElementById('coupon_input').style.display = "block";
}


</script>
