<!DOCTYPE html>
<html>
<head>
    <title>Create Invoice</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #aab4bf3b;
        }
        .container {
            max-width: 900px;
            margin-top: 50px;
            margin-bottom: 50px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff;
            padding: 30px;
        }
        .form-group label {
            font-weight: bold;
            padding-right: 26px;
        }
        .custom-radio input[type="radio"] {
            opacity: 0;
            position: fixed;
            width: 0;
        }
        .custom-radio label {
            display: inline-block;
            padding: 10px 20px;
            margin-bottom: 0;
            cursor: pointer;
            border: 1px solid #ddd;
            border-radius: 4px;
            color: #555;
            transition: background-color 0.3s ease;
        }
        .custom-radio label:hover {
            background-color: #f5f5f5;
        }
        .custom-radio input[type="radio"]:checked+label {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }
        .custom-radio input[type="radio"]:checked+label:hover {
            background-color: #007bff;
        }
        .form-check-inline {
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div style="float: right">
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-dropdown-link>
            </form>
        </div>
        <h1>Create Invoice</h1>
        <form method="POST" action="{{ route('invoice.store') }}">
            @csrf

            <div class="form-group">
                <label for="amount">Amount:</label>
                <div class="input-group">
                    <span class="input-group-prepend">
                        <span class="input-group-text">$</span>
                    </span>
                    <input type="number" class="form-control" id="amount" name="amount" required>
                </div>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>

            <div class="form-group">
                <label>Brand:</label>
                <div class="radio-group">
                    <input type="radio" id="brand1" name="brand" value="Amazon Author Solutions">
                    <label for="brand1">Amazon Author Solutions</label>

                    <input type="radio" id="brand2" name="brand" value="Fyra publishing">
                    <label for="brand2">Fyra publishing</label>

                    <input type="radio" id="brand3" name="brand" value="Fyra Square">
                    <label for="brand3">Fyra Square</label>
                </div>
            </div>

            <div class="form-group">
                <label>Services Type:</label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="invoice1" name="invoice_type" value="Publishing"
                        required>
                    <label class="form-check-label" for="invoice1">Publishing</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="invoice2" name="invoice_type"
                        value="Editing & proofreading" required>
                    <label class="form-check-label" for="invoice2">Editing & proofreading</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="invoice3" name="invoice_type" value="Writing"
                        required>
                    <label class="form-check-label" for="invoice3">Writing</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="invoice4" name="invoice_type"
                        value="Book marketing" required>
                    <label class="form-check-label" for="invoice4">Book marketing</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="invoice5" name="invoice_type"
                        value="Illustrations" required>
                    <label class="form-check-label" for="invoice5">Illustrations</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="invoice6" name="invoice_type" value="Audiobook"
                        required>
                    <label class="form-check-label" for="invoice6">Audiobook</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="invoice7" name="invoice_type"
                        value="Website Development " required>
                    <label class="form-check-label" for="invoice7">Website Development </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="invoice8" name="invoice_type" value="Others"
                        required>
                    <label class="form-check-label" for="invoice8">Others</label>
                </div>
            </div>

            <div class="form-group">
                <label for="customer_email">Customer Email:</label>
                <input type="email" class="form-control" id="customer_email" name="customer_email" required>
            </div>

            <div class="form-group">
                <label for="salesperson_email">Salesperson Email:</label>
                <input type="email" class="form-control" id="salesperson_email" name="salesperson_email" required>
            </div>

            <div class="form-group">
                <label for="designsutility_email">Designsutility Email:</label>
                <select class="form-control" id="designsutility_email" name="designsutility_email" required>
                    <option value="">Select Designsutility Email</option>
                    <option value="Billing@amazonauthorsolutions.com">Billing@amazonauthorsolutions.com</option>
                    <option value="Billing@fyrapublishing.com">Billing@fyrapublishing.com</option>
                    <option value="Billing@fyrasquare.com">Billing@fyrasquare.com</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Create Invoice</button>
        </form>
    </div>
</body>

</html>
