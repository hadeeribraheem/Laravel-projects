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

    // simulate image input
    let simulation_images = document.querySelector('.simulation .images');
    document.querySelector('form input[type="file"]').onchange = function() {
        simulation_images.innerHTML = ''; // Clear previous images
        for (let file of event.target.files) {
            let img = document.createElement('img');
            img.src = URL.createObjectURL(file);
            simulation_images.append(img);
        }
    };

}

/**************************** end of save product ************************/
