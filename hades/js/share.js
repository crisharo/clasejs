// Toggle Share Dropdown Visibility
function toggleShareMenu() {
    const dropdown = document.getElementById('shareDropdown');
    dropdown.classList.toggle('show');
}

// Copy Article Link
function copyLink() {
    const tempInput = document.createElement('input');
    tempInput.value = window.location.href;
    document.body.appendChild(tempInput);
    tempInput.select();
    document.execCommand('copy');
    document.body.removeChild(tempInput);
    alert('Link copied to clipboard!');
}

// Close dropdown if clicking outside
window.onclick = function (event) {
    if (!event.target.closest('.share-container')) {
        document.getElementById('shareDropdown').classList.remove('show');
    }
};


// SUBSCRIBE BOX
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('subscribeModal');
    const btn = document.getElementById('subscribeButton');
    const span = document.querySelector('.close-modal');

    // Open modal
    btn.addEventListener('click', function(e) {
        e.preventDefault();
        modal.style.display = "flex";
        document.body.style.overflow = 'hidden'; // Prevent scrolling
    });

    // Close modal
    span.addEventListener('click', function() {
        modal.style.display = "none";
        document.body.style.overflow = 'auto'; // Restore scrolling
    });

    // Close modal when clicking outside
    window.addEventListener('click', function(e) {
        if (e.target == modal) {
            modal.style.display = "none";
            document.body.style.overflow = 'auto';
        }
    });

    // Close modal on ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal.style.display === "flex") {
            modal.style.display = "none";
            document.body.style.overflow = 'auto';
        }
    });
});