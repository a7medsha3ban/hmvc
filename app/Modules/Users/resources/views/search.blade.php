<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Fredericka+the+Great|Zilla+Slab:300,400');
        $white: #fff;
        $main-color: #643A7A;

        body {
            background: #201C29;
        }
        .w-5{
            display: none;
        }
        .frame {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 400px;
            height: 400px;
            margin-top: -200px;
            margin-left: -200px;
            border-radius: 2px;
            box-shadow: .5rem .5rem 1rem rgba(0, 0, 0, 0.6);
            background: $main-color;
            color: #497081;
            font-family: 'zilla slab', serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            font-size: .9rem;
        }

        .list {
            position: absolute;
            width: 240px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: $white;
            box-shadow: 1rem 1rem .5rem rgba(0, 0, 0, 0.15);
            border-radius: 3px;
        }

        .list .head {
            padding: 20px 0;
            margin: 0 30px;
            border-bottom: 1px solid rgba(100, 58, 122, .5);
        }

        .list .title {
            font-family: 'fredericka the great', cursive;
            font-weight: 500;
            text-align: center;
            font-size: 2.5rem;
            color: rgba(100, 58, 122, .8);
        }

        .list .subtitle {
            font-size: .9rem;
            text-align: center;
            letter-spacing: .5px;
        }

        .list ul {
            list-style: none;
            padding: 4px 0;
            margin: 0 30px;
            font-weight: 300;
        }
        .center {
            margin-left: auto;
            margin-right: auto;
        }

        .list ul li {
            position: relative;
            display: block;
            margin: 24px 0;
            height: 14px;
        }

        .list ul .text {
            float: left;
            font-size: 1rem;
            cursor: pointer;
            transition: all .3s ease-in-out;
        }

        ul li:nth-of-type(2) {
            animation: slide-up 1s;
        }

        ul li:nth-of-type(3) {
            animation: slide-up 1.5s;
        }

        ul li:nth-of-type(4) {
            animation: slide-up 2s;
        }

        @keyframes slide-up {
            0% {
                opacity: 0;
                transform: translateY(5rem);
            }
        }

        .list ul .button {
            position: relative;
            z-index: 2;
            box-sizing: border-box;
            float: right;
            width: 20px;
            height: 20px;
            border: 1px solid fade-out($main-color, .5);
            border-radius: 50%;
            cursor: pointer;
        }


        .list ul .checkmark {
            position: absolute;
            stroke: rgba(100, 58, 122, .5);
            fill: none;
            stroke-dashoffset: 340;
            stroke-dasharray: 360;
        }

        .list ul input {
            display: none;
        }

        ul li .wrapper {
            position: absolute;
            width: 20px;
            right: 0;
        }

        .list ul input:checked ~ {
        .text {
            color: rgba(100, 58, 122, .5);
        }
        .wrapper .checkmark {
            animation: dash .5s ease-out forwards;
            opacity: 1;
        }
        .button {
            opacity: 0;
        }
        }

        .checkmark {
            display: block;
            stroke-width: 8;
            opacity: 0;
        }

        @keyframes dash {
            0% {
                stroke-dashoffset: 340;
            }
            100% {
                stroke-dashoffset: 0;
            }
        }
    </style>
</head>
<body>

<!-- TO DO : Find out how to create new items + congrats message when all done-->


<div class="frame">
    <div class="list">
        <div class="head">
            <div class="title">Products</div>
            <div class="subtitle">
                <form action="{{route('users.product.search')}}" method="get">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" name="search" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <button type="submit" title="Search" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <table>
            <thead>
            <tr>
                <th>#</th>
                <th>product</th>
                <th>category</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
    </div>

</div>
</body>
</html>
