<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Order_item;

class OrderController extends Controller
{
    public function registerOrder(Request $request) {
        $order = new Order();

        $validated = $request->validate([
            'table' => 'required|numeric',
            'customer' => 'required',
            'waiter' => 'required',
            'items' => 'required'
        ],
        [
            'table.required'=>'Mesa não informada.',
            'customer.required'=>'Cliente não informado',
            'waiter.required'=>'Garçom não informado',
            'items.required'=>'Itens do pedido não foi informado'
        ]);

        $order->table = $request->input('table');
        $order->customer = $request->input('customer');
        $order->waiter = $request->input('waiter');
        $order->status = 'to do';

        $order->save();

        $order_id = $order->id;

        foreach($request->input('items') as $item) {
            $order_item = new Order_item();

            $order_item->order_id = $order_id;
            $order_item->order_item = $item;

            $order_item->save();
        }

        return 'Success';
    }

    public function getOrdersWaiter($waiter) {

        $results = \DB::select('select * from orders where waiter = :id and status = :status', ['id' => $waiter, 'status' => 'on progress']);

        return $results;
    }

    public function getOrdersCooker() {

        $results = \DB::select('select * from orders where status = :status_a or status = :status_b', ['status_a' => 'to do', 'status_b' => 'on progress']);

        return $results;
    }

    public function getOrdersByFilters(Request $request) {

        $order = new Order;

        $order = $order->newQuery();

        if ($request->has('table')) {
            $order->where('table', $request->input('table'));
        }

        if ($request->has('customer')) {
            $order->where('customer', $request->input('customer'));
        }

        if ($request->has('day')) {

            $day = \DateTime::createFromFormat('d', $request->input('day'));

            $order->whereDay('ordered_at', $day);
        }

        if ($request->has('month')) {

            $month = \DateTime::createFromFormat('m', $request->input('month'));

            $order->whereMonth('ordered_at', $month);
        }

        return $order->get();
    }

    public function getOrdersByCustomer($customer) {

        $firstOrder = \DB::select('select * from orders where customer = :customer order by ordered_at asc limit 1', ['customer' => $customer]);
        $lastOrder = \DB::select('select * from orders where customer = :customer order by ordered_at desc limit 1', ['customer' => $customer]);

        $orderCount = Order::where('customer', $customer);

        $counter = 0;
        $ref_id = 0;

        foreach($orderCount->get('id') as $id) {
            $orderCounts = Order_item::where('order_id', $id['id'])->count();

            if($orderCounts > $counter) {
                $counter = $orderCounts;
                $ref_id = $id['id'];
            }
        }

        $greater_order = Order::where('id', $ref_id);

        $results = array('Primeiro pedido' => $firstOrder, 'Último pedido' => $lastOrder, 'Maior Pedido' => $greater_order->get());

        return $results;
    }
}
