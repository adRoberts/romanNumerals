<!DOCTYPE html>
<html lang = "en">

<head>
    <meta charset = "utf-8">
    <meta http-equiv = "X-UA-Compatible" content = "IE = edge">
    <meta name = "viewport" content = "width = device-width, initial-scale = 1">

    <title>Code Kata: Roman Numerals</title>

    <!-- Bootstrap -->
    <link href = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel = "stylesheet">


    <!-- project specific css -->
    <link href = "public/dist/css/romanNumerals.min.css" rel = "stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>
    <script src = "https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src = "https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-converter">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-12">
                            <h3>Roman Numeral Converter <small>By Adam Roberts</small></h3>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="converter" method="post" role="form" style="display: block;">
                                <div class="alert alert-danger" id="error" style="display: none">

                                </div>
                                <div class="form-group">
                                    <div class="radio">
                                        <label><input type="radio" name="convertOption" value="dec-to-num" checked >Decimal to Roman Numeral</label>
                                    </div>
                                    <div class="radio">
                                        <label><input type="radio" name="convertOption" value="num-to-dec">Roman Numeral to Decimal</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="value" id="value" tabindex="1" class="form-control" placeholder="Enter value" value="">
                                </div>
                                <div style="margin-bottom: 25px" class="input-group">
                                    <span class="input-group-addon">Result</span>
                                    <input id="result" type="text" class="form-control" name="result" value="" disabled="disabled">
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <input type="submit" name="convert" id="convert" tabindex="4" class="form-control btn btn-login" value="Convert">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

<!-- Include project specific js files -->
<script src = "public/dist/js/romanNumerals.min.js"></script>

</body>
</html>