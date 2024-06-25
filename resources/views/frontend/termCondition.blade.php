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
    
    <h2>Charges and Payment</h2>
    <ul>
        <li>1. All charges are as per the current BristolCabwise.com tariff and must be paid in advance unless you have an approved credit account or an approved credit card with us.</li>
        <li>2. Value-added tax (VAT) will be added at the appropriate rate to all charges.</li>
        <li>3. All hires commence when the vehicle leaves our garage and terminate upon its return to the garage.</li>
        <li>4. We strive to provide the same vehicle and driver for the duration of your hire; however, we reserve the right to substitute any vehicle or driver if necessary.</li>
        <li>5. Drivers will operate at reasonable speeds based on their judgement of road and traffic conditions at the time and will not be required to drive beyond their discretion.</li>
        <li>6. We accept no responsibility for delays, regardless of the cause.</li>
        <li>7. Only company employees are permitted to drive our vehicles unless a specific self-drive agreement is in place.</li>
        <li>8. For specific destinations, drivers will choose the most suitable route based on their professional judgement. This may not always be the shortest route.</li>
        <li>9. A reasonable amount of standard passenger luggage is allowed. If the driver deems the luggage excessive by weight or size, they may decline to carry it.</li>
        <li>10. We are not liable for any loss or damage to luggage or personal property during transit.</li>
    </ul>

    <h2>Cancellation Policy</h2>
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
    </ul>

    <h2>Privacy Policy</h2>
    <h3>Section 1 – Information Collection</h3>
    <p>When you request our services, we collect personal information such as your name, address, email address, and phone number. We also collect your computer’s IP address when you browse our website to understand your browser and operating system.</p>
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
    <p>For further information regarding our terms and conditions, please call 07533225970.</p>
</div>

@endsection
