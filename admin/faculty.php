<?php include './components/head.php' ?>
<?php include './components/scripts.php' ?>
<?php include './components/styles.php' ?>


<div id="container">
    <?php include './components/sidebar.php' ?>
    <div id="faculty">
        <div class="top">
            <form id="upload-form" enctype="multipart/form-data">
                <div id="upload-container-fac">
                    <label for="image-input" id="custom-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="33" viewBox="0 0 32 33" fill="none">
                            <path d="M16 0.5C7.1635 0.5 0 7.6635 0 16.5C0 25.337 7.1635 32.5 16 32.5C24.837 32.5 32 25.337 32 16.5C32 7.6635 24.837 0.5 16 0.5ZM16 30.5315C8.2805 30.5315 2 24.2195 2 16.4999C2 8.78044 8.2805 2.49994 16 2.49994C23.7195 2.49994 30 8.78047 30 16.4999C30 24.2194 23.7195 30.5315 16 30.5315ZM23 15.5H17V9.5C17 8.948 16.552 8.5 16 8.5C15.448 8.5 15 8.948 15 9.5V15.5H9C8.448 15.5 8 15.948 8 16.5C8 17.052 8.448 17.5 9 17.5H15V23.5C15 24.052 15.448 24.5 16 24.5C16.552 24.5 17 24.052 17 23.5V17.5H23C23.552 17.5 24 17.052 24 16.5C24 15.948 23.552 15.5 23 15.5Z" fill="black" />
                        </svg>
                        Change image
                    </label>
                    <input type="file" id="image-input" accept="image/*" onchange="previewImage()" />
                </div>
                <div id="image-preview">
                    <img id="default-image" src="./src/img/top.webp" alt="Default Image" style="max-width: 100%; max-height: 100%;" />
                </div>
            </form>

            <div class="fac_text">
                <form id="fac_text">
                    <div class="text-input">
                        <!-- <label for="textInput">Enter Text:</label> -->
                        <textarea type="text" id="textInput" onfocus="clearDefaultText()"></textarea>
                    </div>
                    <div class="chng-btn">
                        <button type="button" onclick="changeDefaultText()">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="19" viewBox="0 0 20 19" fill="none">
                                <path d="M6.0415 13.4686L9.53513 13.4567L17.1605 5.90425C17.4597 5.605 17.6244 5.20758 17.6244 4.78483C17.6244 4.36208 17.4597 3.96467 17.1605 3.66542L15.9049 2.40983C15.3064 1.81133 14.2622 1.8145 13.6684 2.40746L6.0415 9.96154V13.4686ZM14.7855 3.52925L16.0434 4.78246L14.7791 6.03488L13.5235 4.78008L14.7855 3.52925ZM7.62484 10.6218L12.3986 5.89317L13.6542 7.14875L8.88121 11.8758L7.62484 11.8798V10.6218Z" fill="black" />
                                <path d="M4.45833 16.625H15.5417C16.4149 16.625 17.125 15.9149 17.125 15.0417V8.1795L15.5417 9.76283V15.0417H6.95842C6.93783 15.0417 6.91646 15.0496 6.89588 15.0496C6.86975 15.0496 6.84363 15.0425 6.81671 15.0417H4.45833V3.95833H9.87888L11.4622 2.375H4.45833C3.58512 2.375 2.875 3.08512 2.875 3.95833V15.0417C2.875 15.9149 3.58512 16.625 4.45833 16.625Z" fill="black" />
                            </svg>
                            Change Text
                        </button>
                    </div>

                </form>
                <script>
                    var defaultText = "Welcome to Railway HS School's brilliant faculty members! Dive into the charismatic world of our incredible educators and staff. Feel the passion and dedication they share with the students!";

                    window.onload = function() {
                        var input = document.getElementById("textInput");
                        input.value = defaultText;
                    };

                    function clearDefaultText() {
                        var input = document.getElementById("textInput");
                        if (input.value === defaultText) {
                            input.value = "";
                        }
                    }

                    function changeDefaultText() {
                        var input = document.getElementById("textInput");
                        if (input.value === "") {
                            input.value = defaultText;
                        }
                    }
                </script>
            </div>

        </div>
       
        <div class="teachers-container">
            <div class="teacher-top">
                <h4>Faculty</h4>
                <h6>Our exceptional teachers ignite the spark of learning and inspire our students to explore, learn, and succeed.</h6>
            </div>
            <div class="teachers">
               
                <div class="slider-container" style="width: 100%">
                    <?php include './components/person.php' ?>
                </div>
                
            </div>
        </div>
        
    </div>
</div>






<script>
    function previewImage1() {
        var input = document.getElementById('image-input1');
        var preview = document.getElementById('img-container1');
        var defaultImage = document.getElementById('default-image1');

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


<script>
    function previewImage() {
        var input = document.getElementById('image-input');
        var preview = document.getElementById('image-preview');
        var defaultImage = document.getElementById('default-image');

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