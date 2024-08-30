jQuery(document).ready(function ($) {
    var ajax_url = my_script_vars.ajax_url;
    // Use the ajax_url variable to make an AJAX request

    const generateBtn = document.getElementById('generate-btn');
    const inputText = document.getElementById('input-text');
    const resultDiv = document.getElementById('result');

    generateBtn.addEventListener('click', () => {
        const inputData = inputText.value;
        const payload = { 'aa': 11 }; // your endpoint payload
        // script.js
        alert()
        $.ajax({
            type: 'POST',
            url: ajax_url,
            data: {
                action: 'my_ajax_handler',
                // other data properties...
            },
            success: function (response) { 
                console.log(response);
                  resultDiv.innerHTML = `zz Result: ${response}`;
            },
        }); 

        // fetch('/abcurl', {
        //     method: 'POST',
        //     headers: {
        //         'Content-Type': 'application/json'
        //     },
        //     body: JSON.stringify(payload)
        // })
        //     .then(response => response.text())
        //     .then(data => {
        //         resultDiv.innerHTML = `Result: ${data}`;
        //     })
        //     .catch(error => console.error('Error:', error));
    });
});