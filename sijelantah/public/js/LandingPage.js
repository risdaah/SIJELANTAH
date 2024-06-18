document.addEventListener('DOMContentLoaded', function () {
    
    document.addEventListener('DOMContentLoaded', function() {
        // Menambahkan event listener pada setiap nav-link
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function() {
                // Menghapus kelas active dari semua nav-link
                document.querySelectorAll('.nav-link').forEach(nav => nav.classList.remove('active'));
                
                // Menambahkan kelas active pada nav-link yang diklik
                this.classList.add('active');
            });
        });
    });
    
    const navLinks = document.querySelectorAll('.nav-link');

    function activateLink(link) {
        navLinks.forEach(navLink => {
            navLink.classList.remove('active');
        });
        link.classList.add('active');
    }

    navLinks.forEach(link => {
        link.addEventListener('click', function () {
            activateLink(link);
        });
    });

    // Optional: Activate the link that corresponds to the current section in view
    const sections = document.querySelectorAll('section');
    const observerOptions = {
        threshold: 0.7 // Adjust this threshold as needed
    };
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const id = entry.target.getAttribute('id');
                const activeLink = document.querySelector(`.nav-link[href="#${id}"]`);
                if (activeLink) {
                    activateLink(activeLink);
                }
            }
        });
    }, observerOptions);

    sections.forEach(section => {
        observer.observe(section);
    });
});

const sections = document.querySelectorAll('section');

window.onscroll = () => {
    const top = window.scrollY;

    sections.forEach(sec => {
        const offset = sec.offsetTop - 100;
        const height = sec.offsetHeight;
        const id = sec.getAttribute('id');

        if (top >= offset && top < offset + height) {
            navLinks.forEach(link => {
                link.classList.remove('active');
                const activeLink = document.querySelector(`nav a[href*=${id}]`);
                activeLink.classList.add('active');
                indicator(activeLink);
            });
        }
    });
};