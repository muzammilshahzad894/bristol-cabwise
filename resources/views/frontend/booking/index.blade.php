@extends('layouts.frontend.app')

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
                    <p>Quisque pretium fermentum quam, sit amet cursus ante sollicitudin vel. Morbi consequat risus
                        consequat, porttitor orci sit amet, iaculis nisl. Integer quis sapien nec elit ultrices euismon sit
                        amet id lacus. Sed a imperdiet erat. Duis eu est dignissim lacus dictum hendrerit quis vitae mi.
                        Fusce eu nulla ac nisi cursus tincidunt. Interdum et malesuada fames ac ante ipsum primis in
                        faucibus. Integer tristique sem eget leo faucibus porttiton.</p>
                    <p>Nulla vitae metus tincidunt, varius nunc quis, porta nulla. Pellentesque vel dui nec libero auctor
                        pretium id sed arcu. Nunc consequat diam id nisl blandit dignissim. Etiam commodo diam dolor, at
                        scelerisque sem finibus sit amet. Curabitur id lectus eget purus finibus laoreet.</p>
                </div>
            </div>
        </div>

        {{-- <ul class="progress-bar">
          <li class="progress-step" id="step1">Step 1</li>
          <li class="progress-step" id="step2">Step 2</li>
          <li class="progress-step" id="step3">Step 3</li>
        </ul>
        <button onclick="prevStep()">Previous</button>
        <button onclick="nextStep()">Next</button> --}}
        <div class="container">
            <div class="row  payment_section">
                <div class="col-md-7">
                    
                    <form style="max-width: 500px">
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
                                <input type="text" id="dropLocation" name="dropLocation" placeholder="Enter drop location"
                                    class="form-control pickupLocation" />
                            </div>
                            <div>
                                <label for="date">Date:</label>
                                <input type="text" class="form-control input datepicker" placeholder="Return Date" />
                            </div>
                        </div>
                        <div class="align-items-center">
                            <label for="time">Time:</label>
                            <div class="d-flex gap-2">
                                <select name="hours"  class="select2 select" style="width: 50%;">
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
                                <select name="minutes" id="" class="select2 select" style="width: 50%;">
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
                            {{-- <button type="submit" class="button-1 mt-15 mb-15 cutom_button">
                                Submit
                            </button> --}}
                        </div>
                    </form>
                </div>
                <div class="col-md-5" style="border-left: 1px solid #ccc">
                    <h5>Location</h5>
                    <div class="google-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1573147.7480448114!2d-74.84628175962355!3d41.04009641088412!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25856139b3d33%3A0xb2739f33610a08ee!2s1616%20Broadway%2C%20New%20York%2C%20NY%2010019%2C%20Amerika%20Birle%C5%9Fik%20Devletleri!5e0!3m2!1str!2str!4v1646760525018!5m2!1str!2str" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
    
        </div>
        

    </section>
@endsection
<style>
    .post {
        background-color: #f4f4f4;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .progress-bar {
        display: flex;
        justify-content: space-between;
        list-style: none;
        padding: 0;
        margin: 20px 0;
    }

    .progress-step {
        width: calc(100% / 3);
        text-align: center;
        position: relative;
        color: #ccc;
    }

    .progress-step.active {
        color: #007bff;
    }

    .progress-step.active::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 20px;
        height: 20px;
        background-color: #007bff;
        border-radius: 50%;
    }
    form {
      background-color: rgb(255 255 255 / 20%);
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    .cutom_button{
        width: 100%;
    }

    label {
      display: block;
      color: black;
      font-family: emoji;
      font-size: 21px;
      /* margin-bottom: 5px; */
      margin-top: 5px;
    }

    input[type="text"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      background-color: white;
    }

    button[type="submit"] {
      background-color: #f5b754;
      color: #fff;
      border: none;
      border-radius: 4px;
      padding: 10px 20px;
      cursor: pointer;
      font-size: 16px;
      margin-top: 40px !important;
      margin-left: 10px;
    }

    button[type="submit"]:hover {
      background-color: #f5b754;
    }

    body {
      font-family: "Outfit", sans-serif;
      font-size: 14px;
      font-weight: 300;
      line-height: 1.95em;
      color: #999;
      overflow-x: hidden !important;
    }

    /* Dark theme */
    body.dark-theme {
      background: #1b1b1b;
      color: #ccc;
    }

    /* Light theme */
    body.light-theme {
      background: #fff;
      color: #333;
    }

    /* Toggle button */
    .toggle-btn {
      position: relative;
      display: inline-block;
      width: 60px;
      height: 30px;
      background-color: #ddd;
      border-radius: 15px;
      transition: background-color 0.3s;
      cursor: pointer;
    }

    .toggle-btn:before {
      content: "";
      position: absolute;
      top: 2px;
      left: 2px;
      width: 26px;
      height: 26px;
      background-color: #fff;
      border-radius: 50%;
      transition: transform 0.3s;
    }

    input[type="checkbox"] {
      display: none;
    }

    input[type="checkbox"]:checked + .toggle-btn:before {
      transform: translateX(30px);
    }

    input[type="checkbox"]:checked + .toggle-btn {
      background-color: #f5b754; /* Change color when dark mode is activated */
    }
</style>
<script>
    let currentStep = 1;

    function nextStep() {
        if (currentStep < 3) {
            currentStep++;
            updateProgress();
        }
    }

    function prevStep() {
        if (currentStep > 1) {
            currentStep--;
            updateProgress();
        }
    }

    function updateProgress() {
        const steps = document.querySelectorAll('.progress-step');
        steps.forEach(step => step.classList.remove('active'));
        document.getElementById(`step${currentStep}`).classList.add('active');
    }
</script>
