<div class="container p-12 mx-auto">
    <div class="flex flex-col w-full px-0 mx-auto md:flex-row">
        <div class="flex flex-col md:w-full">
            <h2 class="mb-4 font-bold md:text-xl text-heading ">Lieferdaten
            </h2>
            <div class="justify-center w-full mx-auto">
                <form id="form" class="">
                    <div class="mt-4">
                        <div class="w-full">
                            <label for="company"
                                class="block mb-3 text-sm font-semibold text-gray-500">Firma</label>
                            <input name="company" id="company" type="text" placeholder="Firma"
                                class="w-full text-gray-700 px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                        </div>
                    </div>
                    <div class="space-x-0 lg:flex lg:space-x-4 mt-4">
                        <div class="w-full lg:w-1/2">
                            <label for="firstName" class="block mb-3 text-sm font-semibold text-gray-500">First
                                Name</label>
                            <input required name="firstName" id="firstName" type="text" placeholder="First Name"
                                class="w-full text-gray-700 px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                        </div>
                        <div class="w-full lg:w-1/2 ">
                            <label for="firstName" class="block mb-3 text-sm font-semibold text-gray-500">Last
                                Name</label>
                            <input required name="lastName" id="lastName" type="text" placeholder="Last Name"
                                class="w-full text-gray-700 px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="w-full">
                            <label for="Email"
                                class="block mb-3 text-sm font-semibold text-gray-500">Email</label>
                            <input required name="email" id="email" type="email" placeholder="Email"
                                class="w-full text-gray-700 px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                        </div>
                    </div>
                    <div class="space-x-0 lg:flex lg:space-x-4 mt-4">
                        <div class="w-full lg:w-3/4">
                            <label for="street" class="block mb-3 text-sm font-semibold text-gray-500">Straße</label>
                            <input required name="street" id="street" type="text" placeholder="Straße"
                                class="w-full text-gray-700 px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                        </div>
                        <div class="w-full lg:w-1/4 ">
                            <label for="housenumber" class="block mb-3 text-sm font-semibold text-gray-500">Hausnummer</label>
                            <input required name="housenumber" id="housenumber" type="text" placeholder="Hausnummer"
                                class="w-full text-gray-700 px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                        </div>
                    </div>
                    <div class="space-x-0 lg:flex lg:space-x-4 mt-4">
                        <div class="w-full lg:w-1/2">
                            <label for="city"
                                class="block mb-3 text-sm font-semibold text-gray-500">City</label>
                            <input required name="city" id="city" type="text" placeholder="City"
                                class="w-full text-gray-700 px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                        </div>
                        <div class="w-full lg:w-1/2 ">
                            <label for="postcode" class="block mb-3 text-sm font-semibold text-gray-500">
                                Postcode</label>
                            <input required name="postcode" id="postcode" type="text" placeholder="Post Code"
                                class="w-full text-gray-700 px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="flex flex-col w-full ml-0 lg:ml-12 lg:w-2/5">
            <div class="pt-12 md:pt-0 2xl:ps-4">
                <h2 class="text-xl font-bold">
                    Zahlungsmethode ({{ Cart::subtotal() }} €)
                </h2>
            </div>
            <div class="my-12 z-0" id="paypal-button-container"></div>

            <!-- Include the PayPal JavaScript SDK -->
            <script src="https://www.paypal.com/sdk/js?client-id=Aa4SADvSSC10koMLl27Rz_DnxgwUvfdUhfvceTIVI3L8sXpcm30CNehjwK6oHqShLwLtTagDY9zS_LLv&currency=EUR"></script>
        
            <script>
                let firstName, lastName, email, street, housenumber, city, postcode;
                    firstName = document.forms['form']['firstName'];
                    lastName = document.forms['form']['lastName'];
                    email = document.forms['form']['email'];
                    street = document.forms['form']['street'];
                    housenumber = document.forms['form']['housenumber'];
                    city = document.forms['form']['city'];
                    postcode = document.forms['form']['postcode'];

                    firstName.addEventListener('change', () => {
                        if (firstName.classList.contains("border-red-500")) {
                            firstName.classList.remove("border-red-500")
                        }
                    })

                    lastName.addEventListener('change', () => {
                        if (lastName.classList.contains("border-red-500")) {
                            lastName.classList.remove("border-red-500")
                        }
                    })


                    email.addEventListener('change', () => {
                        if (email.classList.contains("border-red-500")) {
                            email.classList.remove("border-red-500")
                        }
                    })

                    street.addEventListener('change', () => {
                        if (street.classList.contains("border-red-500")) {
                            street.classList.remove("border-red-500")
                        }
                    })
                    housenumber.addEventListener('change', () => {
                        if (housenumber.classList.contains("border-red-500")) {
                            housenumber.classList.remove("border-red-500")
                        }
                    })
                    city.addEventListener('change', () => {
                        if (city.classList.contains("border-red-500")) {
                            city.classList.remove("border-red-500")
                        }
                    })
                    postcode.addEventListener('change', () => {
                        if (postcode.classList.contains("border-red-500")) {
                            postcode.classList.remove("border-red-500")
                        }
                    })

                function validateForm() {

                    if ((firstName.value && lastName.value && email.value && street.value && housenumber.value && city.value && postcode.value) != "") {
                        return true;
                    } else {
                        return false;
                    }

                }

                function showError() {
                    if (firstName.value === "") {
                        firstName.classList.add("border-red-500")
                    }
                    if (lastName.value === "") {
                        lastName.classList.add("border-red-500")
                    }
                    if (email.value === "") {
                        email.classList.add("border-red-500")
                    }
                    if (street.value === "") {
                        street.classList.add("border-red-500")
                    }
                    if (housenumber.value === "") {
                        housenumber.classList.add("border-red-500")
                    }
                    if (city.value === "") {
                        city.classList.add("border-red-500")
                    }
                    if (postcode.value === "") {
                        postcode.classList.add("border-red-500")
                    }

                }
                // Render the PayPal button into #paypal-button-container
                paypal.Buttons({

                    onInit: function(data, actions) {


                        if (validateForm() === false) {
                            actions.disable();    
                        }
     
                        document.querySelector('#form')

                        .addEventListener('change', function(event) {

                            if (validateForm() === true) {

                            actions.enable();

                            } else {

                            actions.disable();

                            }

                        });

                    },
                        onClick: function() {

                        if (validateForm() === false) {

                            showError();

                        }

                    },
                    // Call your server to set up the transaction
                    
                    createOrder: function(data, actions) {
                        return fetch('api/paypal/order/create/', {
                            method: 'post',
                            body: JSON.stringify({
                                "content" : {!! json_encode($cartContent, JSON_HEX_TAG) !!},
                                "value" : "{{ Cart::subtotal() }}",
                                "company" : document.getElementById('company').value,
                                "firstName" : document.getElementById('firstName').value,
                                "lastName" : document.getElementById('lastName').value,
                                "email" : document.getElementById('email').value,
                                "street" : document.getElementById('street').value,
                                "housenumber" : document.getElementById('housenumber').value,
                                "city" : document.getElementById('city').value,
                                "postcode" : document.getElementById('postcode').value,
                            })
                        }).then(function(res) {
                            return res.json();
                        }).then(function(orderData) {
                            return orderData.id;
                        });
                    },
        
                    // Call your server to finalize the transaction
                    onApprove: function(data, actions) {
                        return fetch('/api/paypal/order/capture/', {
                            method: 'post',
                            body: JSON.stringify({
                                orderID : data.orderID
                            })
                        }).then(function(res) {
                            return res.json();
                        }).then(function(orderData) {
                            // Three cases to handle:
                            //   (1) Recoverable INSTRUMENT_DECLINED -> call actions.restart()
                            //   (2) Other non-recoverable errors -> Show a failure message
                            //   (3) Successful transaction -> Show confirmation or thank you
        
                            // This example reads a v2/checkout/orders capture response, propagated from the server
                            // You could use a different API or structure for your 'orderData'
                            var errorDetail = Array.isArray(orderData.details) && orderData.details[0];
        
                            if (errorDetail && errorDetail.issue === 'INSTRUMENT_DECLINED') {
                                return actions.restart(); // Recoverable state, per:
                                // https://developer.paypal.com/docs/checkout/integration-features/funding-failure/
                            }
        
                            if (errorDetail) {
                                var msg = 'Sorry, your transaction could not be processed.';
                                if (errorDetail.description) msg += '\n\n' + errorDetail.description;
                                if (orderData.debug_id) msg += ' (' + orderData.debug_id + ')';
                                return alert(msg); // Show a failure message (try to avoid alerts in production environments)
                            }
        
                            // Successful capture! For demo purposes:
                            actions.redirect('{{route('thankyou')}}');
                        });
                    }
        
                }).render('#paypal-button-container');
            </script>
        </div>
    </div>
</div>