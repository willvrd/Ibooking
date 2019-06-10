<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

  @includeFirst(['ibooking.emails.style', 'ibooking::emails.base.style'])

</head>

<body>
<div id="body">
  <div id="template-mail">
    
    @includeFirst(['ibooking.emails.header', 'ibooking::emails.base.header'])

    <h2>Este es el contenido del correo</h2>

    @includeFirst(['ibooking.emails.footer', 'ibooking::emails.base.footer'])


  </div>
</div>
</body>

</html>