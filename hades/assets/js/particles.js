document.addEventListener('DOMContentLoaded', () => {
    const mainContainer = document.querySelector('.main-container');
    const numParticles = 100; // Number of particles, same as in the PUG loop

    const screenWidth = window.innerWidth;
    const screenHeight = window.innerHeight;

    for (let i = 0; i < numParticles; i++) {
        // Create the wrapper for initial positioning
        const particleWrapper = document.createElement('div');
        particleWrapper.classList.add('particle-wrapper');

        // Create the visible particle element
        const particle = document.createElement('div');
        particle.classList.add('particle');

        // 1. Random initial position for the particle's wrapper
        const initialX = Math.random() * screenWidth;
        const initialY = Math.random() * screenHeight;
        particleWrapper.style.left = `${initialX}px`;
        particleWrapper.style.top = `${initialY}px`;

        // 2. Randomize animation properties using CSS Custom Properties
        // The particle animation starts from the center (0,0) of its wrapper
        particle.style.setProperty('--tx-start', '0px');
        particle.style.setProperty('--ty-start', '0px');

        // Random end translation (relative to its starting point in the wrapper)
        // Particles will travel between 50px and 200px in a random direction
        const travelDistance = Math.random() * 150 + 50; // 50 to 200
        const angle = Math.random() * 2 * Math.PI; // Random angle
        const endX = Math.cos(angle) * travelDistance;
        const endY = Math.sin(angle) * travelDistance;
        particle.style.setProperty('--tx-end', `${endX}px`);
        particle.style.setProperty('--ty-end', `${endY}px`);

        // 3. Random animation duration and delay
        const duration = Math.random() * 8 + 4; // Duration between 4s and 12s
        const delay = Math.random() * 10;       // Delay between 0s and 10s
        particle.style.animationDuration = `${duration}s`;
        particle.style.animationDelay = `${delay}s`;

        // 4. Optional: Randomize particle size
        const size = Math.random() * 6 + 4; // Size between 4px and 10px
        particle.style.width = `${size}px`;
        particle.style.height = `${size}px`;
        
        // 5. Optional: Randomize particle color (e.g., shades of white/gray or very light colors)
        // For now, it uses the CSS default (white). You can uncomment and modify this:
        // const brightness = Math.floor(Math.random() * 56) + 200; // 200-255 for light grays/white
        // particle.style.backgroundColor = `rgb(${brightness},${brightness},${brightness})`;

        // Append the particle to its wrapper, and wrapper to the main container
        particleWrapper.appendChild(particle);
        mainContainer.appendChild(particleWrapper);
    }
});