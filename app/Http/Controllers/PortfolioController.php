<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{

    private function profile(): array
    {
        return [
            'name'     => 'Raudina Hibati Sani',
            'title'    => 'Fresh Graduate in Information Systems',
            'tagline'  => 'Building clean web applications while understanding the business side of things.',
            'email'    => 'rarahibati@gmail.com',
            'phone'    => '+62 853 3433 0164',
            'location' => 'Surabaya, Indonesia',
            'about'    => 'A fresh graduate in Information Systems with hands-on experience building full-stack applications through college projects from determining system architecture and designing databases, to developing applications with Laravel, HTML, and CSS. Beyond technical skills, I also understand business processes which helps me see how technology drives business growth and decision-making.',
            'socials'  => [
                'linkedin' => 'https://linkedin.com/in/raudina',
            ],
            'resume'   => 'cv.pdf',
        ];
    }

    private function education(): array
    {
        return [
            [
                'institution' => 'Universitas Airlangga',
                'degree'      => 'S1 Sistem Informasi',
                'note'        => 'IPK 3.58 / 4.00',
                'period'      => 'Agu 2022 – Jan 2026',
            ],
        ];
    }

    private function experiences(): array
    {
        return [
            [
                'company' => 'Sibiti',
                'role'    => 'Fullstack Developer Intern',
                'period'  => 'Jan 2025 – Jul 2025',
                'points'  => [
                    'Menjaga dan mengoptimalkan performa aplikasi web, termasuk debugging dan troubleshooting.',
                    'Memperbarui dan mengembangkan fitur sesuai kebutuhan bisnis.',
                    'Mengelola dan meningkatkan efisiensi backend serta performa database.',
                    'Berkolaborasi dengan tim untuk menjaga stabilitas dan keamanan sistem.',
                ],
            ],
            [
                'company' => 'PT Telkom Indonesia Tbk',
                'role'    => 'Sales & Marketing Intern — RLEGS',
                'period'  => 'Feb 2025 – Jun 2025',
                'points'  => [
                    'Melakukan analisis dan identifikasi pelanggan menggunakan tools IVCA untuk mempertajam segmentasi dan targeting pasar.',
                    'Berkolaborasi lintas tim untuk mengoptimalkan engagement dan kepuasan pelanggan.',
                    'Memberikan insight dan rekomendasi berbasis data untuk meningkatkan penawaran layanan dan revenue.',
                ],
            ],
        ];
    }

    // private function softSkills(): array
    // {
    //     return ['Time Management', 'Problem Solving', 'Attention to Detail', 'Analytical Thinking'];
    // }

    private function hardSkills(): array
    {
        return [
            ['name' => 'Laravel',        'level' => 75],
            ['name' => 'PHP',            'level' => 75],
            ['name' => 'MySQL',          'level' => 70],
            ['name' => 'JavaScript',     'level' => 70],
            ['name' => 'CSS & Bootstrap','level' => 70],
            // ['name' => 'Java & Dart',    'level' => 80],
            ['name' => 'Tableau',        'level' => 75],
        ];
    }

    /**
     * Data sertifikat & pencapaian.
     */
    private function certificates(): array
    {
        return [
            [
                'title'  => 'Microcredential: Digital Business, Innovation, and Entrepreneurship',
                'issuer' => 'Training Program',
                'period' => '2024 – 2025',
                'file'   => 'micro.pdf',
            ],
            [
                'title'  => 'Codeless Data Science Participant',
                'issuer' => 'PT NF Cipta Inovasi',
                'period' => '2025',
                'file'   => 'nf.pdf',
            ],
        ];
    }
        
    private function achievements(): array
    {
        return [
            [
                'title'  => '1st Place — National Poster Design Competition',
                'issuer' => 'Media Selaras Festival',
                'period' => '2022',
                'file'   => 'juara 1.png',
            ],
            [
                'title'  => '3rd Place — Infographic Competition',
                'issuer' => 'UIN Tulungagung',
                'period' => '2022',
                'file'   => 'juara 3.pdf',
            ],
        ];
    }


    private function projects(): array
    {
        return [
            [
                'title'       => 'MedGuide (Medicine Guide)',
                'period'      => '2023 – 2024',
                'description' => 'A web development project to help users find drug information. The frontend was developed using HTML, CSS, and JavaScript, and the backend was developed using the Laravel framework.',
                'tech'        => ['Laravel', 'HTML', 'CSS', 'JavaScript'],
                'image'       => 'medguide.png',
            ],
            [
                'title'       => 'Venol 15th ASPC 2025',
                'period'      => '2025',
                'description' => 'Landing page for the Venol 15th ASPC 2025 event, displaying information on the timeline, region, prizes, and event requirements interactively.',
                'tech'        => ['Laravel', 'HTML', 'CSS', 'JavaScript'],
                'image'       => 'venol.png',
            ],
            [
                'title'       => 'Workflow Sentiment Analysis (KNIME)',
                'period'      => '2025',
                'description' => 'Building a no-code/low-code sentiment analysis workflow using KNIME: reading the IMDB dataset, text preprocessing, dictionary tagging based on positive/negative words from MPQA, BoW-TF feature extraction, to calculating sentiment scores and accuracy.',
                'tech'        => ['KNIME', 'Data Analytics', 'EDA'],
                'image'       => 'knime.png',
            ],
            [
                'title'       => 'World University Rankings Analysis (Tableau)',
                'period'      => '2023',
                'description' => 'Analyzing world university rankings released by The Times Higher Education World University Rankings (THE) 2023. The ranking data was processed and presented through interactive visualizations using Tableau — covering top 100 university distribution, international student numbers, teaching score comparisons, and multi-indicator performance comparisons — to make the information easier to understand.',
                'tech'        => ['Tableau', 'Data Visualization', 'Data Analytics'],
                'image'       => 'tableau.png',
            ],
            // [
            //     'title'       => 'Netflix Content Dashboard',
            //     'period'      => '2024',
            //     'description' => 'An interactive dashboard summarizing Netflix content data. The home page displays key metrics such as total number of titles, number of countries with available content, and a trend line chart of the number of titles released each year, complete with breakdowns by world region and genre/type.',
            //     'tech'        => ['Data Visualization', 'Dashboard'],
            //     'image'       => 'netflix.png',
            // ],
        ];
    }

    public function index()
    {
        return view('portfolio.index', [
            'profile'      => $this->profile(),
            'education'    => $this->education(),
            'experiences'  => $this->experiences(),
            // 'softSkills'   => $this->softSkills(),
            'hardSkills'   => $this->hardSkills(),
            'certificates' => $this->certificates(),
            'achievements' => $this->achievements(),
            'projects'     => $this->projects(),
        ]);
    }

    public function sendMessage(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'message' => 'required|string|max:2000',
        ]);

        return redirect()
            ->route('portfolio.index')
            ->with('success', 'Your message has been sent successfully, thank you.' . $validated['name'] . '!');
    }
}