<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\CheckController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

// Public Routes
Route::middleware('guest')->group(function () {
    // Home
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Authentication
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.attempt');

    // Registration
    Route::get('/signup', [SignupController::class, 'showRegistrationForm'])->name('signup');
    Route::post('/signup', [SignupController::class, 'store'])->name('signup.store');

    Auth::routes(['verify' => true]);

    Route::get('/downloads', function () {
        return view('layouts.landing.index', ['page' => 'downloads']);
    })->name('downloads');

    Route::get('/search', function (Request $request) {
        $query = $request->query('q');

        // Example fake results
        $results = [
            [
                'title' => 'SmartFarm: An IoT-based System for Agriculture',
                'author' => 'Jayson L. Santos, Angelica R. Perez',
                'abstract' => 'This study presents SmartFarm, an IoT-based platform to enhance agriculture operations and yield monitoring. It discusses hardware integration, sensor deployment, and web-based visualization.',
                'adviser' => 'Hermos, L.M.',
                'program' => 'BSIT',
                'sy' => '2021',
            ],
            [
                'title' => 'EcoTrack: A Sustainable Waste Management Application',
                'author' => 'Maria S. Villanueva, Kevin D. Cruz',
                'abstract' => 'The EcoTrack application is designed to improve sustainable waste management practices in urban communities. This research details the system architecture, user interface design, and integration with municipal waste services. EcoTrack allows users to track their daily waste generation, categorize waste types, and receive educational tips for sustainable living. Data collected from users feeds into a larger analytics platform for city planners to identify waste trends and optimize collection routes. The study includes a usability assessment conducted with over 100 participants, indicating a high level of user satisfaction and an increase in waste-sorting compliance. The results underscore EcoTrack’s potential as a valuable tool for promoting environmental responsibility and policy development in urban areas.',
                'adviser' => 'Reyes, P.A.',
                'program' => 'BSIT',
                'sy' => '2022',
            ],
            [
                'title' => 'MediConnect: A Cloud-Based Health Records System',
                'author' => 'Lorena C. Jimenez, Patrick V. Ramos',
                'abstract' => 'MediConnect is a cloud-based system aimed at transforming traditional patient health record management into a digital, centralized platform. The system provides secure, real-time access to patient histories for both healthcare professionals and patients, facilitating better medical decision-making. This research describes the design considerations regarding data security, HIPAA compliance, and user accessibility across multiple devices. The study involved the development of an intuitive dashboard that simplifies complex medical data visualization for non-technical users. Results from pilot testing in two local hospitals revealed significant improvements in efficiency, reduced paperwork, and increased patient satisfaction due to faster information retrieval. MediConnect demonstrates how digital technologies can significantly enhance healthcare service delivery.',
                'adviser' => 'Santos, B.L.',
                'program' => 'BSCS',
                'sy' => '2023',
            ],
            [
                'title' => 'AgriBot: Autonomous Drone for Crop Health Monitoring',
                'author' => 'Jeremiah P. Lao, Janine R. Flores',
                'abstract' => 'This study introduces AgriBot, an autonomous drone equipped with multispectral imaging to monitor crop health in agricultural fields. The system captures high-resolution imagery to identify signs of plant stress, nutrient deficiencies, and pest infestations. AgriBot integrates machine learning algorithms to analyze collected data and generate actionable insights for farmers, enabling precise intervention and resource optimization. The research documents the development of the drone hardware, software architecture, and the field trials conducted over multiple growing seasons. Results demonstrate an average 30% improvement in early detection of crop issues compared to manual inspection, translating to increased yields and reduced operational costs. The study concludes that AgriBot offers a scalable, innovative solution for modern agriculture, addressing critical challenges of sustainability and food security in the face of climate change.',
                'adviser' => 'Alvarez, M.G.',
                'program' => 'BSECE',
                'sy' => '2023',
            ],
            [
                'title' => 'EduVision: AI-Powered Student Engagement Platform',
                'author' => 'Danica L. Bautista, Carlo M. Fernandez',
                'abstract' =>
                    'EduVision is an AI-driven platform designed to enhance student engagement in virtual learning environments. The system utilizes facial emotion recognition, attention tracking, and interactive feedback tools to help educators monitor and improve classroom dynamics remotely. This research delves into the ethical considerations of privacy and data protection, while highlighting how machine learning models were trained on diverse datasets to reduce bias. Usability testing was conducted with over 500 students across various educational institutions, revealing significant improvements in participation rates and academic performance. The platform’s analytics dashboard enables teachers to tailor lesson strategies based on real-time insights into student behavior and comprehension levels. EduVision positions itself as a transformative tool that bridges the gap between traditional and digital education by offering personalized learning experiences and fostering inclusivity in remote teaching scenarios.',
                'adviser' => 'Lorenzo, H.P.',
                'program' => 'BSCS',
                'sy' => '2024',
            ],
            [
                'title' => 'FinSecure: Blockchain-Based Digital Wallet System',
                'author' => 'Elijah B. Cruz, Hannah T. Robles',
                'abstract' =>
                    'FinSecure proposes a blockchain-based digital wallet system aimed at revolutionizing financial transactions by ensuring enhanced security, transparency, and user control over personal financial data. This study elaborates on the wallet’s core architecture, consensus algorithms employed, and smart contract integration for facilitating secure payments. Extensive simulations and test deployments were conducted to evaluate system performance under different network loads, demonstrating significant improvements in transaction speed and reduced vulnerability to fraud. Additionally, FinSecure’s user interface was developed with a focus on usability for both tech-savvy and novice users, offering intuitive navigation and robust support features. The findings highlight blockchain’s transformative potential in shaping future financial ecosystems, fostering trust, and increasing financial inclusivity, particularly in regions with limited access to traditional banking services. The research concludes with recommendations for further scalability and regulatory compliance considerations.',
                'adviser' => 'Garcia, L.N.',
                'program' => 'BSIT',
                'sy' => '2024',
            ],
        ];

        return view('layouts.landing.index', [
            'page' => 'search',
            'query' => $query,
            'results' => $results,
        ]);
    })->name('search');
});

// Authenticated Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

// Email Verification Routes
Route::middleware('auth')->group(function () {
    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect()->route('home'); // Use named route
    })
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('/email/resend', [VerificationController::class, 'resend'])->name('verification.resend');
});

// Verification Code Route (can be accessed without auth)
Route::post('/verify-email-code', [VerificationController::class, 'verifyCode'])->name('verify.code');

// Check routes (if they need to be public)
Route::get('/check', [CheckController::class, 'index'])->name('check');
Route::get('/button', [CheckController::class, 'button'])->name('check.button');
Route::get('/user', [CheckController::class, 'user'])->name('check.user');

// Email Verification
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})
    ->middleware('auth')
    ->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})
    ->middleware(['auth', 'signed'])
    ->name('verification.verify');

Route::post('/email/resend', [VerificationController::class, 'resend'])->name('verification.resend');
Route::post('/verify-email-code', [VerificationController::class, 'verifyCode'])->name('verify.code');
