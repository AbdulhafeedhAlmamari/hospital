@extends('layouts.main')

@section('cssStyle')
    <style>

    </style>
@endsection
@section('content')
    <div class="container my-5">
        <h2 class="text-center">Create Occurrence Variance Report (OVR)</h2>
        <form action="{{ route('ovr.store') }}" method="POST">
            @csrf

            <!-- Event Details -->
            <div class="form-group">
                <label for="event_date">Event Date</label>
                <input type="date" name="event_date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="event_time">Event Time</label>
                <input type="time" name="event_time" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="event_location">Event Location</label>
                <input type="text" name="event_location" class="form-control" placeholder="Enter event location"
                    required>
            </div>

            <div class="form-group">
                <label for="reporting_department">Reporting Department/Section</label>
                <input type="text" name="reporting_department" class="form-control"
                    placeholder="Enter reporting department" required>
            </div>

            <div class="form-group">
                <label for="responding_department">Responding Department/Section</label>
                <input type="text" name="responding_department" class="form-control"
                    placeholder="Enter responding department" required>
            </div>

            <!-- Patient Information -->
            <h4>Patient Information (Complete only if Incident)</h4>
            <div class="form-group">
                <label for="patient_name">Patient's Name</label>
                <input type="text" name="patient_name" class="form-control" placeholder="Enter patient's name">
            </div>

            <div class="form-group">
                <label for="medical_record">Medical Record</label>
                <input type="text" name="medical_record" class="form-control" placeholder="Enter medical record number">
            </div>

            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" name="dob" class="form-control">
            </div>

            <div class="form-group">
                <label>Gender</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="M">
                    <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="F">
                    <label class="form-check-label" for="female">Female</label>
                </div>
            </div>

            <div class="form-group">
                <label>Patient Type</label><br>
                <select class="form-control" name="patient_type">
                    <option value="inpatient">Inpatient</option>
                    <option value="outpatient">Outpatient</option>
                    <option value="employee">Employee</option>
                    <option value="visitor">Visitor</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <!-- Event Description -->
            <div class="form-group">
                <label for="event_description">Factual Description of the Event</label>
                <textarea class="form-control" name="event_description" rows="4" placeholder="Describe the event" required></textarea>
            </div>

            <!-- Reporter Information -->
            <h4>Reporter Information</h4>
            <div class="form-group">
                <label for="reporter_name">Reporter’s Name</label>
                <input type="text" name="reporter_name" class="form-control" placeholder="Enter your name" required>
            </div>

            <div class="form-group">
                <label for="reporter_mobile">Mobile Number</label>
                <input type="tel" name="reporter_mobile" class="form-control" placeholder="Enter your mobile number"
                    required>
            </div>

            <div class="form-group">
                <label for="reporter_position">Reporter’s Position Title</label>
                <input type="text" name="reporter_position" class="form-control" placeholder="Enter your position title"
                    required>
            </div>

            <div class="form-group">
                <label for="reporter_email">E-mail Address</label>
                <input type="email" name="reporter_email" class="form-control" placeholder="Enter your email"
                    required>
            </div>

            <!-- Event Category -->
            <h4>Event Category</h4>
            <div class="form-group">
                <label>Select Event Category</label>
                <select class="form-control" name="event_category" required>
                    <option value="1">Infection Control Related Issues</option>
                    <option value="2">Occupational Health</option>
                    <option value="3">Housekeeping</option>
                    <option value="4">Intravenous</option>
                    <option value="5">Pressure Ulcer (Injury)</option>
                    <option value="6">Skin Lesion Integrity</option>
                    <option value="7">Medication</option>
                    <option value="8">Communication Issues</option>
                    <option value="9">Falls</option>
                    <!-- Add other event categories as needed -->
                </select>
            </div>

            <!-- Injury Information -->
            <h4>Injury Information</h4>
            <div class="form-group">
                <label>Did Injury Occur?</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="injury_occurred" id="yes"
                        value="1">
                    <label class="form-check-label" for="yes">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="injury_occurred" id="no" value="0"
                        checked>
                    <label class="form-check-label" for="no">No</label>
                </div>
            </div>

            <div class="form-group">
                <label>Type of Injury</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="injury_type" id="physical" value="physical">
                    <label class="form-check-label" for="physical">Physical</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="injury_type" id="psychological"
                        value="psychological">
                    <label class="form-check-label" for="psychological">Psychological</label>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary btn-block">Submit Report</button>
        </form>
    </div>
@endsection

@section('script')
@endsection
