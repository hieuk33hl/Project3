@extends('layout')
@section('content')
    <table class="table table-bordered border-primary">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Sản phẩm</th>
                <th scope="col"></th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $item)
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
            @endforeach
            <tr>
                <td>1</td>
                <td colspan="2"></td>
                <td>1</td>
            </tr>
        </tbody>
    </table>
@endsection
