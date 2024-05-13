@extends('layouts.frontend.app')

<style>
  .footer-box {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: rgb(207, 207, 207);
      padding: 0 0 0 10px;
      color: white;

  }

  .footer-box p {
      margin-bottom: 0px !important;
  }

  .proceed {
      background-color: black;
      color: white;
      padding: 0px 15px;
      border-radius: 10px;

  }

  .p-6 {
      padding: 20px;
  }

  .form-container {
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      /* padding: 20px; */
      margin-bottom: 20px;
      /* Adjust as needed */
      margin-right: 10px;
      max-width: 200px;
  }

  .main-div {
      display: flex;
      flex-wrap: inherit;
  }

  .new_form {
      max-width: 550px;
      background-color: rgb(255 255 255 / 20%);
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }

  .button-1:hover {
      background: #f5b754 !important;
      color: white !important;
      /* font-size: 19px; */
      font-weight: 600;
  }

  .both_btn {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-top: 20px;
  }

  .previous_btn {
      background: black;
      color: white;
      border: none;
      padding: 14px 42px;
      cursor: pointer;
      border-radius: 30px;
      transition: border-color 300ms ease, transform 300ms ease,
          background-color 300ms ease, color 300ms ease;
      transform-style: preserve-3d;
  }

  .previous_btn:hover {
      transform: translate3d(0px, -6px, 0.01px);
      /* font-size: 19px; */
      font-weight: 600;
  }

  .new_form label {
      display: block;
      color: black;
      font-family: emoji;
      font-size: 21px;
      margin-top: 5px;
      min-width: 140px;
  }

  .new_form button[type="submit"] {
      background-color: #f5b754;
      color: #fff;
      border: none;
      border-radius: 4px;
      padding: 10px 20px;
      cursor: pointer;
      font-size: 16px;
      margin-left: 10px;
  }

  .new_form button[type="submit"]:hover {
      background-color: #f5b754;
  }

  .post {
      background-color: #f4f4f4;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  .progress-bar_main {
      display: flex;
      justify-content: space-between;
      list-style: none;
      padding: 0;
      margin: 20px 0;
      flex-direction: row;
  }

  .progress-step {
      width: calc(100% / 4);
      text-align: center;
      position: relative;
      color: #ccc;
  }

  .progress-step.active {
      color: #007bff;
      font-size: 19px;
  }

  .progress-step.active::after {
      content: "";
      position: absolute;
      bottom: -10px;
      left: 50%;
      transform: translateX(-50%);
      width: 20px;
      height: 20px;
      background-color: #007bff;
      border-radius: 50%;
  }

  .payment_section {
      display: flex;
      justify-content: space-between;
  }

  .col-md-7,
  .col-md-5 {
      flex: 1;
      /* Equal width for both columns */
  }

  .border-botom {
    padding-bottom: 30px;
      border-bottom: 1px solid rgb(27, 27, 27);
  }
  input.form-control.pickupLocation.custom_input {
    max-width: 220px;
}

  @media (max-width: 768px) {
      .form-container {
          max-width: 280px !important;
      }

      .column_type {
          flex-direction: column !important;
          align-items: start !important;
          text-align: left !important;
          gap: 10px !important;

      }

      .custom_input {
          height: 42px !important;
      }
      
  }
