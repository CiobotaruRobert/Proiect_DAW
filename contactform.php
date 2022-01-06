<!DOCTYPE html>
<html>
<?php include("header.php"); ?>
<head>
    <title>Trimite-ne un e-mail!</title>
</head>
<body>

	<center>
		<h4 class="sent-notification"></h4>

		<form id="myForm">
			<h2>Trimite-ne un e-mail!</h2>

			<label>Nume</label>
			<input id="name" type="text" placeholder=" Numele dvs...">
			<br><br>

			<label>E-mail</label>
			<input id="email" type="text" placeholder=" Adresa e-mail...">
			<br><br>

			<label>Subiect</label>
			<input id="subject" type="text" placeholder=" Subiect...">
			<br><br>

			<p>Mesaj</p>
			<textarea id="body" rows="5" placeholder="Scrieti mesajul..."></textarea>
			<br><br>

			<button type="button" onclick="sendEmail()" value="Trimite un mail">Submit</button>
		</form>
	</center>

	<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
        function sendEmail() {
            var name = $("#name");
            var email = $("#email");
            var subject = $("#subject");
            var body = $("#body");

            if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)) {
                $.ajax({
                   url: 'contact.php',
                   method: 'POST',
                   dataType: 'json',
                   data: {
                       name: name.val(),
                       email: email.val(),
                       subject: subject.val(),
                       body: body.val()
                   }, success: function (response) {
                        $('#myForm')[0].reset();
                        $('.sent-notification').text("Mesaj trimis cu succes!");
                   }
                });
            }
        }

        function isNotEmpty(caller) {
            if (caller.val() == "") {
                caller.css('border', '1px solid red');
                return false;
            } else
                caller.css('border', '');

            return true;
        }
    </script>
<style>
<?php include 'pagini_css.css'; ?>
</style>


<?php include ("footer.php"); ?>
</body>
</html>
