$('#lesson').addClass('active')
//text editor
tinymce.init({
    selector: '.editor',
    setup: function (editor) {
        editor.on('change', function () {
            editor.save();
        });
    },
    height: 500,
    theme: 'silver',
    plugins: [
        'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        'searchreplace wordcount visualblocks visualchars code fullscreen',
        'insertdatetime media nonbreaking save table contextmenu directionality',
        'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc help','directionality',
    ],
    toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image |ltr rtl',
    toolbar2: 'print preview media | forecolor backcolor emoticons | fontsizeselect | codesample help',
    image_advtab: true,
    templates: [
        { title: 'Test template 1', content: 'Test 1' },
        { title: 'Test template 2', content: 'Test 2' }
    ],
    fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt 50pt',
    content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    ]
});

let majorities = $('#majorities').val()
majorities = JSON.parse(majorities);
let dataMajor = {};
majorities.forEach((v,i)=>{
    dataMajor[v.id] = v.name
})

var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
    // This function will display the specified tab of the form ...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    // ... and fix the Previous/Next buttons:
    if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
    } else {
        document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
        document.getElementById("nextBtn").style.display = "none";
        document.getElementById("submitBtn").style.display = "inline";
    } else {
        document.getElementById("submitBtn").style.display = "none";
        document.getElementById("nextBtn").style.display = "inline";
    }
    // ... and run a function that displays the correct step indicator:
    fixStepIndicator(n)
}

function nextPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("tab");
    // Exit the function if any field in the current tab is invalid:
    if (n == 1 && !validateForm()) return false;
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form... :
    if (currentTab >= x.length) {
        //...the form gets submitted:
        document.getElementById("regForm").submit();
        return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
}

function validateForm() {
    // This function deals with validation of the form fields
    var x, y, i, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");
    // A loop that checks every input field in the current tab:
    for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
            // add an "invalid" class to the field:
            y[i].className += " invalid";
            // and set the current valid status to false:
            valid = false;
        }
    }
    // If the valid status is true, mark the step as finished and valid:
    if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid; // return the valid status
}

function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class to the current step:
    x[n].className += " active";
}

function set_input() {
    $('.classess').empty()
    let major_id=$('#major_id').val()
    if(major_id!=null)
    major_id.forEach(element => {
        $('.classess').append(`
        <div class="form-group form-row">
            <div class="col-6">
                <label for="">Kelas</label>
                <input type="text" class="form-control" value="${dataMajor[element]}" readonly>
            </div>
            <div class="col-3">
                <label for="">Dari jam</label>
                <input type="time" name="start_at[]" class="form-control start_at" onfocus="this.classList.remove('invalid')">
            </div>
            <div class="col-3">
                <label for="">Sampai Jam</label>
                <input type="time" name="end_at[]" class="form-control end_at" onfocus="this.classList.remove('invalid')">
            </div>
        </div>
        `)
    });
}
set_input()

$('#major_id').on('change', function(e){
    set_input()
})