</style>
@section('content')
    <section class="banner-header section-padding bg-img" data-overlay-dark="4"
        data-background="{{ asset('frontend-assets/img/slider/1.jpg') }}">
        <div class="v-middle">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 mt-30">
                        <div class="post-wrapper">
                            <a href="index-2.html">
                                <div>Home</div>
                            </a>
                            <div class="divider"></div>
                            <div class="text-white"><a href="#">book online</a></div>
                        </div>
                        <h1>Rental cost of sport and other cars</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- divider line -->
    <!-- Post -->
    <section class="post section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>
                        Quisque pretium fermentum quam, sit amet cursus ante sollicitudin
                        vel. Morbi consequat risus consequat, porttitor orci sit amet,
                        iaculis nisl. Integer quis sapien nec elit ultrices euismon sit
                        amet id lacus. Sed a imperdiet erat. Duis eu est dignissim lacus
                        dictum hendrerit quis vitae mi. Fusce eu nulla ac nisi cursus
                        tincidunt. Interdum et malesuada fames ac ante ipsum primis in
                        faucibus. Integer tristique sem eget leo faucibus porttiton.
                    </p>
                    <p>
                        Nulla vitae metus tincidunt, varius nunc quis, porta nulla.
                        Pellentesque vel dui nec libero auctor pretium id sed arcu. Nunc
                        consequat diam id nisl blandit dignissim. Etiam commodo diam
                        dolor, at scelerisque sem finibus sit amet. Curabitur id lectus
                        eget purus finibus laoreet.
                    </p>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row payment_section">
                <ul class="progress-bar_main">
                    <li class="progress-step active" id="step1">Step 1</li>
                    <li class="progress-step" id="step2">Step 2</li>
                    <li class="progress-step" id="step3">Step 3</li>
                    <li class="progress-step" id="step4">Step 4</li>
                </ul>
                <div class="col-md-8">
                    <div class="new_form step1" id="forms">
                        <h2>Journey Details</h2>
                        <div>
                            <label for="carType">Book Car:</label>
                            <select class="select2 select" style="width: 100%">
                                <option value="0">Choose Car Type</option>
                                <option value="1">Luxury Cars</option>
                                <option value="2">Business Cars</option>
                                <option value="3">Standard</option>
                            </select>
                        </div>
                        <div class="gap-3">
                            <div>
                                <label for="pickupLocation">Pickup Location:</label>
                                <input type="text" id="pickupLocation" name="pickupLocation"
                                    placeholder="Enter pickup location" class="form-control pickupLocation" />
                            </div>
                            <div>
                                <label for="dropLocation">Drop Location:</label>
                                <input type="text" id="dropLocation" name="dropLocation"
                                    placeholder="Enter drop location" class="form-control pickupLocation" />
                            </div>
                            <div>
                                <label for="date">Date:</label>
                                <input type="text" class="form-control input datepicker" placeholder="Return Date" />
                            </div>
                        </div>
                        <div class="align-items-center">
                            <label for="time">Time:</label>
                            <div class="d-flex gap-2">
                                <select name="hours" class="select2 select" style="width: 50%">
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                </select>
                                <select name="minutes" id="" class="select2 select" style="width: 50%">
                                    <option value="00">00</option>
                                    <option value="05">05</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                    <option value="25">25</option>
                                    <option value="30">30</option>
                                    <option value="35">35</option>
                                    <option value="40">40</option>
                                    <option value="45">45</option>
                                    <option value="50">50</option>
                                    <option value="55">55</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="new_form step2 row">
                        <div>
                            <label for="payment_type">payment type</label>
                            <select class="select2 select" style="width: 100%" name="payment_type" id="payment_type">
                                <option value="0">Choose payment type</option>
                                <option value="1">Debit card</option>
                                <option value="2">Paypal</option>
                            </select>
                        </div>
                        <div>
                            <strong>Type of Cars:</strong>
                        </div>
                        <div class="main-div">
                            <div class="col-md-6 form-container">
                                <div class="p-6">
                                    <img src="{{ asset('frontend-assets/img/car.jpg') }}" alt="" />
                                    <div class="d-flex gap-2 align-items-center">
                                        <i class="fa-solid fa-user"></i>
                                        <p>Max Passenger:</p>
                                        <span>4</span>
                                    </div>
                                    <div class="d-flex gap-2 align-items-center">
                                        <i class="fa-solid fa-suitcase"></i>
                                        <p>Max Luggage:</p>
                                        <span>2</span>
                                    </div>
                                    <div class="d-flex gap-2 align-items-center">
                                        <i class="fa-solid fa-suitcase"></i>
                                        <p>Max Luggage:</p>
                                        <span>2</span>
                                    </div>
                                </div>

                                <div class="footer-box">
                                    <p>price: <strong> 600$ </strong></p>
                                    <button class="proceed">Proceed</button>
                                </div>
                            </div>

                            <div class="col-md-6 form-container">
                                <div class="p-6">
                                  <img src="{{ asset('frontend-assets/img/car.jpg') }}" alt="" />
                                    <div class="d-flex gap-2 align-items-center">
                                        <i class="fa-solid fa-user"></i>
                                        <p>Max Passenger:</p>
                                        <span>4</span>
                                    </div>
                                    <div class="d-flex gap-2 align-items-center">
                                        <i class="fa-solid fa-suitcase"></i>
                                        <p>Max Luggage:</p>
                                        <span>2</span>
                                    </div>
                                    <div class="d-flex gap-2 align-items-center">
                                        <i class="fa-solid fa-suitcase"></i>
                                        <p>Max Luggage:</p>
                                        <span>2</span>
                                    </div>
                                </div>

                                <div class="footer-box">
                                    <p>price: <strong> 600$ </strong></p>
                                    <button class="proceed">Proceed</button>
                                </div>
                            </div>

                            <div class="col-md-6 form-container">
                                <div class="p-6">
                                  <img src="{{ asset('frontend-assets/img/car.jpg') }}" alt="" />
                                    <div class="d-flex gap-2 align-items-center">
                                        <i class="fa-solid fa-user"></i>
                                        <p>Max Passenger:</p>
                                        <span>4</span>
                                    </div>
                                    <div class="d-flex gap-2 align-items-center">
                                        <i class="fa-solid fa-suitcase"></i>
                                        <p>Max Luggage:</p>
                                        <span>2</span>
                                    </div>
                                    <div class="d-flex gap-2 align-items-center">
                                        <i class="fa-solid fa-suitcase"></i>
                                        <p>Max Luggage:</p>
                                        <span>2</span>
                                    </div>
                                </div>

                                <div class="footer-box">
                                    <p>price: <strong> 600$ </strong></p>
                                    <button class="proceed">Proceed</button>
                                </div>
                            </div>

                            <div class="col-md-6 form-container">
                                <div class="p-6">
                                  <img src="{{ asset('frontend-assets/img/car.jpg') }}" alt="" />
                                    <div class="d-flex gap-2 align-items-center">
                                        <i class="fa-solid fa-user"></i>
                                        <p>Max Passenger:</p>
                                        <span>4</span>
                                    </div>
                                    <div class="d-flex gap-2 align-items-center">
                                        <i class="fa-solid fa-suitcase"></i>
                                        <p>Max Luggage:</p>
                                        <span>2</span>
                                    </div>
                                    <div class="d-flex gap-2 align-items-center">
                                        <i class="fa-solid fa-suitcase"></i>
                                        <p>Max Luggage:</p>
                                        <span>2</span>
                                    </div>
                                </div>

                                <div class="footer-box">
                                    <p>price: <strong> 600$ </strong></p>
                                    <button class="proceed">Proceed</button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="step3 new_form">
                      <div class="d-flex align-items-center gap-4 column_type">
                          <label for="name" class="passenger_lebals">Name</label>
                          <input type="text"
                          class="form-control pickupLocation custom_input"
                          name="name"
                          placeholder="Enter Your Name"
                          />          
                      </div>
                      <div class="d-flex align-items-center gap-4 column_type">
                          <label for="tele" class="passenger_lebals">Telephone</label>
                          <input type="text" class="form-control pickupLocation custom_input" id="tele" name="telephone" placeholder="Enter Your Telephone" />
                          <div id="telephone-error" class="error-message"></div>
                                  
                      </div>
                      <div class="d-flex align-items-center gap-4 column_type border-botom">
                          <label for="tele" class="passenger_lebals">Email</label>
                          <input type="email" class="form-control pickupLocation custom_input" id="" name="email" placeholder="Enter Your Email" />
                          <div id="telephone-error" class="error-message"></div>      
                      </div>
                      <div>
                          <div class="d-flex align-items-center gap-4 column_type mt-4">
                              <label for="no_passenger" class="passenger_lebals">No of passenger</label>
                              <input type="number" class="" style="width: 70px;" id="no_passenger" name="no_passenger"  value="1">
                              <div id="passenger-error" class="error-message"></div>      
                          </div>
                          <div class="d-flex align-items-center gap-4 column_type">
                              <label for="child_seat" class="passenger_lebals">Child Seat</label>
                              <input type="number" class="" style="width: 70px;" id="child_seat" name="child_seat"  value="0">
                              <div id="child-error" class="error-message"></div>      
                          </div>
                          <div class="d-flex align-items-center gap-4 column_type">
                              <label for="suit_case" class="passenger_lebals">SuitCases</label>
                              <input type="number" class="" style="width: 70px;" id="suit_case" name="suit_case"  value="0">
                              <div id="suit-error" class="error-message"></div>      
                          </div>
                          <div class="d-flex align-items-center gap-4 column_type">
                              <label for="hand_lauggage" class="passenger_lebals">Hand luggage</label>
                              <input type="number" class="" style="width: 70px;" id="hand_lauggage" name="hand_lauggage"  value="0">
                              <div id="luggage" class="error-message"></div>      
                          </div>
                      </div>
                      
                  </div>
                    <div class="step4">hello world</div>
                    <div class="both_btn">
                        <button class="previous_btn" onclick="prevStep()">
                            Previous
                        </button>
                        <button type="submit" class="button-1 mt-15 mb-15 cutom_button" onclick="nextStep()">
                            Next
                        </button>
                    </div>
                </div>
                <div class="col-md-4" style="border-left: 1px solid #ccc">
                    <h5>Location</h5>
                    <div class="google-map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1573147.7480448114!2d-74.84628175962355!3d41.04009641088412!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25856139b3d33%3A0xb2739f33610a08ee!2s1616%20Broadway%2C%20New%20York%2C%20NY%2010019%2C%20Amerika%20Birle%C5%9Fik%20Devletleri!5e0!3m2!1str!2str!4v1646760525018!5m2!1str!2str"
                            width="100%" height="100%" style="border: 0" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
<script>
  let currentStep = 1;

  function nextStep() {
      if (currentStep < 4) {
          currentStep++;
          updateProgress();
          updateFormVisibility();
          updateButtonVisibility();
      }
  }

  function prevStep() {
      if (currentStep > 1) {
          currentStep--;
          updateProgress();
          updateFormVisibility();
          updateButtonVisibility();
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
</script>
@endsection

