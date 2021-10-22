<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>EligibleSubjectChecker</title>
</head>
<body>
<br><br>
    <div class="container">
        <div class="card shadow">
            <div class="card-header md">
                <h5>Subject Eligibity Checker API Input</h5>
            </div>
            <div class="card-body">
                <button class="btn btn-secondary mbtn" id="hsc_math">Select: Mathematics in HSC</button>
                <button class="btn btn-secondary mbtn" id="hsc_bio">Select: Biology in HSC</button>
                <br>
               
                <div class="row">
                    <div class="col-md-6 col-sm-2">
                        <label class="mt-2">GST Math Score</label>
                        <input type="number" id="gst_math" class="form-control" required placeholder="GST MATH SCORE">
                    </div>

                    <div class="col-md-6 col-sm-2">
                        <label class="mt-2">GST Biology Score</label>
                        <input type="number" id="gst_bio" class="form-control" required placeholder="GST BIOLOGY SCORE">
                    </div>

                    <div class="col-md-6 col-sm-2">
                        <label class="mt-2">GST Physics Score</label>
                        <input type="number" id="gst_phy" class="form-control" required placeholder="GST PHYSICS SCORE">
                    </div>
                    <div class="col-md-6 col-sm-2">
                        <label class="mt-2">GST Chemistry Score</label>
                        <input type="number" id="gst_chem" class="form-control" required placeholder="GST CHEMISTRY SCORE">
                    </div>
                </div>

                <button id="post" class="btn btn-primary mt-3 mb-1 cbtn">Submit</button>
                
                  
            </div>
        </div>
<br>
        <div class="card shadow d-none" id="data2">
            <div class="card-header md d-none" id="data3">
                <h5>Eligible Subject List</h5>
            </div>
            <div class="card-body" id="data4">
                <div id="data">

                </div>
            </div>
           
        </div>
        <br>

    </div>

<br><br>
<div class="text-center">Developed by Pranta Kumar Biswas</div>
<br>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    
    $(document).ready(function () {
        var hsc_math = 0;
        var hsc_bio  = 0;
        $('#hsc_math').on('click', function(){
            if (hsc_math==0) {
                hsc_math = 1;
                $('#hsc_math').addClass('btn-success');
                $('#hsc_math').removeClass('btn-secondary');

            }
            else{
                $('#hsc_math').removeClass('btn-success');
                $('#hsc_math').addClass('btn-secondary');

                hsc_math = 0;
            }

        });

        $('#hsc_bio').on('click', function(){
            if (hsc_bio==0) {
                hsc_bio = 1;
                $('#hsc_bio').addClass('btn-success');
                $('#hsc_bio').removeClass('btn-secondary');

            }
            else{
                $('#hsc_bio').removeClass('btn-success');
                $('#hsc_bio').addClass('btn-secondary');

                hsc_bio = 0;
            }

        });
        

        $('#post').on('click', function(){
            $('#data').empty();
            $('#data2').addClass('d-none');
            $('#data3').addClass('d-none');
            $('#data4').addClass('d-none');
            var gst_math = $('#gst_math').val();
            var gst_phy = $('#gst_phy').val();
            var gst_bio = $('#gst_bio').val();
            var gst_chem = $('#gst_chem').val();
            $.ajax({
                type: "POST",
                url: "http://127.0.0.1:8000/api/get/subjects",
                data: {
                    hsc_math: hsc_math,
                    hsc_bio: hsc_bio,
                    gst_math: gst_math,
                    gst_phy: gst_phy,
                    gst_bio: gst_bio,
                    gst_chem: gst_chem
                },

                success: function (data) {
                    $('#data2').removeClass('d-none');
                    $('#data3').removeClass('d-none');
                    $('#data4').removeClass('d-none');
                    var datast = '';
                    for (let index = 0; index < data.length; index++) {
                    datast += '<h5 class="mt-1 mb-1 c btn btn-outline-info">'+data[index]+'</h5><br>';
                    }
                    $('#data').prepend(datast);
                    
                }
            });
        });

    });
</script>
</html>