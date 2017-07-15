<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        {{ get_title() }}
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Your invoices">
        <meta name="author" content="Nucleon Team">

        {{ assets.outputCss() }}
    </head>
    <body>
        {{ content() }}

        {{ assets.outputJs() }}
    </body>
</html>