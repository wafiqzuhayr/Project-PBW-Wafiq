<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Navigation</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #0f172a;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        /* Animated Background */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4, #45b7d1, #f7dc6f);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
            opacity: 0.1;
            z-index: 0;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Navbar Styling */
        nav {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }

        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.2rem 3rem;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: bold;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .logo::before {
            content: '⚡';
            -webkit-text-fill-color: #667eea;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 1rem;
        }

        .nav-link {
            text-decoration: none;
            color: #cbd5e1;
            font-weight: 600;
            padding: 0.8rem 1.5rem;
            border-radius: 12px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
            transition: left 0.5s;
        }

        .nav-link:hover::before {
            left: 100%;
        }

        .nav-link:hover {
            background: rgba(102, 126, 234, 0.2);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
        }

        .nav-link.active {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            box-shadow: 0 4px 20px rgba(102, 126, 234, 0.6);
        }

        /* Content Area */
        .content {
            max-width: 1400px;
            margin: 3rem auto;
            padding: 0 3rem;
            position: relative;
            z-index: 1;
        }

        .page {
            display: none;
            background: rgba(30, 41, 59, 0.8);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            padding: 3rem;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.1);
            animation: fadeIn 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .page.active {
            display: block;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        h1 {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 2rem;
            font-size: 3rem;
            font-weight: 800;
        }

        h2 {
            color: #e2e8f0;
            margin-top: 2rem;
            margin-bottom: 1rem;
            font-size: 1.8rem;
        }

        p {
            line-height: 1.9;
            color: #cbd5e1;
            margin-bottom: 1.2rem;
            font-size: 1.05rem;
        }

        /* Home Page Highlights */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .feature-card {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
            padding: 2rem;
            border-radius: 16px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(102, 126, 234, 0.3);
            border-color: rgba(102, 126, 234, 0.5);
        }

        .feature-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .feature-title {
            color: #e2e8f0;
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .feature-desc {
            color: #94a3b8;
            font-size: 0.95rem;
        }

        /* News Cards */
        .news-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .news-card {
            background: linear-gradient(135deg, rgba(255, 107, 107, 0.1) 0%, rgba(78, 205, 196, 0.1) 100%);
            padding: 2rem;
            border-radius: 16px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .news-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #ff6b6b, #4ecdc4);
        }

        .news-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 20px 50px rgba(78, 205, 196, 0.3);
            border-color: rgba(78, 205, 196, 0.5);
        }

        .news-date {
            color: #4ecdc4;
            font-size: 0.9rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .news-title {
            font-size: 1.5rem;
            margin: 1rem 0;
            color: #e2e8f0;
            font-weight: 700;
        }

        .news-text {
            color: #94a3b8;
            line-height: 1.7;
        }

        /* Profile Card */
        .profile-card {
            display: flex;
            gap: 3rem;
            align-items: center;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 3rem;
            border-radius: 20px;
            margin-bottom: 3rem;
            box-shadow: 0 20px 60px rgba(102, 126, 234, 0.4);
            position: relative;
            overflow: hidden;
        }

        .profile-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: rotate 20s linear infinite;
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .profile-avatar {
            width: 150px;
            height: 150px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            z-index: 1;
        }

        .profile-info {
            z-index: 1;
        }

        .profile-info h2 {
            color: white;
            margin: 0 0 1rem 0;
            font-size: 2.5rem;
        }

        .profile-detail {
            margin: 0.8rem 0;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .skills-container {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            margin-top: 2rem;
        }

        .skill-tag {
            background: rgba(255, 255, 255, 0.2);
            padding: 0.6rem 1.2rem;
            border-radius: 25px;
            color: white;
            font-weight: 600;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
        }

        .skill-tag:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .nav-container {
                padding: 1rem 1.5rem;
            }

            .nav-menu {
                gap: 0.5rem;
            }
            
            .nav-link {
                padding: 0.6rem 1rem;
                font-size: 0.9rem;
            }

            .content {
                padding: 0 1.5rem;
                margin: 2rem auto;
            }

            .page {
                padding: 2rem 1.5rem;
            }

            h1 {
                font-size: 2rem;
            }

            .profile-card {
                flex-direction: column;
                text-align: center;
            }

            .features-grid,
            .news-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav>
        <div class="nav-container">
            <div class="logo">ModernWeb</div>
            <ul class="nav-menu">
                <li><a class="nav-link" data-page="home">Home</a></li>
                <li><a class="nav-link" data-page="berita">Berita</a></li>
                <li><a class="nav-link" data-page="profile">Profile</a></li>
            </ul>
        </div>
    </nav>

    <!-- Content Area -->
    <div class="content">
        <!-- Home Page -->
        <div id="home" class="page">
            <h1>🏠 Selamat Datang di ModernWeb</h1>
            <p>Platform modern dengan desain yang memukau dan pengalaman pengguna yang luar biasa. Jelajahi berbagai fitur dan layanan yang kami tawarkan untuk memenuhi kebutuhan digital Anda.</p>
            
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">🚀</div>
                    <div class="feature-title">Cepat & Responsif</div>
                    <div class="feature-desc">Performa optimal dengan loading time yang super cepat di semua perangkat</div>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">🎨</div>
                    <div class="feature-title">Design Modern</div>
                    <div class="feature-desc">Antarmuka yang indah dengan animasi halus dan visual yang menarik</div>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">🔒</div>
                    <div class="feature-title">Aman & Terpercaya</div>
                    <div class="feature-desc">Keamanan data terjamin dengan teknologi enkripsi terkini</div>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">💡</div>
                    <div class="feature-title">Inovasi Terbaru</div>
                    <div class="feature-desc">Selalu update dengan teknologi dan trend terbaru</div>
                </div>
            </div>

            <h2>Mengapa Memilih Kami?</h2>
            <p>Kami berkomitmen memberikan pengalaman terbaik dengan menggabungkan teknologi terkini, desain yang memukau, dan layanan pelanggan yang responsif. Setiap detail dirancang untuk memberikan nilai maksimal bagi pengguna kami.</p>
        </div>

        <!-- Berita Page -->
        <div id="berita" class="page">
            <h1>📰 Berita & Artikel Terkini</h1>
            <p>Update terbaru seputar teknologi, bisnis, dan inovasi digital</p>
            
            <div class="news-grid">
                <div class="news-card">
                    <div class="news-date">2 Oktober 2025</div>
                    <h3 class="news-title">Revolusi AI di Tahun 2025</h3>
                    <p class="news-text">Artificial Intelligence mengalami perkembangan luar biasa dengan kemampuan yang semakin mendekati kecerdasan manusia. Berbagai industri mulai mengadopsi teknologi AI untuk meningkatkan efisiensi dan produktivitas.</p>
                </div>
                
                <div class="news-card">
                    <div class="news-date">1 Oktober 2025</div>
                    <h3 class="news-title">Web 3.0: Masa Depan Internet</h3>
                    <p class="news-text">Era baru internet berbasis blockchain dan desentralisasi membawa perubahan fundamental dalam cara kita berinteraksi online. Privasi dan kepemilikan data menjadi prioritas utama.</p>
                </div>
                
                <div class="news-card">
                    <div class="news-date">30 September 2025</div>
                    <h3 class="news-title">Tips Produktivitas Developer</h3>
                    <p class="news-text">Pelajari strategi dan tools terbaru yang digunakan developer profesional untuk meningkatkan produktivitas coding dan mengelola proyek dengan lebih efektif.</p>
                </div>
                
                <div class="news-card">
                    <div class="news-date">29 September 2025</div>
                    <h3 class="news-title">Cybersecurity Trends 2025</h3>
                    <p class="news-text">Ancaman cyber semakin canggih, namun teknologi keamanan juga berkembang pesat. Ketahui langkah-langkah penting untuk melindungi data dan sistem Anda.</p>
                </div>
                
                <div class="news-card">
                    <div class="news-date">28 September 2025</div>
                    <h3 class="news-title">UI/UX Design Best Practices</h3>
                    <p class="news-text">Desain antarmuka yang intuitif dan user experience yang sempurna menjadi kunci kesuksesan aplikasi modern. Simak tips dari para expert designer.</p>
                </div>
                
                <div class="news-card">
                    <div class="news-date">27 September 2025</div>
                    <h3 class="news-title">Cloud Computing Evolution</h3>
                    <p class="news-text">Teknologi cloud terus berevolusi dengan layanan yang semakin powerful dan affordable. Transformasi digital menjadi lebih mudah diakses untuk semua skala bisnis.</p>
                </div>
            </div>
        </div>

        <!-- Profile Page -->
        <div id="profile" class="page">
            <h1>👤 Profile Pengguna</h1>
            
            <div class="profile-card">
                <div class="profile-avatar">👨‍💻</div>
                <div class="profile-info">
                    <h2>Alexander Chen</h2>
                    <div class="profile-detail">📧 alexander.chen@modernweb.com</div>
                    <div class="profile-detail">📱 +62 812-3456-7890</div>
                    <div class="profile-detail">📍 Semarang, Central Java, Indonesia</div>
                    <div class="profile-detail">💼 Senior Full Stack Developer</div>
                </div>
            </div>
            
            <h2>Tentang Saya</h2>
            <p>Saya adalah seorang developer yang passionate dalam menciptakan solusi digital inovatif. Dengan pengalaman lebih dari 8 tahun di industri teknologi, saya fokus pada pengembangan aplikasi web modern yang scalable dan user-friendly.</p>
            
            <h2>Keahlian & Expertise</h2>
            <div class="skills-container">
                <div class="skill-tag">JavaScript</div>
                <div class="skill-tag">React.js</div>
                <div class="skill-tag">Node.js</div>
                <div class="skill-tag">Python</div>
                <div class="skill-tag">UI/UX Design</div>
                <div class="skill-tag">Cloud Architecture</div>
                <div class="skill-tag">DevOps</div>
                <div class="skill-tag">AI/ML</div>
            </div>

            <h2>Pengalaman</h2>
            <p>Telah menangani berbagai proyek dari startup hingga enterprise, dengan fokus pada pengembangan aplikasi web yang modern, aman, dan performant. Selalu mengikuti perkembangan teknologi terbaru dan best practices dalam software development.</p>
        </div>
    </div>

    <script>
        // Navigation System
        const navLinks = document.querySelectorAll('.nav-link');
        const pages = document.querySelectorAll('.page');

        // Function to show specific page
        function showPage(pageName) {
            pages.forEach(page => {
                page.classList.remove('active');
            });

            navLinks.forEach(link => {
                link.classList.remove('active');
            });

            const selectedPage = document.getElementById(pageName);
            if (selectedPage) {
                selectedPage.classList.add('active');
            }

            const activeLink = document.querySelector(`[data-page="${pageName}"]`);
            if (activeLink) {
                activeLink.classList.add('active');
            }

            currentPage = pageName;
        }

        // Add click event to all nav links
        navLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const pageName = this.getAttribute('data-page');
                showPage(pageName);
            });
        });

        // Store current page in memory
        let currentPage = 'home';

        // Show home page by default
        showPage('home');
    </script>
</body>
</html>