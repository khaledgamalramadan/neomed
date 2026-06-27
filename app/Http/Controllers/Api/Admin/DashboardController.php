<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\VisitorStat;
use App\Models\Contact;
use App\Models\TeamMember;
use App\Models\Faq;

class DashboardController extends Controller
{
    public function index()
    {
        
        return response()->json([
            'total_visitors' => VisitorStat::sum('count'),
            'today_visitors' => VisitorStat::where('visit_date', now()->format('Y-m-d'))->first()?->count ?? 0,
            'total_contacts' => Contact::count(),
            'total_team_members' => TeamMember::count(),
            'total_faqs' => Faq::count(),
        ]);
    }
}