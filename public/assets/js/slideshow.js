// Array of image URLs to cycle through
const images = ["assets/img/home_black.png", "assets/img/other_side_black.png", "assets/img/baner_black.png"];
let currentIndex = 0;

// Function to change the image source
function changeImage() {
    const imageElement = document.getElementById("home_img");

    // Update the image source to the next one in the array
    currentIndex = (currentIndex + 1) % images.length;
    imageElement.src = images[currentIndex];
}

// Set an interval to call changeImage every 3 seconds (3000 ms)
setInterval(changeImage, 5000);
