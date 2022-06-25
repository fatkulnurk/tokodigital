<?php

namespace App\Mail;

use App\Models\Transaction;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TransactionDelivered extends Mailable
{
    use Queueable, SerializesModels;

    private Transaction $transaction;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->to($this->transaction->customer_contact)
            ->subject('Pesanan #' . $this->transaction->id . ' Telah kami kirim')
            ->markdown('emails.transactions.delivered', [
                'url' => route('transactions.show', $this->transaction->id)
            ]);
    }
}
