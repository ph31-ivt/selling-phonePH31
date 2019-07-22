
<table class="table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Telephone</th>
        <th>Address</th>
        <th>Total</th>
        <th>Status</th>
        <th>Order date</th>
{{--        <th>Shipper</th>--}}
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr>
            <td>{{$order->id}}</td>
            <td>{{$order->name}}</td>
            <td>{{$order->tel}}</td>
            <td>{{$order->address}}</td>
            <td>{{$order->total}}</td>
            <td class="status">
                {{$order->status->name}}
            </td>
            <td>{{ date('d-m-Y',strtotime($order->order_date))}}</td>
{{--            <td>{!! \App\User::findOrFail($order->shipper_id)->name !!}</td>--}}
            <td>
                <a href="{{route('order.show',$order->id)}}" class="btn btn-primary">Show</a> |
                <form action="{!! route('order.shipped',$order->id) !!}" method="post" style="display: inline">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-warning">Shipped</button>
                </form>
            </td>
        </tr>
    @endforeach
    <tr>
        @if(!count($orders)>0)
            <td colspan="3"><h2>No orders</h2></td>
        @endif
    </tr>

    </tbody>
</table>