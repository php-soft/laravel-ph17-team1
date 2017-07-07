<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Order;
use Cart;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $orders;
    public function __construct(Order $order)
    {
          $this->order = $order;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $content = Cart::content();
        // dd($content);
        $subtotal = Cart::subtotal(0, '', '');
        $this->order->activation_link = route('xac-nhan-dat-hang', $this->order->id);
        return $this->markdown('emails.send')
            ->with('subtotal', $subtotal)
            ->with('content', $content)
            ->with([
                'order' => $this->order,
            ]);
    }
}
