@extends('layouts.frontend.app')

<style>


    h1, h2 {
        color: #f5b754 !important;
    }
    p, li {
        color: #ddd;
        margin-bottom: 10px;
    }
    ul {
        list-style-type: none;
        padding-left: 0;
    }
    a {
        color: #f5b754;
        text-decoration: none;
    }
    a:hover {
        text-decoration: underline;
    }
    h3{
        color: white !important;
    }
</style>

@section('content')

<div class="container">
    <h1 style="text-align: center;margin-bottom:90px;">Terms and Conditions</h1>

    <h2>Cancellation, Charges and Payment</h2>
    <ul>
        <li>1.Free Cancellation: You may cancel your booking free of charge up to 24 hours before your scheduled pick-up time. This allows you to make changes to your plans without incurring any fees if you notify us within this period.</li>
        <li>2. Cancellation Within 24 Hours: If you cancel your booking within 24 hours of the scheduled pick-up time, cancellation fee equivalent to 50% of the total booking will be charged.. This policy ensures compensation for the driver’s time and resources, as cancellations close to the service time prevent us from reallocating the vehicle.</li>
        <li>3. Cancellation After Driver Dispatch: If the driver has already been dispatched when you cancel, the full amount of the booking will be charged. This policy covers the costs associated with sending a driver to the location.</li>
        <li>4.No-Show Policy: If you do not show up at the scheduled pick-up time and do not inform us of your cancellation, you will be charged the full amount of the booking. This policy addresses the situation where the service has been prepared but not utilized.</li>
        <li>5.Refunds: Refunds for cancellations made in accordance with this policy will be processed according to our refund policy, which is available upon request. We aim to handle all refund requests promptly and fairly.</li>
        <li>6. Modification of Booking: If you need to modify your booking, please contact us as soon as possible. Changes made within 24 hours of the scheduled pick-up time may incur additional charges due to the proximity of the service date.</li>
        <li>7. Exceptional Circumstances: We recognize that unforeseen emergencies or severe weather conditions may arise. We reserve the right to consider exceptions to this policy on a case-by-case basis in such exceptional circumstances.</li>
        <li>8.Contact Information: To cancel or modify your booking, please contact us directly using the contact details provided on our website. We are here to assist you with any changes or cancellations you need to make.</li>

    </ul>

    <!-- <h2>Cancellation Policy</h2>
    <p><strong>Airport Transfers</strong></p>
    <ul>
        <li>If you cancel 24 hours or more before the scheduled pick-up, there will be no charge.</li>
        <li>If you cancel less than 24 hours before the scheduled pick-up, the full charge will apply.</li>
    </ul>

    <p><strong>A to B, As Directed, Wait and Return, or Event Bookings</strong></p>
    <ul>
        <li>If you cancel 24 hours or more before the scheduled pick-up, there will be no charge.</li>
        <li>If you cancel between 24 and 12 hours before the scheduled pick-up, a maximum of 2 hours' hire will be charged.</li>
        <li>If you cancel less than 12 hours before the scheduled pick-up, the full charge up to a maximum of 8 hours will apply.</li>
    </ul> -->

    <h2>Privacy Policy</h2>
    <h3>Section 1 – Information Collection</h3>
    <p>When you request our services, we collect personal information such as your name, address, email address, and phone number.</p>
    <p>Email marketing (if applicable): With your permission, we may send you emails about our services and updates. You can opt-out at any time by letting us know.</p>

    <h3>Section 2 – Consent</h3>
    <p><strong>How do you get my consent?</strong></p>
    <p>When you provide personal information to request a quote, complete a transaction, or make a booking, we assume you consent to us collecting and using it for that specific purpose. For any additional uses, we will ask for your explicit consent or provide a way for you to opt-out.</p>
    <p><strong>How do I withdraw my consent?</strong></p>
    <p>If you change your mind after opting in, you can withdraw your consent for us to contact you or use your information by contacting us.</p>

    <h3>Section 3 – Disclosure</h3>
    <p>We may disclose your personal information if required by law or if you violate our Terms & Conditions.</p>

    <h3>Section 4 – Payment Providers</h3>
    <p>If you choose a direct payment gateway, your transaction data is encrypted through PCI-DSS standards. After your purchase, your transaction information is deleted. All direct payment gateways adhere to PCI-DSS standards to ensure secure handling of credit card information.</p>

    <h3>Section 5 – Third-Party Services</h3>
    <p>Third-party providers used by us will only collect, use, and disclose your information to the extent necessary to perform the services they provide. For these providers, we recommend reading their privacy policies to understand how your personal information will be handled.</p>
    <p>Remember that some providers may be located in different jurisdictions. By proceeding with a transaction involving a third-party service provider, your information may be subject to the laws of the jurisdiction where the provider or its facilities are located.</p>
    <p>Once you leave our website or are redirected to a third-party website, you are no longer governed by this Privacy Policy or our website’s Terms and Conditions.</p>

    <h3>Links</h3>
    <p>Our site may contain links to other websites. We are not responsible for the privacy practices of other sites and encourage you to read their privacy statements.</p>

    <h3>Section 6 – Security</h3>
    <p>We take reasonable precautions to protect your personal information. If you provide credit card information, it is encrypted using SSL technology and stored with AES-256 encryption. Although no method of transmission over the Internet or electronic storage is 100% secure, we follow all PCI-DSS requirements and implement additional industry standards.</p>

    <h3>Section 7 – Age of Consent</h3>
    <p>By using this site, you confirm that you are at least the age of majority in your state or province of residence or have given us your consent to allow any minor dependents to use this site.</p>

    <h3>Section 8 – Changes to this Privacy Policy</h3>
    <p>We reserve the right to modify this privacy policy at any time, so please review it frequently. Changes will take effect immediately upon posting on the website. If we make significant changes, we will notify you here. If our company is acquired or merged, your information may be transferred to the new owners.</p>

    <h2>Questions and Contacting Us</h2>
    <p>If you want to access, correct, amend, or delete personal information we have about you, or if you have any questions, please contact us via our contact page.</p>
    <p>For further information regarding our terms and conditions, please call 01173322782.</p>
</div>

@endsection
