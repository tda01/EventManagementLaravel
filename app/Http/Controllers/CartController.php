<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TicketType;
use App\Models\Event;
class CartController extends Controller
{
    public function index(Request $request)
    {

        $tickets = TicketType::with('event')->paginate(10);
        $value = ($request->input('page', 1) - 1) * 10;
        return view('tickets.list', compact('tickets'))->with('i', $value);
    }

    public function viewCart()
    {
        $cartItems = session()->get('cart', []);
        return view('cart', compact('cartItems'));

    }

    public function addToCart($id)
    {
        $ticket = TicketType::with('event')->findOrFail($id);

        if(!$ticket) {
            abort(404);
        }


        $cartItems = session()->get('cart');


        if (isset($cartItems[$id])) {
            $cartItems[$id]['quantity'] = isset($cartItems[$id]['quantity']) ? $cartItems[$id]['quantity'] + 1 : 1;
        } else {


            $cartItems[$id] = [
                'event' => $ticket->event->title,
                'description' => $ticket->description,
                'price' => $ticket->price,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cartItems);

        return redirect()->back()->with('success', 'Ticket added in cart!');
    }

    public function removeFromCart(Request $request)
    {

        if($request->id) {
            $cartItems = session()->get('cart');
            if(isset($cartItems[$request->id])) {
                unset($cartItems[$request->id]);
                session()->put('cart', $cartItems);
            }
            return redirect()->back()->with('success', 'Tickets removed!');
        }

    }

    public function updateCart(Request $request)
    {
        if($request->id and $request->quantity) {
            $cartItems = session()->get('cart');
            $cartItems[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cartItems);
        }
        return redirect()->back()->with('success', 'Ticket quantity updated!');

    }

}
