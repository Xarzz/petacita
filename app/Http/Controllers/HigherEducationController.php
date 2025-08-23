<?php

namespace App\Http\Controllers;

use App\Models\University;
use App\Models\Training;
use App\Models\Dinas;
use Illuminate\Http\Request;

class HigherEducationController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Base query
        $universitiesQuery = University::query();
        $trainingsQuery = Training::query();
        $dinasQuery = Dinas::query();

        // Kalau ada keyword search
        if ($search) {
            $universitiesQuery->where('name', 'like', "%{$search}%")
                            ->orWhere('location', 'like', "%{$search}%");

            $trainingsQuery->where('name', 'like', "%{$search}%")
                        ->orWhere('location', 'like', "%{$search}%");

            $dinasQuery->where('name', 'like', "%{$search}%")
                    ->orWhere('location', 'like', "%{$search}%");
        }

        // Ambil data top 5 (atau semua kalau pakai paginate)
        $topUniversities = $universitiesQuery->orderBy('rating', 'desc')->take(5)->get();
        $topTrainings    = $trainingsQuery->orderBy('rating', 'desc')->take(5)->get();
        $topDinas        = $dinasQuery->orderBy('rating', 'desc')->take(5)->get();

        return view('higher-education.index', [
            'universities' => $topUniversities,
            'trainings'    => $topTrainings,
            'dinas'        => $topDinas,
            'search'       => $search, // biar bisa ditampilin di form search
        ]);
    }
    

        public function universities(Request $request)
        {
            $query = University::orderBy('rating', 'desc');

                        // Search (by name / location)
            if ($request->filled('search')) {
                $search = $request->search;
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%$search%")
                    ->orWhere('location', 'like', "%$search%");
                });
            }
            

                 // Filter by rating (range 0.2 seperti di universitas)
            if ($request->filled('rating')) {
                $rating = (float) $request->rating;
                $upperLimit = $rating + 0.2;
                $query->whereBetween('rating', [$rating, $upperLimit]);
            }

             // Filter by location
            if ($request->filled('location')) {
                $query->where('location', 'like', "%{$request->location}%");
            }

    
            // Filter jurusan
            if ($request->filled('filter')) {
                $query->where('major', $request->filter);
            }

         // Filter tipe kampus dengan auto alias
        if ($request->filled('campus_type')) {
            $campusType = strtolower($request->campus_type);

            // alias tipe kampus
            $aliases = [
                'universitas' => ['universitas', 'university', 'univ', 'uni', 'unive', 'univer'],
                'institut'    => ['institut', 'institute', 'inst'],
                'politeknik'  => ['politeknik', 'polytechnic', 'poltek'],
            ];

            if (isset($aliases[$campusType])) {
                $query->where(function ($q) use ($aliases, $campusType) {
                    foreach ($aliases[$campusType] as $alias) {
                        $q->orWhere('name', 'LIKE', '%' . $alias . '%');
                    }
                });
            }
        }
           
            $universities = $query->get();
            $universities = $query->paginate(9)->withQueryString();

            $locations = University::select('location')->distinct()->pluck('location');
            return view('higher-education.universities', compact('universities', 'locations'));
        }


            // full list trainings
        public function trainings(Request $request)
        {
            $query = Training::query();

            // Filter by name/keyword
            if ($request->filled('search')) {
                $search = $request->search;
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('skills', 'like', "%{$search}%");
            }

            // Filter by location
            if ($request->filled('location')) {
                $query->where('location', 'like', "%{$request->location}%");
            }

            // Filter by rating (range 0.2 seperti di universitas)
            if ($request->filled('rating')) {
                $rating = (float) $request->rating;
                $upperLimit = $rating + 0.2;
                $query->whereBetween('rating', [$rating, $upperLimit]);
            }

            // Filter by duration (misal user isi bulan)
            if ($request->filled('duration')) {
                $query->where('duration', '<=', $request->duration);
            }

            // Filter by fee (kalau fee numeric, tapi kalau string kayak "Rp" / "€" / "Free", harus dibersihin dulu)
            if ($request->filled('fee')) {
                $query->where('fee', 'like', "%{$request->fee}%");
            }

            // Filter by skills (misal user cari "Python" atau "Marketing")
            if ($request->filled('skill')) {
                $query->where('skills', 'like', "%{$request->skill}%");
            }

            // Default order
            $trainings = $query->orderBy('rating', 'desc')->paginate(9);

            return view('higher-education.trainings', compact('trainings'));
        }


    // full list dinas
        public function dinas(Request $request)
        {
            $query = Dinas::query();

            // Filter by name/keyword
            if ($request->filled('search')) {
                $search = $request->search;
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('skills', 'like', "%{$search}%");
            }

            if ($request->filled('location')) {
                $query->where('location', 'like', "%{$request->location}%");
            }

            if ($request->filled('rating')) {
                $rating = (float) $request->rating;
                $upperLimit = $rating + 0.2;
                $query->whereBetween('rating', [$rating, $upperLimit]);
            }


                // Filter tipe kampus dengan auto alias
            if ($request->filled('dinas_type')) {
                $dinasType = strtolower($request->dinas_type);

                // alias tipe kampus
                $aliases = [
                    'akademi' => ['akademi', 'academy', 'aka'],
                    'institut'    => ['institut', 'institute', 'inst'],
                    'politeknik'  => ['politeknik', 'polytechnic', 'poltek'],
                ];

                if (isset($aliases[$dinasType])) {
                    $query->where(function ($q) use ($aliases, $dinasType) {
                        foreach ($aliases[$dinasType] as $alias) {
                            $q->orWhere('name', 'LIKE', '%' . $alias . '%');
                        }
                    });
                }
            }


            $dinas = $query->orderBy('rating', 'desc')->paginate(9)->withQueryString();
            $locations = Dinas::select('location')->distinct()->pluck('location');

            return view('higher-education.dinas', compact('dinas', 'locations'));
        }

}
