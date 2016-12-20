<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/jquery.loadingoverlay/1.5.2/loadingoverlay_progress.min.js"
            integrity="sha256-DKtVFAGi8mH+fc976+o17Ctu+tPLcqqQMj/UJfEWi5w=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/jquery.loadingoverlay/1.5.2/loadingoverlay.min.js"
            integrity="sha256-v2EqBTFV6zeSUDMMJ5//xsmRGgaO+yntVyFy+DZCiL4=" crossorigin="anonymous"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/js.js"></script>
</head>
<body>
<div class="container">
    <div class="row" id="header">
        <div
            style="background-image: url(img/header.jpg); background-size: cover; background-position: center; height: 200px"/>
    </div>
    <div class="row" id="nav"><h1>Startships</h1></div>

    <div class="container" style="background-color: white;">
        <div class="row text-center">
            <ul class="pagination">
                <li><a href="#" data-page="1" onclick="pagination(jQuery(this))">«</a></li>
                <li><a class="active" data-page="1" href="#" onclick="pagination(jQuery(this))">1</a></li>
                <li><a data-page="2" href="#" onclick="pagination(jQuery(this))">2</a></li>
                <li><a href="#" data-page="3" onclick="pagination(jQuery(this))">3</a></li>
                <li><a href="#" data-page="4" onclick="pagination(jQuery(this))">4</a></li>
                <li><a href="#" data-page="4" onclick="pagination(jQuery(this))">»</a></li>
            </ul>
        </div>
        <div id="body">

        </div>
    </div>


</div>

<div class="modal fade" id="details_modal" tabindex="-1" role="dialog" aria-labelledby="details_modal"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="details_modal_label">New message</h4>
            </div>
            <div class="modal-body" id="modal_body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>