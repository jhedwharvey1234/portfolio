<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Projects - Portfolio</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="container">
            <div class="logo">
                <h1>Jhed Mendoza</h1>
            </div>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="projects.php" class="active">Projects</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h2>My Projects</h2>
                <!--<p class="subtitle">Practical systems built for IT infrastructure and management</p>-->
            </div>
        </div>
    </section>

    <!-- Projects Content -->
    <main class="container" style = "margin-top: 50px;">
        <section class="section" >
            <div class="projects-grid" >
                <?php
                    $projects = [
                        [
                            'title' => 'House Project Cost Estimator System',
                            'description' => 'A thesis project designed to calculate estimated construction costs based on user input and project requirements.',
                            'technologies' => 'PHP, MySQL, JavaScript, HTML/CSS',
                            'images' => [
                                'images/c1.png',
                                'images/c2.png',
                                'images/c3.png',
                                'images/c4.png',
                                'images/c5.png',
                                'images/c6.png',
                                'images/c7.png',
                                'images/c8.png'
                            ]
                        ],
                    

                        [
                            'title' => 'IT Infrastructure Management Tools',
                            'description' => 'Created web-based tools focused on improving organization and accessibility of IT infrastructure resources and documentation.',
                            'technologies' => 'PHP, JavaScript, HTML/CSS, Azure AD',
                            'images' => [
                                'images/warning.png',
                                'images/l1.png',
                                'images/l2.png',
                                'images/l3.png',
                                'images/l4.png',
                                'images/l5.png'
                            ]
                        ]
                    ];
                    
                    foreach ($projects as $project) {
                        $imageData = htmlspecialchars(json_encode($project['images']), ENT_QUOTES, 'UTF-8');
                        echo '<div class="project-card">';
                        echo '<h3>' . htmlspecialchars($project['title']) . '</h3>';
                        echo '<p>' . htmlspecialchars($project['description']) . '</p>';
                        echo '<p class="tech"><strong>Technologies:</strong> ' . htmlspecialchars($project['technologies']) . '</p>';
                        echo '<button type="button" class="btn project-modal-btn" data-title="' . htmlspecialchars($project['title']) . '" data-images="' . $imageData . '">View Project</button>';
                        echo '</div>';
                    }
                ?>
            </div>
        </section>
    </main>

    <div class="modal-overlay" id="projectModal" aria-hidden="true" >
        <div class="modal-content" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
            <button type="button" class="modal-close" id="modalCloseBtn" aria-label="Close">&times;</button>
            <h3 id="modalTitle">Project Title</h3>
            <div class="modal-gallery">
                <button type="button" class="modal-arrow" id="modalPrevBtn" aria-label="Previous image">&#10094;</button>
                <div class="modal-image-wrapper">
                    <img id="modalImage" src="" alt="">
                    <div class="modal-image-counter"><span id="modalImageIndex">1</span>/<span id="modalImageTotal">3</span></div>
                </div>
                <button type="button" class="modal-arrow" id="modalNextBtn" aria-label="Next image">&#10095;</button>
            </div>
            <div class="modal-thumbs" id="modalThumbs"></div>
        </div>
    </div>

    <script>
    (function() {
        const modal = document.getElementById('projectModal');
        const modalTitle = document.getElementById('modalTitle');
        const modalImage = document.getElementById('modalImage');
        const modalIndex = document.getElementById('modalImageIndex');
        const modalTotal = document.getElementById('modalImageTotal');
        const modalThumbs = document.getElementById('modalThumbs');
        const prevBtn = document.getElementById('modalPrevBtn');
        const nextBtn = document.getElementById('modalNextBtn');
        const closeBtn = document.getElementById('modalCloseBtn');

        let currentImages = [];
        let currentIndex = 0;

        const updateModal = () => {
            if (!currentImages.length) return;
            modalImage.src = currentImages[currentIndex];
            modalImage.alt = modalTitle.textContent + ' screenshot ' + (currentIndex + 1);
            modalIndex.textContent = currentIndex + 1;
            modalTotal.textContent = currentImages.length;
            const thumbs = modalThumbs.querySelectorAll('.modal-thumb');
            thumbs.forEach((thumb, idx) => thumb.classList.toggle('active', idx === currentIndex));
        };

        const buildThumbnails = () => {
            modalThumbs.innerHTML = '';
            currentImages.forEach((src, idx) => {
                const thumb = document.createElement('button');
                thumb.type = 'button';
                thumb.className = 'modal-thumb' + (idx === currentIndex ? ' active' : '');
                thumb.innerHTML = '<img src="' + src + '" alt="Thumbnail ' + (idx + 1) + '">';
                thumb.addEventListener('click', () => {
                    currentIndex = idx;
                    updateModal();
                });
                modalThumbs.appendChild(thumb);
            });
        };

        const openModal = (title, images) => {
            currentImages = images;
            currentIndex = 0;
            modalTitle.textContent = title;
            buildThumbnails();
            updateModal();
            modal.classList.add('open');
            modal.setAttribute('aria-hidden', 'false');
            document.body.style.overflow = 'hidden';
        };

        const closeModal = () => {
            modal.classList.remove('open');
            modal.setAttribute('aria-hidden', 'true');
            document.body.style.overflow = '';
        };

        document.querySelectorAll('.project-modal-btn').forEach(button => {
            button.addEventListener('click', () => {
                const title = button.dataset.title;
                const images = JSON.parse(button.dataset.images);
                openModal(title, images);
            });
        });

        prevBtn.addEventListener('click', () => {
            if (!currentImages.length) return;
            currentIndex = (currentIndex - 1 + currentImages.length) % currentImages.length;
            updateModal();
        });

        nextBtn.addEventListener('click', () => {
            if (!currentImages.length) return;
            currentIndex = (currentIndex + 1) % currentImages.length;
            updateModal();
        });

        closeBtn.addEventListener('click', closeModal);
        modal.addEventListener('click', event => {
            if (event.target === modal) {
                closeModal();
            }
        });

        document.addEventListener('keydown', event => {
            if (!modal.classList.contains('open')) return;
            if (event.key === 'Escape') closeModal();
            if (event.key === 'ArrowLeft') prevBtn.click();
            if (event.key === 'ArrowRight') nextBtn.click();
        });
    })();
    </script>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> My Portfolio. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
