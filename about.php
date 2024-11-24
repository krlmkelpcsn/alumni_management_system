<style>
        /* General Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body {
            /* background-color: #f4f4f9; */
            color: #333;
        }
        /* Header Section */
        .about-header {
            margin-top:6em;
            /* background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('img/home-background.webp') no-repeat center center/cover; */
            
        }
        .about-header h1 {
            color: #4e73df;
            font-size: 2.5rem;
            margin-bottom: 1rem;
            font-weight: 700;
        }
        .about-header p {
            font-size: 1.2rem;
            color: #555;
        }

        /* Section Styling */
        /* .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        } */

        /* Vision and Mission Section */
        .card {
            background: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin: 1rem 0;
            padding: 2rem;
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card h2 {
            color: #4e73df;
            font-size: 1.8rem;
            margin-bottom: 1rem;
        }
        .card p {
            line-height: 1.8;
            font-size: 1rem;
            color: #555;
        }

        /* Core Values Section */
        .values-section {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }
        .value-card {
            text-align: center;
            padding: 1.5rem;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .value-card i {
            font-size: 3rem;
            color: #1cc88a;
            margin-bottom: 1rem;
        }
        .value-card h3 {
            color: #4e73df;
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }
        .value-card p {
            font-size: 1rem;
            color: #555;
        }

        /* Footer Section */
        /* footer {
            background: #1cc88a;
            color: white;
            text-align: center;
            padding: 1rem;
            margin-top: 2rem;
            border-radius: 20px 20px 0 0;
        }
        footer p {
            margin: 0;
            font-size: 0.9rem;
        } */
    </style>
</head>
<body>
    <!-- Header Section -->
    <div class="about-header text-center text-light py-5" style="">
    <div class="container">
        <h1 class="display-4 fw-bold">About Us</h1>
        <p class="lead mt-3">
            Welcome to San Pedro National High School of Iriga City! Discover our journey of excellence and community spirit.
        </p>
    </div>
    </div>


    <!-- Main Content Section -->
    <div class="container mb-5">
        <!-- Vision Section -->
        <div class="card">
            <h2>Our Vision</h2>
            <p>To be a center of excellence in secondary education, shaping students into well-rounded individuals who are prepared for the challenges of the future, with a strong sense of responsibility, community spirit, and a love for lifelong learning.</p>
        </div>

        <!-- Mission Section -->
        <div class="card">
            <h2>Our Mission</h2>
            <p>To provide quality education that nurtures every student’s potential, fosters critical thinking, and promotes the holistic development of learners in a safe, inclusive, and dynamic learning environment.</p>
        </div>

        <!-- Core Values Section -->
        <h2 style="color: #4e73df; margin-top: 2rem;">Our Core Values</h2>
        <div class="values-section">
            <div class="value-card">
                <i class="fas fa-shield-alt"></i>
                <h3>Integrity</h3>
                <p>We believe in honesty and ethical behavior in all aspects of school life.</p>
            </div>
            <div class="value-card">
                <i class="fas fa-trophy"></i>
                <h3>Excellence</h3>
                <p>We strive for the highest standards in academic and extracurricular activities.</p>
            </div>
            <div class="value-card">
                <i class="fas fa-handshake"></i>
                <h3>Respect</h3>
                <p>We promote respect for oneself, others, and the environment.</p>
            </div>
            <div class="value-card">
                <i class="fas fa-lightbulb"></i>
                <h3>Innovation</h3>
                <p>We encourage creativity and forward-thinking in solving problems.</p>
            </div>
            <div class="value-card">
                <i class="fas fa-users"></i>
                <h3>Community</h3>
                <p>We foster a strong sense of belonging and cooperation among students, staff, and stakeholders.</p>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <!-- <footer>
        <p>&copy; 2024 San Pedro National High School. All Rights Reserved.</p>
    </footer> -->
</body>
</html>