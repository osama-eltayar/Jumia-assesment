<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Phone Numbers</h1>
        <div>
            <form action="{{route('customers.index')}}" method="get" >
                <div class="row">
                    <div class="col-4">
                        <select name="country_code"  class="form-select" aria-label="Default select example">
                            <option value="" >All Countries</option>
                            @foreach($countries as $country)
                                <option {{request('country_code') == $country['value'] ? 'selected' : '' }} value="{{$country['value']}}">{{$country['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4">
                        <select class="form-select" name="status" aria-label="Default select example">
                            <option value="" selected>All Status</option>
                            @foreach($statuses as $status)
                                <option  value="{{$status['value']}}">{{$status['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4">
                        <button class="btn btn-info"> Filter</button>
                    </div>
                </div>
            </form>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">country</th>
                <th scope="col">status</th>
                <th scope="col">country code</th>
                <th scope="col">phone number</th>
            </tr>
            </thead>
            <tbody>
            @foreach($customers as $customer)
                <tr>
                    <th scope="row">{{$customer['country']}}</th>
                    <td>{{$customer['code']}}</td>
                    <td>{{$customer['status']}}</td>
                    <td>{{$customer['phone']}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$customers->links()}}
    </div>
</body>
</html>
