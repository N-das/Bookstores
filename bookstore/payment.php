<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="payment.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <title>Payment</title>
</head>
<body>
    <div class="container">

        <h2>Payment Form</h2>

        <form action="">
            <h3>Account</h3>

            <div class="input_group">
                <div class="input_box">
                    <input type="text" class="name" placeholder="Full name" required>
                    <i class="fa fa-user icon"></i>
                </div>

                <div class="input_box">
                    <input type="text" class="name" placeholder="Name on card" required>
                    <i class="fa fa-user icon"></i>
                </div>
            </div>
          
            <div class="input_group">
                <div class="input_box">
                    <input type="email" class="name" placeholder="Email address" required>
                    <i class="fa fa-envelope icon"></i>
                </div>
            </div>

            <div class="input_group">
                <div class="input_box">
                    <input type="text" class="name" placeholder="Address" required>
                    <i class="fa fa-map-marker icon" aria-hidden="true"></i>
                </div>
            </div>

            <div class="input_group">
                <div class="input_box">
                    <input type="text" class="name" placeholder="City" required>
                    <i class="fa fa-institution icon"></i>
                </div>
            </div>


            <div class="input_group">
                <div class="input_box">
                    
                    <h3>Date of Birth</h3>

                    <input type="pin" class="dob" placeholder="DD" maxlength="2" minlength="2" required>
                    <input type="pin" class="dob" placeholder="MM"  maxlength="2" minlength="2" required>
                    <input type="pin" class="dob" placeholder="YYYY" maxlength="2" minlength="2" required>
                    
                <div class="gender">
                    <h3>Gender</h3>
                    <input type="radio" class="radio" id="male" name="gender" required>
                    <label id="m" for="male">Male</label>

                    <input type="radio" class="radio" id="female" name="gender" required>
                    <label id="fm" for="female">Female</label>

                    <input type="radio" class="radio" id="trans" name="gender" required>
                    <label id="tr" for="trans">Transgender</label>
                </div> 

                </div>
            </div>

            <div class="input_group">
                <div class="input_box">
                    <h3>Payment Details</h3>

                    <input type="radio" name="pay" class="radio" id="credit_card">
                    <label for="credit_card"><span><i class="fa fa-cc-visa"></i>Credit Card</span></label>

                    <input type="radio" name="pay" class="radio" id="debit_card">
                    <label for="debit_card"><span><i class="fa fa-cc-mastercard"></i>Debit Card</span></label>
                    
                    <input type="radio" name="pay" class="radio" id="cod">
                    <label for="cod"><span><i class="fa fa-money"></i>COD</span></label>
                </div>
            </div>

            <div class="input_group">
                <div class="input_box">
                    <input type="tel" class="name" placeholder="card no 1111 - 2222 - 3333 - 4444" minlength="16" maxlength="16" required>
                    <i class="fa fa-credit-card icon"></i>
                </div>
            </div>

            <div class="input_group">
                <div class="input_box">
                    <input type="pin" class="name" placeholder="cvc 000" minlength="3" maxlength="3" required>
                    <i class="fa fa-user icon"></i>
                </div>
            </div>

            <div class="input_group">
                <div class="input_box">
                    <input type="pin" class="name" placeholder="Expiry Month" minlength="2" maxlength="2"  required>
                    <i class="fa fa-calendar icon"></i>
                </div>
            </div>

            <div class="input_group">
                <div class="input_box">
                    <input type="number" class="name" placeholder="Expiry Yaer" required>
                    <i class="fa fa-calendar icon"></i>
                </div>
            </div>

            <div class="input_box">
                <input type="number" class="name" placeholder="Enter amount" required>
                <i class="fa fa-money icon"></i>
            </div>

            <div class="input_group">
                <div class="input_box">
                    <button type="submit">Pay</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>