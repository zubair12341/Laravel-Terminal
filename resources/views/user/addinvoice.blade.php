@extends('user.layout.user')

@section('user')
    <div class="px-3">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="py-3 py-lg-4">
                <div class="row">
                    <div class="col-lg-6">
                        <h4 class="page-title mb-0">Add Invoice</h4>
                    </div>
                    <div class="col-lg-6">
                        <div class="d-none d-lg-block">
                            <ol class="breadcrumb m-0 float-end">
                                <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Add Invoice</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Add Invoice</h4>


                            <div class="row">
                                <div class="col-12">
                                    <div class="p-2">

                                        <form method="POST" id="main_form" action="{{ route('invoice.store') }}">
                                            @csrf
                                            <div class="row mb-2">
                                                <label class="col-md-2" for="customer">Customer:</label>
                                                <div class="col-md-10">
                                                    <select name="customer_id" class="js-states form-control"
                                                        id="single2">
                                                        <option value="" selected disabled>Select Customer</option>
                                                        @foreach ($customers as $customer)
                                                            <option value="{{ $customer->id }}">
                                                                {{ $customer->name . ' (' . $customer->email . ')' }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-2">

                                                <label class="col-md-2 col-form-label" for="amount">Amount:</label>
                                                <div class="col-md-10">
                                                    <div class="input-group">
                                                        <span class="input-group-prepend">
                                                            <span class="input-group-text">$</span>
                                                        </span>
                                                        <input type="number" class="form-control" id="amount"
                                                            name="amount" required>
                                                    </div>
                                                </div>
                                                @error('amount')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>

                                            <div class="row mb-2">
                                                <label class="col-md-2" for="description">Description:</label>
                                                <div class="col-md-10">
                                                    <textarea class="form-control" id="description" name="description" required></textarea>
                                                </div>
                                                @error('description')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>

                                            <div class="row mb-2 mt-3">
                                                <label class="col-md-2">Brand:</label>
                                                <div class="col-md-10">
                                                    <div class="radio-group d-flex justify-content-between">
                                                        <div>
                                                            <input type="radio" id="brand1" name="brand"
                                                                value="American Logo Artist">
                                                            <img height="100px" src="{{ asset('/dashtrap/american.png') }}"
                                                                alt="">
                                                            <div>
                                                                <label for="brand1">American Logo Artist</label>
                                                            </div>
                                                        </div>
                                                        <div>

                                                            <input type="radio" id="brand2" name="brand"
                                                                value="Logo Wall Street">
                                                            <img height="100px" src="{{ asset('/dashtrap/LWS.png') }}"
                                                                alt="">
                                                            <div>
                                                                <label for="brand2">Logo Wall Street</label>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <input type="radio" id="brand3" name="brand"
                                                                value="Creative Web Master">
                                                            <img height="100px" src="{{ asset('/dashtrap/TCWM.png') }}"
                                                                alt="">
                                                            <div>
                                                                <label for="brand3">Creative Web Master</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @error('brand')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>

                                            <div class=" d-flex justify-content-around mt-5 mb-5">

                                                <div class="">

                                                    <div class="">
                                                        <input type="checkbox" class="form-check-input onclick"
                                                            id="invoice1" name="invoice_type[]" value="Short Course">
                                                        <label class="form-check-label" for="invoice1">Short Course</label>
                                                    </div>
                                                    <div class="">
                                                        <input type="checkbox" class="form-check-input onclick"
                                                            id="invoice2" name="invoice_type[]" value="Complete Course">
                                                        <label class="form-check-label" for="invoice2">Complete
                                                            Course</label>
                                                    </div>
                                                    <div class="">
                                                        <input type="checkbox" class="form-check-input onclick"
                                                            id="invoice3" name="invoice_type[]"
                                                            value="Short Term Project">
                                                        <label class="form-check-label" for="invoice3">Short Term
                                                            Project</label>
                                                    </div>
                                                    <div class="">
                                                        <input type="checkbox" class="form-check-input onclick"
                                                            id="invoice4" name="invoice_type[]"
                                                            value="Long Term Project">
                                                        <label class="form-check-label" for="invoice4">Long Term
                                                            Project</label>
                                                    </div>
                                                    <div class="">
                                                        <input type="checkbox" class="form-check-input onclick"
                                                            id="invoice5" name="invoice_type[]" value="Publishing">
                                                        <label class="form-check-label" for="invoice5">Publishing</label>
                                                    </div>
                                                    <div class="">
                                                        <input type="checkbox" class="form-check-input onclick"
                                                            id="invoice6" name="invoice_type[]"
                                                            value="Editing & proofreading">
                                                        <label class="form-check-label" for="invoice6">Editing &
                                                            proofreading</label>
                                                    </div>
                                                    <div class="">
                                                        <input type="checkbox" class="form-check-input onclick"
                                                            id="invoice24" name="invoice_type[]"
                                                            value="SEO Questionnaire">
                                                        <label class="form-check-label" for="invoice24">SEO
                                                            Questionnaire</label>
                                                    </div>
                                                    <div class="">
                                                        <input type="checkbox" class="form-check-input onclick"
                                                            id="invoice25" name="invoice_type[]"
                                                            value="Academic Writing Questionnaire">
                                                        <label class="form-check-label" for="invoice25">Academic Writing
                                                            Questionnaire</label>
                                                    </div>
                                                    <div class="">
                                                        <input type="checkbox" class="form-check-input onclick"
                                                            id="invoice26" name="invoice_type[]" value="Book Marketing">
                                                        <label class="form-check-label" for="invoice26"> Book
                                                            Marketing</label>
                                                    </div>
                                                    <div class="">
                                                        <input type="checkbox" class="form-check-input onclick"
                                                            id="invoice27" name="invoice_type[]" value="Book Printing">
                                                        <label class="form-check-label" for="invoice27"> Book
                                                            Printing</label>
                                                    </div>
                                                    <div class="">
                                                        <input type="checkbox" class="form-check-input onclick"
                                                            id="invoice28" name="invoice_type[]" value="Book Publishing">
                                                        <label class="form-check-label" for="invoice28"> Book
                                                            Publishing</label>
                                                    </div>
                                                    <div class="">
                                                        <input type="checkbox" class="form-check-input onclick"
                                                            id="invoice29" name="invoice_type[]" value="Book Writing">
                                                        <label class="form-check-label" for="invoice29"> Book
                                                            Writing</label>
                                                    </div>
                                                    <div class="">
                                                        <input type="checkbox" class="form-check-input onclick"
                                                            id="invoice21" name="invoice_type[]"
                                                            value="Video Production">
                                                        <label class="form-check-label" for="invoice21">Video
                                                            Production</label>
                                                    </div>
                                                    <div class="">
                                                        <input type="checkbox" class="form-check-input onclick"
                                                            id="invoice7" name="invoice_type[]" value="Writing">
                                                        <label class="form-check-label" for="invoice7">Writing</label>
                                                    </div>
                                                    <div class="">
                                                        <input type="checkbox" class="form-check-input" id="invoice12"
                                                            name="invoice_type[]" value="Others">
                                                        <label class="form-check-label" for="invoice12">Others</label>
                                                    </div>
                                                </div>
                                                <div class="">

                                                    <div class="">
                                                        <input type="checkbox" class="form-check-input onclick"
                                                            id="invoice8" name="invoice_type[]" value="Book marketing">
                                                        <label class="form-check-label" for="invoice8">Book
                                                            marketing</label>
                                                    </div>
                                                    <div class="">
                                                        <input type="checkbox" class="form-check-input onclick"
                                                            id="invoice9" name="invoice_type[]" value="Illustrations">
                                                        <label class="form-check-label"
                                                            for="invoice9">Illustrations</label>
                                                    </div>
                                                    <div class="">
                                                        <input type="checkbox" class="form-check-input onclick"
                                                            id="invoice10" name="invoice_type[]" value="Audiobook">
                                                        <label class="form-check-label" for="invoice10">Audiobook</label>
                                                    </div>
                                                    <div class="">
                                                        <input type="checkbox" class="form-check-input onclick"
                                                            id="invoice11" name="invoice_type[]"
                                                            value="Website Development ">
                                                        <label class="form-check-label" for="invoice11">Website
                                                            Development
                                                        </label>
                                                    </div>

                                                    <div class="">
                                                        <input type="checkbox" class="form-check-input onclick"
                                                            id="invoice22" name="invoice_type[]"
                                                            value="Client Questionnaire">
                                                        <label class="form-check-label" for="invoice22">Client
                                                            Questionnaire</label>
                                                    </div>
                                                    <div class="">
                                                        <input type="checkbox" class="form-check-input onclick"
                                                            id="invoice23" name="invoice_type[]"
                                                            value="Email Marketing Questionnaire">
                                                        <label class="form-check-label" for="invoice23">Email Marketing
                                                            Questionnaire</label>
                                                    </div>
                                                    <div class="">
                                                        <input type="checkbox" class="form-check-input  onclick"
                                                            id="invoice13" name="invoice_type[]" value="Logo Design">
                                                        <label class="form-check-label" for="invoice13">Logo
                                                            Design</label>
                                                    </div>
                                                    <div class="">
                                                        <input type="checkbox" class="form-check-input onclick"
                                                            id="invoice14" name="invoice_type[]" value="Website Design">
                                                        <label class="form-check-label" for="invoice14">Website
                                                            Design</label>
                                                    </div>
                                                    <div class="">
                                                        <input type="checkbox" class="form-check-input onclick"
                                                            id="invoice15" name="invoice_type[]"
                                                            value="Stationery Design">
                                                        <label class="form-check-label" for="invoice15">Stationery
                                                            Design</label>
                                                    </div>

                                                    <div class="">
                                                        <input type="checkbox" class="form-check-input onclick"
                                                            id="invoice16" name="invoice_type[]" value="Brochure Design">
                                                        <label class="form-check-label" for="invoice16">Brochure
                                                            Design</label>
                                                    </div>
                                                    <div class="">
                                                        <input type="checkbox" class="form-check-input onclick"
                                                            id="invoice17" name="invoice_type[]" value="Project Status">
                                                        <label class="form-check-label" for="invoice17">Project
                                                            Status</label>
                                                    </div>

                                                    <div class="">
                                                        <input type="checkbox" class="form-check-input onclick"
                                                            id="invoice18" name="invoice_type[]" value="Content Writing">
                                                        <label class="form-check-label" for="invoice18">Content
                                                            Writing</label>
                                                    </div>

                                                    <div class="">
                                                        <input type="checkbox" class="form-check-input onclick"
                                                            id="invoice19" name="invoice_type[]"
                                                            value="Social Media Design">
                                                        <label class="form-check-label" for="invoice19">Social Media
                                                            Design</label>
                                                    </div>
                                                    <div class="">
                                                        <input type="checkbox" class="form-check-input onclick"
                                                            id="invoice20" name="invoice_type[]"
                                                            value="Copy Right Design">
                                                        <label class="form-check-label" for="invoice20">Copy Right
                                                            Design</label>
                                                    </div>


                                                </div>
                                            </div>
                                            <div id="otherField" style="display: none;">
                                                <input type="text " class="form-control mt-2" name="invoice_type_other"
                                                    id="otherFieldInput" placeholder="Enter other service">
                                            </div>
                                    </div>



                                    <div class="row mb-2 mt-3">
                                        <label class="col-md-2">Send invoice to customer:</label>
                                        <div class="col-md-2">
                                            <div class="radio-group d-flex justify-content-between">
                                                <div>
                                                    <input type="radio" id="yes" name="send" value="yes">
                                                    <label for="yes">Yes</label>
                                                </div>
                                                <div>

                                                    <input type="radio" id="no" name="send" value="no">
                                                    <label for="no">No</label>
                                                </div>

                                            </div>
                                        </div>
                                    </div>



                                    <div class="d-flex mt-4">
                                 
                                    @role('all_access')
                                        <div class="form-group pay_now_div ">
                                            <input type="hidden" name="stripe_custumer_id" class="stripe_customer">
                                            <button class="btn btn-success pay_btn" type="button">Pay Direct</button>



                                        </div>
                                        @endrole
                                        <div class="form-group">
                                            <button type="button" class="btn btn-primary mx-3 create_btn">Create
                                                Invoice</button>
                                        </div>
                                    </div>
                                    </form>

                                </div>
                            </div>

                        </div>
                        <!-- end row -->
                    </div>
                </div> <!-- end card -->
            </div><!-- end col -->
        </div>
        <!-- end row -->

    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>


        <script>
            $(document).ready(function() {
                $('.pay_btn').on('click', function() {

                    // $('.stripe_customer').val('');
                    $('#main_form').submit();
                });
                $('.create_btn').on('click', function() {

                    $('.stripe_customer').val('');
                    $('#main_form').submit();
                });
                $('.pay_now_div').hide();
                $('#single2').on('change', function() {
                    var customer_id = $(this).val();
                    if (customer_id) {
                        $.ajax({
                            url: '/get-customer-data',
                            type: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                customer_id: customer_id
                            },
                            success: function(response) {
                                if (response.status === 200) {
                                    $('.pay_now_div').show();
                                    const val = response.id;
                                    $('.stripe_customer').val(val);
                                } else {
                                    $('.pay_now_div').hide();
                                    $('.stripe_customer').val('');
                                    console.log('Unexpected status code: ' + response.status);
                                }
                            },
                            error: function(xhr) {
                                console.log(xhr.responseText);

                                $('.pay_now_div').hide();
                            }
                        });
                    } else {
                        $('.pay_now_div').hide();
                    }
                });
            });
        </script>


    <style>
         .select2-container--default .select2-selection--single {
            background-color: var(--bs-body-bg);
            ;
            color: var(--bs-body-color);
            border: 1px solid var(--bs-border-color);
            height: 37px;

        }
        

        span#select2-single2-container {
            color: var(--bs-topbar-item-color);
        }

        .onclick {
            margin-bottom: 15px
        }
    </style>



    <script>
        const otherFieldInput = document.getElementById('otherFieldInput');


        const othersRadio = document.getElementById('invoice12');
        const otherField = document.getElementById('otherField');

        othersRadio.addEventListener('change', function() {
            if (this.checked) {
                otherField.style.display = 'block';
                otherFieldInput.setAttribute('required', '');
            } else {
                otherField.style.display = 'none';
                otherFieldInput.removeAttribute('required');
            }
        });
    </script>
@endsection
