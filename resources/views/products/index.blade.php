@extends('layouts.app')

@section('content')

    @if(session('success'))
        <h1>{{session('success')}}</h1>
    @endif

    @if($errors->any())
        <h4>{{$errors}}</h4>
    @endif

    <table id="example" class="display dataTable" style="width:100%" role="grid" aria-describedby="example_info">
        <thead>
        <tr role="row">
            <th class="sorting" tabindex="0" aria-controls="example" style="width: 218px;">Product Name</th>
            <th class="sorting" tabindex="0" aria-controls="example" style="width: 218px;">Price</th>
            <th class="sorting" tabindex="0" aria-controls="example" style="width: 218px;">Decimal</th>
            <th class="sorting" tabindex="0" aria-controls="example" style="width: 100px;">Image</th>
            <th class="sorting" tabindex="0" aria-controls="example" style="width: 100px;">Description</th>
            <th class="sorting" tabindex="0" aria-controls="example" style="width: 100px;">Edit</th>
            <th class="sorting" tabindex="0" aria-controls="example" style="width: 100px;">Disable</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{$product->product_name}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->decimal}}</td>
                <td>{{$product->image}}</td>
                <td>{{$product->description}}</td>
                <td><a href="{{url('admin/product/edit/'.$product->id)}}">Edit</a></td>
                @if($product->status == 1)
                    <td><a href="{{url('admin/product/disable/'.$product->id)}}">Disable</a></td>
                @else
                    <td><a href="{{url('admin/product/enable/'.$product->id)}}">Enable</a></td>
                @endif

            </tr>
        @endforeach
        </tbody>
    </table>


@endsection


