/**************************** Start of save product ************************/

// Check if the URL contains 'product' and start the save product script
if (document.URL.split('product')[1]) {
    // simulate text input
    let inputs = document.querySelectorAll('form .simulated');

    inputs.forEach(input => {
        input.onkeyup = function() {
            let inputName = event.target.getAttribute('name');
            let writtenEl = document.querySelector('.simulation .info span[related_to="' + inputName + '"]');
            //writtenEl.innerHTML = event.target.value;
// Check if the input is the price field
            if(inputName === 'price'){
                writtenEl.innerHTML = event.target.value + '$';
            } else {
                writtenEl.innerHTML = event.target.value;
            }

        };
    });



   /* // simulate image input
    let simulation_images = document.querySelector('.simulation .images');
    document.querySelector('form input[type="file"]').onchange = function() {
        simulation_images.innerHTML = ''; // Clear previous images
        for (let file of event.target.files) {
            let img = document.createElement('img');
            img.src = URL.createObjectURL(file);
            simulation_images.append(img);
        }
    };*/
// simulate image input
    let mainImage = document.getElementById('mainImage'); // Main image element
    let thumbnailGallery = document.querySelector('.thumbnail-gallery'); // Thumbnail gallery

    document.querySelector('form input[type="file"]').onchange = function(event) {
        // Clear previous images
        mainImage.src = '';
        mainImage.style.display = 'none'; // Hide the main image initially
        thumbnailGallery.innerHTML = '';  // Clear the thumbnails gallery

        let files = event.target.files; // Get uploaded files

        for (let i = 0; i < files.length; i++) {
            let file = files[i];

            // Create thumbnail image
            let img = document.createElement('img');
            img.src = URL.createObjectURL(file);
            img.classList.add('thumbnail'); // Add a class for styling
            img.style = 'width: 60px; height: 60px; object-fit: contain; cursor: pointer; margin-right: 10px;  z-index: 99999999;';

            // When clicking on a thumbnail, update the main image
            img.onclick = function() {
                changeImage(this); // Call the function to change main image
            };

            // Add the thumbnail to the thumbnail gallery
            thumbnailGallery.appendChild(img);

            // Set the first image as the main image
            if (i === 0) {
                mainImage.src = URL.createObjectURL(file);
                mainImage.style.display = 'block'; // Display the main image
                mainImage.style.width = '300px'; // You can adjust the size here
                mainImage.style.height = '300px'; // You can adjust the size here
            }
        }
    };

// Function to update the main image when a thumbnail is clicked
    function changeImage(element) {
        mainImage.src = element.src; // Change the main image source to the clicked thumbnail
    }

}

/**************************** end of save product ************************/
