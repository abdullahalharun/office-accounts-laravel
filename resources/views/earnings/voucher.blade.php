<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taibah Accounts</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <style>
      @import url('https://fonts.maateen.me/kalpurush/font.css');
      .kalpurush{
        font-family: 'Kalpurush', sans-serif;
      }
      footer {
        position: fixed; 
        bottom: 0cm; 
        left: 0cm; 
        right: 0cm;
        height: 2cm;
      }
    </style>
</head>
<body>
    <div class="container">
        <div class="text-center mb-4">
            <h2 class="text-center">Taibah Academy</h2>
            <h5 class="text-center">Earning Voucher</h5>
        </div>
       
        <p>Date: {{ $earning->date }} </p>
        <table class="table table-bordered table-striped">
            <tr>
                <th>#ID</th>
                <th>Category</th>
                <th>Account</th>
                <th>Amount</th>
            </tr>
            <tr>
                <td>{{ $earning->id }}</td>
                <td>{{ $earning->category_name->name }}</td>
                <td>{{ $earning->account_name->name }}</td>
                <td>{{ $earning->amount }}</td>
            </tr>
            <tr>
                <th></th>
                <th></th>
                <th>Total</th>
                <th>{{ $earning->amount }}</th>
            </tr>
        </table>
        <br><br><br>
        <div class="text-right">
            <table>
                <tr>
                    <td><p class="border-top">Authorized By</p></td>
                    <td></td>
                </tr>
            </table>
             
        </div>
    </div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>