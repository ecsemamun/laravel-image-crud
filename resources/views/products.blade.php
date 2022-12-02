<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>{{  __('লারাভেল প্রডাক্ট পেজে আপনাকে স্বাগতম') }}</title>
  </head>
  <body>
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <div style="float:left;">
                            <h2>{{  __('লারাভেল প্রডাক্ট পেজে আপনাকে স্বাগতম') }}</h2>
                    </div>
                    <div style="float:right;">
                            <a class="btn btn-dark" href="{{ route('add.product') }}">{{ ('নতুন প্রডাক্ট যুক্ত করেন') }}</a>
                    </div>
                    </div>
                    <div class="card-body">
                    <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th>{{  __('আইডি') }}</th>
                                <th>{{  __('প্রডাক্ট ছবি') }}</th>
                                <th>{{  __('প্রডাক্ট নাম') }}</th>
                                <th>{{  __('একশন') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $key=>$product)

                                <tr>
                                <td>{{ $key+1 }}</td>
                                <td>
                                    <img style="width:150px;" src="{{ asset('images/products/'.$product->image) }}">
                                </td>
                                <td>{{ $product->name  }}</td>
                                <td>
                                    <a class="btn btn-success btn-sm" href="{{ route('edit.product',$product->id) }}">{{  __('ইডিট') }}</a>
                                    <a class="btn btn-danger btn-sm" onClick="return confirm('আপনি কি সিউর ডিলিট করতে চাচ্ছেন?')" href="{{ route('delete.product',$product->id) }}">{{  __('ডিলিট') }}</a>
                                </td>
                                </tr>
                                @endforeach

                            </tbody>
                            </table>
                    </div>
                </div>

            </div>
        </div>

    </div>


    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  
  </body>
</html>