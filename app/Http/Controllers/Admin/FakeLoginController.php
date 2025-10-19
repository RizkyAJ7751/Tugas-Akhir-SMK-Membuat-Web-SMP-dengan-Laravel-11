<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class FakeLoginController extends Controller
{
    public function index()
    {
        $logins = DB::table('fake_logins')
            ->orderBy('created_at', 'desc')
            ->paginate(20); // biar ada pagination

        return view('admin.fake-logins.index', compact('logins'));
    }
}
