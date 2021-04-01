<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <title>Invoicely</title>

  <style>
    body {
      font-family: 'Lato', sans-serif;
    }

    .block {
      line-height: 0.5;
    }

    .size-1 { font-size: 0.25rem; }
    .size-2 { font-size: 0.5rem; }
    .size-3 { font-size: 1rem; }
    .size-4 { font-size: 1.25rem; }
    .size-5 { font-size: 1.5rem; }
    .size-6 { font-size: 2rem; }
    .size-7 { font-size: 3rem; }
    .size-8 { font-size: 4rem; }
    .size-9 { font-size: 5rem; }
    .size-10 { font-size: 6rem; }
  </style>
</head>
<body>
  <div class="row">
    <div class="col-xs-7">
      @include('templates.partials.company', ['company' => $invoice->company])
    </div>
    <div class="col-xs-4">
      @include('templates.partials.invoice', ['invoice' => $invoice])
    </div>
  </div>
  <div class="row" style="padding-top: 3rem;">
    <div class="col-xs-5">
      @include('templates.partials.customer-shipping', ['customer' => $invoice->customer])
    </div>
    <div class="col-xs-5">
      @include('templates.partials.customer-billing', ['customer' => $invoice->customer])
    </div>
  </div>
  <div class="row" style="padding-top: 2rem;">
    <div class="col-xs-12">
      @include('templates.partials.items-fees', ['invoice' => $invoice])
    </div>
  </div>
  
  <div class="row" style="padding-top: 2rem;">
    <div class="col-xs-7">
      @include('templates.partials.comments', ['comments' => $invoice->comments])
    </div>
  </div>
</body>
</html>