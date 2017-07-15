<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Avatar upload with AJAX</title>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style type="text/css">
        * {
            margin: 0;
            box-sizing: border-box;
        }

        .avatar .camera {
            display: none;
        }

        .avatar:hover .camera {
            display: block;
        }
    </style>

    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
    <![endif]-->
</head>
<body>
<div style="text-align: center; margin-top: 50px">
    <form role="form" id="avatarForm" method="post" enctype="multipart/form-data">
        <input type="hidden" name="code" value="DSAFDSGFDGGFHFJ45245345^GFDGGSDFGDSDSFFHHQACFBHJGPOIUJ">
        <label class="avatar" for="uploadAvatar" style="display: inline-block; position: relative; overflow: hidden; width: 120px; height: 120px; border-radius: 50%; background-color: #f6f6f6; cursor: pointer">
            <span class="embed-avatar" style="display: block; width: 100%; height: 100%; display: block; position: absolute; top: 0; left: 0;">
                <span class="img-avatar img-avatar-lg bg" style="display: block; width: 100%; height: 100%; background: url('https://pioneer-india.in/media/misc/default-avatar.png') no-repeat center; background-size: 100% 100%;"></span>
            </span>
            <span class="camera" style="width: 100%;height: 100%;z-index: 9999;text-align: center;position: absolute;top: 0;left: 0;background: #F0F0F0;opacity: 0.5;padding: 0;padding-top: 43%;">
                <i class="fa fa-camera" style="color: blueviolet"></i>
            </span>
            <input type="file" name="uploadAvatar" id="uploadAvatar" class="upload-avatar" accept="image/*" style="display: none;">
        </label>
    </form>
</div>

<script>
    $(function () {
        $("input[name='uploadAvatar']").change(function () {
            if (this.files.length > 0) {
                if (!window.FormData) {
                    alert("Your browse does not support FormData object.");
                    return false;
                }
                //console.log(this.form); return;

                $.ajax({
                    url: "http://localhost/avatar/ajax/avatar-upload.php",
                    method: 'POST',
                    dataType: 'json',
                    data: new FormData(this.form),
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        //
                    },
                    success: function (data) {
                        if (data['status'] === 'ok') {
                            var uploaded_url = data['uploaded_url'];
                            $(".avatar .embed-avatar .img-avatar").css({"background-image": "url('" + uploaded_url + "')"});
                        }
                    },
                    complete: function () {
                        //
                    },
                    error: function () {
                        //
                    }
                });
            }
        });
    });
</script>

</body>
</html>
