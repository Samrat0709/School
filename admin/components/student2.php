<?php include './components/head.php' ?>
<?php include './components/scripts.php' ?>
<?php include './components/styles.php' ?>


<style>
    #image-input5 {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    label {
        width: max-content;
    }

    #custom-button5 {
        color: #000;
        font-family: 'Mont-light', sans-serif;
        font-size: 1rem;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        text-transform: capitalize;
        border-radius: 8.245px;
        background: rgba(255, 255, 255, 0.40);
        box-shadow: 1.03067px 1.03067px 10.30672px 0px rgba(0, 0, 0, 0.25);
    }

    .text3 form {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 1rem;
    }

    .name,
    .percentage,
    .dropdown {
        position: relative;

    }
    .text3 input , .text3 select{
        border: none;
        background: transparent;
    }
    .name label,
    .percentage label,
    .dropdown  select {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        color: #000;
        font-family: 'Poppins',sans-serif;
        font-size: 1.2rem;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
        text-transform: capitalize;
    }
</style>

<div class="student">
    <form id="upload-form" enctype="multipart/form-data">
        <div id="upload-container">
            <label for="image-input5" id="custom-button5">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="33" viewBox="0 0 32 33" fill="none">
                    <path d="M16 0.5C7.1635 0.5 0 7.6635 0 16.5C0 25.337 7.1635 32.5 16 32.5C24.837 32.5 32 25.337 32 16.5C32 7.6635 24.837 0.5 16 0.5ZM16 30.5315C8.2805 30.5315 2 24.2195 2 16.4999C2 8.78044 8.2805 2.49994 16 2.49994C23.7195 2.49994 30 8.78047 30 16.4999C30 24.2194 23.7195 30.5315 16 30.5315ZM23 15.5H17V9.5C17 8.948 16.552 8.5 16 8.5C15.448 8.5 15 8.948 15 9.5V15.5H9C8.448 15.5 8 15.948 8 16.5C8 17.052 8.448 17.5 9 17.5H15V23.5C15 24.052 15.448 24.5 16 24.5C16.552 24.5 17 24.052 17 23.5V17.5H23C23.552 17.5 24 17.052 24 16.5C24 15.948 23.552 15.5 23 15.5Z" fill="white" />
                </svg>
                Change image
            </label>
            <input type="file" id="image-input5" accept="image/*" onchange="previewImage5()" style="opacity: 0;" />
        </div>
        <div class="img-container" id="img-container5">
            <img id="default-image5" src="./src/img/person2.webp" alt="">
        </div>


        <script>
            function previewImage5() {
                var input = document.getElementById('image-input5');
                var preview = document.getElementById('img-container5');
                var defaultImage = document.getElementById('default-image5');

                while (preview.firstChild) {
                    preview.removeChild(preview.firstChild);
                }

                var file = input.files[0];
                if (file) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        var img = document.createElement('img');
                        img.src = e.target.result;
                        img.style.maxWidth = '100%';
                        img.style.maxHeight = '100%';
                        preview.appendChild(img);
                    };

                    reader.readAsDataURL(file);
                } else {
                    // If no file is selected, show the default image
                    preview.appendChild(defaultImage.cloneNode(true));
                }
            }
        </script>
    </form>
    <div class="text3">
        <form action="">
            <form action="#" method="post">
                <!-- Student Name Input -->
                <div class="name">
                    <label for="studentName">Students Name</label>
                    <input type="text" id="studentName" name="studentName" oninput="toggleLabelVisibility_std(this)" required>
                </div>

                <div class="percentage">
                    <label for="percentage">Write percentage  </label>
                    <input type="number" id="percentage" name="percentage" oninput="toggleLabelVisibility_pct(this)" required>
                </div>
                <!-- Percentage Input -->

                

                <input type="submit" value="Submit" id="submit_btn">

            </form>
        </form>
    </div>

</div>

<script>
    function toggleLabelVisibility_std(input) {
        // Get the label element associated with the textarea
        var label = document.querySelector('label[for="studentName"]');

        // Show or hide the label based on whether there is text in the textarea
        label.style.display = input.value.trim() === '' ? 'block' : 'none';
    }

    function toggleLabelVisibility_pct(input) {
        // Get the label element associated with the textarea
        var label = document.querySelector('label[for="percentage"]');

        // Show or hide the label based on whether there is text in the textarea
        label.style.display = input.value.trim() === '' ? 'block' : 'none';
    }

    function toggleLabelVisibility_drop(select) {
        // Get the label element associated with the textarea
        var label = document.querySelector('label[for="batch"]');

        // Show or hide the label based on whether there is text in the textarea
        label.style.display = select.value.trim() === '' ? 'block' : 'none';
    }
</script>