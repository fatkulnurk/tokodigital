<?php

namespace App\Mail;

use App\Models\Transaction;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TransactionPaid extends Mailable
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
            ->subject('Pembayaran Pesanan #' . $this->transaction->id . ' Telah Kami Terima')
            ->markdown('emails.transactions.paid', [
                'url' => route('transactions.show', $this->transaction->id)
            ]);
    }
}
