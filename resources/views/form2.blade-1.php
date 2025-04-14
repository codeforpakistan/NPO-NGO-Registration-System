<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel Form Wizard</title>
    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/formwizard/smart_wizard.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/formwizard/smart_wizard_theme_arrows.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/formwizard/smart_wizard_theme_circles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/formwizard/smart_wizard_theme_dots.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
    </style>
</head>
<body>

<div class="container">
    <h3 class="text-center mb-4">Laravel Form Wizard</h3>
    <div id="smartwizard">
        <ul class="nav">
            <li>
                <a class="nav-link" href="#step-1">
                    Step 1<br><small>Personal Information</small>
                </a>
            </li>
            <li>
                <a class="nav-link" href="#step-2">
                    Step 2<br><small>Account Details</small>
                </a>
            </li>
            <li>
                <a class="nav-link" href="#step-3">
                    Step 3<br><small>Confirmation</small>
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <!-- Step 1 -->
            <div id="step-1" class="tab-pane" role="tabpanel">
                <form>
                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input type="text" class="form-control" id="firstName" placeholder="Enter your first name">
                    </div>
                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input type="text" class="form-control" id="lastName" placeholder="Enter your last name">
                    </div>
                </form>
            </div>
            <!-- Step 2 -->
            <div id="step-2" class="tab-pane" role="tabpanel">
                <form>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Create a password">
                    </div>
                </form>
            </div>
            <!-- Step 3 -->
            <div id="step-3" class="tab-pane" role="tabpanel">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="terms">
                    <label class="form-check-label" for="terms">
                        I agree to the Terms and Conditions
                    </label>
                </div>
                <button type="submit" class="btn btn-success mt-3">Finish</button>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript Files -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets/plugins/formwizard/jquery.smartWizard.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#smartwizard').smartWizard({
            theme: 'arrows', // Choose theme: 'default', 'arrows', 'circles', 'dots'
            transitionEffect: 'fade', // Transition effects: 'slide', 'fade', etc.
            showStepURLhash: false, // Disable URL hash updates
            toolbarSettings: {
                showNextButton: true, // Show Next button
                showPreviousButton: true, // Show Previous button
            }
        });
    });
</script>

</body>
</html>



















