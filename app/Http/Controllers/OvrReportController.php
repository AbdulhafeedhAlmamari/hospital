<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OvrReport;

class OvrReportController extends Controller
{
    // عرض النموذج
    public function create()
    {
        return view('ovrs.create');
    }

    // تخزين التقرير
    public function store(Request $request)
    {
        $validated = $request->validate([
            'event_date' => 'required|date',
            'event_time' => 'required',
            'event_location' => 'required',
            'reporting_department' => 'required',
            'responding_department' => 'required',
            'event_description' => 'required',
            'reporter_name' => 'required',
            'reporter_mobile' => 'required',
            'reporter_position' => 'required',
            'reporter_email' => 'required|email',
        ]);

        // توليد رقم OVR فريد
        $ovrNumber = 'OVR-' . strtoupper(uniqid());

        // حفظ البيانات
        $ovr = OvrReport::create([
            'ovr_number' => $ovrNumber,
            'event_date' => $request->event_date,
            'event_time' => $request->event_time,
            'event_location' => $request->event_location,
            'reporting_department' => $request->reporting_department,
            'responding_department' => $request->responding_department,
            'patient_name' => $request->patient_name,
            'medical_record' => $request->medical_record,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'patient_type' => $request->patient_type,
            'event_description' => $request->event_description,
            'reporter_name' => $request->reporter_name,
            'reporter_mobile' => $request->reporter_mobile,
            'reporter_position' => $request->reporter_position,
            'reporter_email' => $request->reporter_email,
            'event_category' => $request->event_category,
            'injury_occurred' => $request->injury_occurred,
            'injury_type' => $request->injury_type,
        ]);

        // إرسال إشعار إلى الموظف المسؤول (يمكنك استخدام Notification أو Email هنا)

        // إعادة توجيه المرسل إلى صفحة تحتوي على الرقم المرجعي
        return redirect()->route('ovrs.show', $ovr->ovr_number)
            ->with('success', 'Report submitted successfully. Your OVR Number is: ' . $ovrNumber);
    }

    // عرض التفاصيل بناءً على الرقم المرجعي
    public function show($ovr_number)
    {
        $ovr = OvrReport::where('ovr_number', $ovr_number)->firstOrFail();

        return view('ovrs.show', compact('ovr'));
    }

    // إدارة رد الإدارة
    public function respond($ovr_number, Request $request)
    {
        $ovr = OvrReport::where('ovr_number', $ovr_number)->firstOrFail();
        $ovr->update([
            'admin_response' => $request->admin_response,
            'status' => 'responded'
        ]);

        // إعادة توجيه إلى صفحة التقرير مع تأكيد الرد
        return redirect()->route('ovrs.show', $ovr_number)
            ->with('success', 'Response submitted successfully.');
    }


    public function search(Request $request)
    {
        if ($request->search) {
            $input = $request->search;
            $data = OvrReport::where('ovr_number', 'LIKE', "%$input%")->get();

            $output = '';
            foreach ($data as $row) {
                $output .= '<li class="list-group-item list-group-item-action">' . htmlspecialchars($row->ovr_number) . '</li>';
            }

            return $output;
        }
    }
    public function submitSearch(Request $request)
    {
        $ovr = OvrReport::where('ovr_number', $request->search)->firstOrFail();

        return view('ovrs.show', compact('ovr'));
    }
}
