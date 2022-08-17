@extends('layouts.newapp')
@section('content')
    <div class="full-page">
        <div class="menu-information">
            <ul>
                <li><a href="/information/faq"
                        style="background-color:rgb(196, 148, 13); color:rgb(253, 253, 253); border-radius: 40px">FAQ</a>
                </li>
                <li><a href="/information/termXcondition">Term & Condition</a></li>
                <li><a href="/information/privacy">Privacy Policy</a></li>
            </ul>
        </div>
        <div class="card-b">
            <div class="background">
                <img src={{ asset('images/faq.jpg') }} alt="">
            </div>
            <div class="acc-container">
                <button class="acc-btn"> What are the advantages of DMgo Express?</button>
                <div class="acc-content">
                    <p>
                        1. J&T Express provide free Pick up Service (without additional fees, minimum weight and number).
                        Free pick up service available with call 24-hour call center 023 918 918 to order
                        <br>
                        2. You can easily find out the shipping tariff, and check the nearest drop point (branch office) to
                        your location through the application and website.
                        <br>
                        3. The facilities trace & tracking system will make you easier to track your packages' location
                        during the shipping process.
                        <br>
                        4. J&T Express Drop points operate every day (including weekends, and National Holidays)
                    </p>
                </div>

                <button class="acc-btn">
                    How do I send packages with DMgo Express?
                </button>
                <div class="acc-content">
                    <p>
                        DMgo Express has been spread out and covered all over Cambodia, you can directly visit the nearest
                        drop point from your location or use a free pick-up service via J&T Call Center.
                    </p>
                </div>

                <button class="acc-btn">
                    How is DMgo Express payment system?
                </button>
                <div class="acc-content">
                    <p>
                        For non-corporate customers, the payments should be in cash when sending the package through drop
                        point or picked up by DMgo Express sprinter.
                        For corporate customers, the payment system can be made with special terms and conditions.
                    </p>
                </div>

                <button class="acc-btn">
                    How do you check DMgo Express waybill number?
                </button>
                <div class="acc-content">
                    <p>
                        You can check J&T Express waybill number on J&T Express website www.jtexpress.com.kh or mobile application.
                    </p>
                </div>

                <button class="acc-btn">
                    How and when do you get DMgo Express waybill number?
                </button>
                <div class="acc-content">
                    <p>
                        Waybill numbers will be given directly by DMgo Express when the package is sent via drop point or got picked up by sprinter.
                    </p>
                </div>

                <button class="acc-btn">
                    How do you proceed a claim?
                </button>
                <div class="acc-content">
                    <p>
                        For proceed the claim, you can contact DMgo Express call center 023 918 918. Then you can take the claim form at the nearest drop point and complete all the needed requirements.
                    </p>
                </div>

                <button class="acc-btn">
                    How to send a package with insurance service?
                </button>
                <div class="acc-content">
                    <p>
                        You can tell the J&T Express drop point admin that you want to insure your shipment goods. Then, J&T Express will calculate your package insurance costs with a calculation 0.2% from the price of the invoice.
                    </p>
                </div>

                <button class="acc-btn">
                    What if there is damage and loss of package when shipping?
                </button>
                <div class="acc-content">
                    <p>
                        If you have made an insurance payment and completed all claim documents, then J&T Express will make a claim payment accordancing with the value of the goods, with maximum KHR 1,140,210,200
                    </p>
                </div>
                <button class="acc-btn">
                    What happens if the customer sends a package containing Dangerous Goods?
                </button>
                <div class="acc-content">
                    <p>
                        For customers who intentionally send prohibited items or dangerous goods, according to  Pasal 47 UU No. 38 Th. 2009, the customer will be sentenced to a maximum jail sentence of 5 (five) years or a maximum fine of Rp. 1,000,000,000 (One Billion Rupiah) and the delivery service provider (J&T Express) cannot be held liable for the incident.
                    </p>
                </div>
                <button class="acc-btn">
                    How to report complaints and advices?
                </button>
                <div class="acc-content">
                    <p>
                        You can contact our 24-hour customer service at 023 918 918.
                    </p>
                </div>
                <button class="acc-btn">
                    What kind of DMgo Express services?
                </button>
                <div class="acc-content">
                    <p>
                        <strong>Regular / EZ:</strong> shipping service throughout Cambodia with an estimated delivery time of 2-3 working days, depend on the delivery destination.
                    </p>
                </div>
                <button class="acc-btn">
                    How to change the address when the package has been sent?
                </button>
                <div class="acc-content">
                    <p>
                        For a replacement address when the package has been sent, you can immediately contact the J&T Express call center at 021-8066-1888 for further assistance.
                    </p>
                </div>
                <button class="acc-btn">
                    how to calculate the package with volumetric formula?
                </button>
                <div class="acc-content">
                    <p>
                        (Length x Width x Height) X 1 Kg / 6000
                    </p>
                </div>
                <button class="acc-btn">
                    How to send liquid goods through DMgo Express?
                </button>
                <div class="acc-content">
                    <p>
                        For liquid goods delivery can only be done through landline routes. For now J&T Express has not served liquid shipping across the islands.
                    </p>
                </div>

            </div>
        </div>
    </div>
@endsection
