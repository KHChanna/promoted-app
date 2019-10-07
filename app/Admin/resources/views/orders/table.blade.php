<div class="table-responsive">
    <table class="table" id="orders-table">
        <thead>
            <tr>
                <th>User Id</th>
        <th>Shop Id</th>
        <th>Date Order Placed</th>
        <th>Date Order Paid</th>
        <th>Order Status Id</th>
        <th>Delivery Option Id</th>
        <th>Address Full Name</th>
        <th>Address Email</th>
        <th>Address Phone</th>
        <th>Address Street Address</th>
        <th>Address City Province Id</th>
        <th>Address District Id</th>
        <th>Phone Pickup</th>
        <th>Note</th>
        <th>Preferred Delivery Pickup Date</th>
        <th>Preferred Delivery Pickup Time</th>
        <th>Payment Method Id</th>
        <th>Delivery Id</th>
        <th>Delivery Pickup Date</th>
        <th>Pickup Lat</th>
        <th>Pickup Lon</th>
        <th>Total</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{!! $order->user_id !!}</td>
            <td>{!! $order->shop_id !!}</td>
            <td>{!! $order->date_order_placed !!}</td>
            <td>{!! $order->date_order_paid !!}</td>
            <td>{!! $order->order_status_id !!}</td>
            <td>{!! $order->delivery_option_id !!}</td>
            <td>{!! $order->address_full_name !!}</td>
            <td>{!! $order->address_email !!}</td>
            <td>{!! $order->address_phone !!}</td>
            <td>{!! $order->address_street_address !!}</td>
            <td>{!! $order->address_city_province_id !!}</td>
            <td>{!! $order->address_district_id !!}</td>
            <td>{!! $order->phone_pickup !!}</td>
            <td>{!! $order->note !!}</td>
            <td>{!! $order->preferred_delivery_pickup_date !!}</td>
            <td>{!! $order->preferred_delivery_pickup_time !!}</td>
            <td>{!! $order->payment_method_id !!}</td>
            <td>{!! $order->delivery_id !!}</td>
            <td>{!! $order->delivery_pickup_date !!}</td>
            <td>{!! $order->pickup_lat !!}</td>
            <td>{!! $order->pickup_lon !!}</td>
            <td>{!! $order->total !!}</td>
                <td>
                    {!! Form::open(['route' => ['orders.destroy', $order->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('orders.show', [$order->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('orders.edit', [$order->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
