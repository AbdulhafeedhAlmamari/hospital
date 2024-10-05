@extends('layouts.main')

@section('content')
    <div class="container my-5">
        <h2 class="text-center mb-4">OVR Report Details</h2>

        <!-- Report Details Card -->
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class=" text-center mb-2">OVR Report: {{ $ovr->ovr_number }}</h4>
            </div>
            <div class="card-body">

                <!-- Event Details Section -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h5 class="text-primary"><i class="fas fa-calendar-alt"></i> Event Date</h5>
                        <p>{{ $ovr->event_date }}</p>
                    </div>
                    <div class="col-md-6">
                        <h5 class="text-primary"><i class="fas fa-clock"></i> Event Time</h5>
                        <p>{{ $ovr->event_time }}</p>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <h5 class="text-primary"><i class="fas fa-map-marker-alt"></i> Event Location</h5>
                        <p>{{ $ovr->event_location }}</p>
                    </div>
                    <div class="col-md-6">
                        <h5 class="text-primary"><i class="fas fa-building"></i> Reporting Department</h5>
                        <p>{{ $ovr->reporting_department }}</p>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <h5 class="text-primary"><i class="fas fa-user-tag"></i> Responding Department</h5>
                        <p>{{ $ovr->responding_department }}</p>
                    </div>
                </div>

                <!-- Patient Information Section (optional) -->
                @if ($ovr->patient_name)
                    <div class="border-top pt-3">
                        <h4 class="text-primary   mb-4"><i class="fas fa-user-injured"></i> Patient Information</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <h6><i class="fas fa-user"></i> Patient Name</h6>
                                <p>{{ $ovr->patient_name }}</p>
                            </div>
                            <div class="col-md-6">
                                <h6><i class="fas fa-file-medical"></i> Medical Record</h6>
                                <p>{{ $ovr->medical_record }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h6><i class="fas fa-calendar"></i> Date of Birth</h6>
                                <p>{{ $ovr->dob }}</p>
                            </div>
                            <div class="col-md-6">
                                <h6><i class="fas fa-venus-mars"></i> Gender</h6>
                                <p>{{ $ovr->gender }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Event Description Section -->
                <div class="border-top pt-3 mb-4">
                    <h6 class="  mb-2"><i class="fas fa-file-alt"></i> Event Description</h6>
                    <p>{{ $ovr->event_description }}</p>
                </div>

                <!-- Event Category Section -->
                <div class="row mb-4">
                    <div class="col-md-12">
                        <h6 class=" mb-2"><i class="fas fa-tags"></i> Event Category</h6>
                        <p>{{ $ovr->event_category }}</p>
                    </div>
                </div>

                <!-- Injury Information Section -->
                <div class="border-top pt-3">
                    <h4 class="text-primary  mb-4"><i class="fas fa-briefcase-medical"></i> Injury Information</h4>
                    <p><strong>Injury Occurred:</strong> {{ $ovr->injury_occurred ? 'Yes' : 'No' }}</p>
                    @if ($ovr->injury_occurred)
                        <p><strong>Type of Injury:</strong> {{ $ovr->injury_type }}</p>
                    @endif
                </div>

                <!-- Reporter Information Section -->
                <div class="border-top pt-3">
                    <h4 class="text-primary mb-4"><i class="fas fa-user-tie"></i> Reporter Information</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <h6><i class="fas fa-user"></i> Reporter Name</h6>
                            <p>{{ $ovr->reporter_name }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6><i class="fas fa-phone"></i> Mobile Number</h6>
                            <p>{{ $ovr->reporter_mobile }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h6><i class="fas fa-id-badge"></i> Position Title</h6>
                            <p>{{ $ovr->reporter_position }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6><i class="fas fa-envelope"></i> E-mail Address</h6>
                            <p>{{ $ovr->reporter_email }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Admin Response Section -->
            <div class="card-footer bg-light">
                <h4 class="text-secondary"><i class="fas fa-comments"></i> Admin Response</h4>
                @if ($ovr->admin_response)
                    <p>{{ $ovr->admin_response }}</p>
                @else
                    <p class="text-muted">No response from admin yet.</p>
                @endif
            </div>
        </div>

        <!-- Option to allow Admin to respond -->
        @if (Auth::user() && Auth::user()->isAdmin())
            <div class="mt-4">
                <h4>Submit Admin Response</h4>
                <form action="{{ route('ovr.respond', $ovr->ovr_number) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <textarea class="form-control" name="admin_response" rows="4" placeholder="Enter your response..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Response</button>
                </form>
            </div>
        @endif
    </div>
@endsection
