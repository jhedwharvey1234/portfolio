<?php
session_start();
$current_page = 'home';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Resume Portfolio</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="container">
            <div class="logo">
                <h1>Jhed Mendoza</h1>
            </div>
            <ul class="nav-links">
                <li><a href="index.php" class="<?php echo $current_page === 'home' ? 'active' : ''; ?>">Home</a></li>
                <li><a href="projects.php">Projects</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h2>Jhed Wharvey Mendoza</h2>
                <p class="subtitle">Full Stack Developer</p>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="container">
        <!-- About Section -->
        <section class="section">
            <h2 class="section-title">About Me</h2>
            <p>IT professional focused on full-stack development, with experience in building responsive web applications, developing scalable backend systems, and designing user-friendly interfaces. Applies secure coding principles and continues building skills in modern web technologies, software architecture, and application security.</p>
        </section>

        <!-- Skills Section -->
        <section class="section">
            <h2 class="section-title">Skills</h2>
            <div class="skills-grid">
                <?php
                    $skills = [
                        'Frontend Development (HTML, CSS, JavaScript)' => 95,
                        'Backend Development Fundamentals' => 85,
                        'Responsive Web Design' => 90,
                        'SQL / Database Handling' => 85,
                        'REST API Integration' => 80,
                        'Git & Version Control' => 85,
                        'Microsoft Office Suite' => 80,
                        'Project Development & Pitching' => 80
                    ];
                    
                    foreach ($skills as $skill => $percentage) {
                        echo '<div class="skill">';
                        echo '<h3>' . $skill . '</h3>';
                        echo '<div class="skill-bar">';
                        echo '<div class="skill-progress" style="width: ' . $percentage . '%"></div>';
                        echo '</div>';
                        echo '<span class="percentage">' . $percentage . '%</span>';
                        echo '</div>';
                    }
                ?>
            </div>
        </section>

        <!-- Experience Section -->
        <section class="section">
            <h2 class="section-title">Experience</h2>
            <div class="experience-item">
                <h3>IT Full Stack Developer Intern</h3>
                <p class="company">LBC Express — IT Infrastructure Department | January - April 2026</p>
                <ul class="experience-list">
                    <li>Developed and maintained internal infrastructure tools for users, company assets, LBC applications, documents, and DCF management.</li>
                    <li>Integrated Azure Active Directory (Azure AD) for authentication and user management to improve access control and streamline administration.</li>
                    <li>Designed and built responsive web-based systems to enhance internal IT infrastructure workflows and efficiency.</li>
                    <li>Supported database handling, system integration, and backend functionality for internal platforms.</li>
                    <li>Collaborated with the IT Infrastructure team to analyze requirements, troubleshoot issues, and improve application performance.</li>
                    <li>Applied full stack development principles to deliver scalable and user-friendly systems.</li>
                </ul>
            </div>
        </section>

        <!-- Education Section -->
        <section class="section">
            <h2 class="section-title">Education</h2>
            <div class="education-item">
                <h3>Bachelor of Science in Information Technology</h3>
                <p class="university">De La Salle Lipa | 2022 - 2026</p>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> Jhed Mendoza. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
