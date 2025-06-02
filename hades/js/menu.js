document.addEventListener("DOMContentLoaded", function () {
  // DOM Elements
  const menuToggle = document.getElementById("toggleMenu");
  const sidebar = document.getElementById("sidebar");
  const mainContainer = document.getElementById("main-container");
  const menuIndex = document.getElementById("menu-index");

  // Toggle menu functionality
  menuToggle.addEventListener("click", function() {
    this.classList.toggle("active");
    sidebar.classList.toggle("expanded");
    menuIndex.classList.toggle("expanded");
  });

  // Close menu when clicking outside (mobile only)
  mainContainer.addEventListener("click", function(event) {
    // Only execute on mobile screens (max-width: 1300px)
    if (window.innerWidth <= 1200) {
      if (!menuToggle.contains(event.target)) {
        menuToggle.classList.remove("active");
        sidebar.classList.remove("expanded");
        menuIndex.classList.remove("expanded");
      }
    }
  });

  // Handle window resize
  window.addEventListener("resize", function() {
    if (window.innerWidth > 768) {
      menuToggle.classList.remove("active");
      sidebar.classList.remove("expanded");
      menuIndex.classList.remove("expanded");
    }
  });
});

// SEARCH FUNCTIONALITY
document.addEventListener('DOMContentLoaded', function() {
    const searchToggle = document.getElementById('searchToggle');
    const searchDropdown = document.getElementById('searchDropdown');

    searchToggle.addEventListener('click', function(e) {
        e.stopPropagation();
        searchDropdown.classList.toggle('show');
        
        if (searchDropdown.classList.contains('show')) {
            searchDropdown.querySelector('input').focus();
        }
    });

    document.addEventListener('click', function(e) {
        if (!searchDropdown.contains(e.target) && !searchToggle.contains(e.target)) {
            searchDropdown.classList.remove('show');
        }
    });

    searchDropdown.addEventListener('click', function(e) {
        e.stopPropagation();
    });
});