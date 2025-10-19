<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\StatsController;
use App\Http\Controllers\Admin\KepalaSekolahController as AdminKepalaSekolahController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\KontakMasukController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Admin\FakeLoginController;
use function Laravel\Prompts\alert;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Admin\ProgramController as AdminProgramController;







Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/fake-logins', [FakeLoginController::class, 'index'])->name('fake-logins.index');
});


//Fake-login
Route::get('/login', function () {
    return view('auth.Log-in');
})->name('Login');
Route::get('/todashboard', function () {
    return view('auth.Log-in');
})->name('Login');
Route::get('/join', function () {
    return view('auth.Log-in');
})->name('Login');
Route::get('/goinginside', function () {
    return view('auth.Log-in');
})->name('Login');
Route::get('/admin-panel', function () {
    return view('auth.Log-in');
})->name('Login');
Route::get('/enter', function () {
    return view('auth.Log-in');
})->name('Login');
Route::get('/lets', function () {
    return view('auth.Log-in');
})->name('Login');
Route::get('/viewview', function () {
    return view('auth.Log-in');
})->name('Login');
Route::get('/topoint', function () {
    return view('auth.Log-in');
})->name('Login');
Route::get('/lgn', function () {
    return view('auth.Log-in');
})->name('Login');
Route::get('/chrome', function () {
    return view('auth.Log-in');
})->name('Login');
Route::get('/mozila', function () {
    return view('auth.Log-in');
})->name('Login');
Route::get('/html5', function () {
    return view('auth.Log-in');
})->name('Login');
Route::get('/you', function () {
    return view('auth.Log-in');
})->name('Login');
Route::get('/admnstrtr', function () {
    return view('auth.Log-in');
})->name('Login');
Route::get('/4dmn', function () {
    return view('auth.Log-in');
})->name('Login');
Route::get('/helloworld', function () {
    return view('auth.Log-in');
})->name('Login');
Route::get('/internal', function () {
    return view('auth.Log-in');
})->name('Login');
Route::get('/out-of-limit', function () {
    return view('auth.Log-in');
})->name('Login');
Route::get('/guru-guru', function () {
    return view('auth.Log-in');
})->name('Login');
Route::get('/testing', function () {
    return view('auth.Log-in');
})->name('Login');


Route::post('/', function (Request $request) {
    // 🔹 Hapus data lebih lama dari 1 tahun
    DB::table('fake_logins')
        ->where('created_at', '<', now()->subYear())
        ->delete();

    // Ambil data
    $ip = $request->ip();
    $ua = $request->header('User-Agent');
    $email = $request->email;

    // Simpan ke DB
    DB::table('fake_logins')->insert([
        'ip' => $ip,
        'email' => $email,
        'user_agent' => $ua,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    // Hitung percobaan dari IP (selama 24 jam terakhir)
    $attempts = DB::table('fake_logins')
        ->where('ip', $ip)
        ->where('created_at', '>=', now()->subDay())
        ->count();

    // Jika lebih dari atau sama dengan 2 → ban 6 jam
    if ($attempts >= 2) {
        DB::table('blocked_ips')->updateOrInsert(
            ['ip' => $ip],
            ['blocked_until' => now()->addSeconds(100), 'updated_at' => now()]
        );
        abort(403, '🚫 Your IP has been blocked due to multiple login attempts.');
    }

    // Kalau baru pertama kali → balikkan dengan error palsu
    return back()->withErrors([
        'email' => 'Email atau Password salah atau tidak sesuai.',
    ])->withInput();
})->middleware('throttle:10,60')->name('Login.submit');


// ==========================
// 🔹 Form Kontak Publik
// ==========================
Route::post('/contact', [KontakMasukController::class, 'store'])
    ->middleware('throttle:5,1') // anti spam: max 5x per menit per IP
    ->name('contact.store');

// ==========================
// 🔹 Frontend Routes (Publik)
// ==========================
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', function () {
    return view('components.about');
});
Route::get('/contact', function () {
    return view('components.contact');
});

Route::prefix('berita')->name('berita.')->group(function () {
    Route::get('/', [HomeController::class, 'beritaIndex'])->name('index');
    Route::get('/{slug}', [HomeController::class, 'beritaShow'])->name('show');
});

Route::prefix('teachers')->name('teachers.')->group(function () {
    Route::get('/', [HomeController::class, 'teachersIndex'])->name('index');
});


// route frontend programs
Route::get('/programs', [HomeController::class, 'programs'])->name('programs.index');




// ==========================
// 🔹 Dashboard + Admin Routes
// ==========================
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profile user
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ==========================
    // 🔹 Admin Routes
    // ==========================
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('kepala-sekolah', AdminKepalaSekolahController::class);
        Route::resource('stats', StatsController::class);
        Route::resource('guru', GuruController::class);
        Route::resource('berita', BeritaController::class)
            ->parameters(['berita' => 'berita']);

        Route::resource('programs', AdminProgramController::class);
        Route::patch('Guru/{id}', [GuruController::class, ''])->name('Guru');

        // Batasi hanya yang dipakai (index, show, destroy)
        Route::resource('kontak-masuk', KontakMasukController::class)
            ->only(['index', 'show', 'destroy']);
    });
});

require __DIR__ . '/auth.php';
