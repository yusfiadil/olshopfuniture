<html>

<head>
    <title>Upload Form</title>
      <script src="<?php echo base_url('assets/backend/jquery/jquery.min.js') ?>"></script>

</head>

<body>
    <form action="#" id="uploadForm">
        <input type="file" id="userfile" name="userfile" size="20" />
        <input type="submit" value="upload" />
    </form>
    <script type="text/javascript">
        $("#uploadForm").submit(function(event) {
            $.ajax({
                url: "http://localhost/olshopfuniture/halamanutama/do_upload", // Url to which the request is send
                type: "POST", // Type of request to be send, called as method
                data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                 contentType: false, // The content type used when sending data to the server.
                 cache: false, // To unable request pages to be cached
                 processData: false, // To send DOMDocument or non processed data file it is set to false
                success: function(data) // A function to be called if request succeeds
                    {
                        alert("Data Loaded: " + data);
                    }
            });
        });
    </script>
</body>

</html>