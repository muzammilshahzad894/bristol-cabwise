<script type="text/javascript">
    var stripe = Stripe('{{ config('
        services.stripe.key ') }}');

    var checkoutButton = document.getElementById('checkout-button');

    checkoutButton.addEventListener('click', function() {
        fetch('/create-checkout-session', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
        })
        .then(function(response) {
            return response.json();
        })
        .then(function(session) {
            return stripe.redirectToCheckout({
                sessionId: session.id
            });
        })
        .then(function(result) {
            if (result.error) {
                alert(result.error.message);
            }
        })
        .catch(function(error) {
            console.error('Error:', error);
        });
    });
</script>

<script>
    let currentStep = 1;

    function nextStep() {
        if (currentStep < 4) {
            // check if current step is 1 and validate the form
            if (currentStep === 1) {
                if (!validateFirstStep()) {
                    return;
                }
            }

            if (currentStep === 2) {
                if(!validateSecondStep()) {
                    return;
                }
            }

            if(currentStep === 3) {
                if(!validateThirdStep()) {
                    return;
                }
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
        const validations = [
            {
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

        let isValid = true;
        validations.forEach(({ selector, errorSelector, message, isMultiple }) => {
            const elements = $(selector);
            const hasError = isMultiple 
                ? elements.filter((_, el) => !$(el).val()).length > 0 
                : !elements.val();
            
            $(errorSelector).text(hasError ? message : '');
            
            if (hasError) {
                isValid = false;
                elements.first().focus();
            }
        });

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
        const validations = [
            {
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
        
        const someOneElseValidation = [
            {
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
        validations.forEach(({ selector, errorSelector, message }) => {
            const element = $(selector);
            const hasError = !element.val();
            $(errorSelector).text(hasError ? message : '');
            if (hasError) {
                isValid = false;
                element.focus();
            }
        });

        if ($('#booking_for_someone').is(':checked')) {
            someOneElseValidation.forEach(({ selector, errorSelector, message }) => {
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
</script>

<script>
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

        fetch(`/fleet-details/${fleetId}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                }
                return response.json();
            })
            .then(data => {
                console.log(data);
                updateSelectOptions('no_passenger', data.max_passengers);
                updateSelectOptions('suit_case', data.max_suitecases);
                updateSelectOptions('hand_lauggage', data.max_hand_luggage);
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
        const checkboxes = document.querySelectorAll('input[name="fleet_id"]');
        checkboxes.forEach(cb => {
            if (cb !== checkbox) {
                cb.checked = false;
            }
        });
    }

    var paypal = document.getElementById('paypal');
    paypal.addEventListener('click', function() {
        window.location.href = '/paypal/payment';
    });
</script>