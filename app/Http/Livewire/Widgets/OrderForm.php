<?php

namespace App\Http\Livewire\Widgets;

use App\Models\PaymentMethod;
use App\Services\PaymentMethods\PaymentMethodService;
use App\Services\Products\ProductService;
use App\Services\Transactions\TransactionService;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class OrderForm extends Component
{
    public string $selectedCategory = '';
    public string $selectedBrand = '';
    public string $selectedProductId = '';
    public string $selectedPaymentMethod = '';

    public string $target = '';
    public string $customerContact = '';

    private function resetAll()
    {
        $this->selectedBrand = '';
        $this->selectedProduct = '';

        $this->target = '';
        $this->customerContact = '';
        $this->selectedPaymentMethod = '';
    }

    public function updatingSelectedCategory()
    {
        $this->resetAll();
    }

    public function order()
    {
        $this->validate([
            'target' => 'required|string|max:191',
            'selectedPaymentMethod' => 'required|string|max:191',
            'customerContact' => 'required|email|max:191'
        ]);

        $transactionService = (new TransactionService());
        $transaction = $transactionService->createOrder(
            $this->selectedProductId,
            $this->target,
            $this->selectedPaymentMethod,
            $this->customerContact
        );

        return redirect()->route('transactions.show', $transaction->id);
    }

    public function render()
    {
        $productService = (new ProductService());

        $product = blank($this->selectedProductId) ? []: $productService->getProduct($this->selectedProductId);
        $productPrice = optional($product)->price ?? 0;
        $paymentMethods = (new PaymentMethodService())->getAll($productPrice);

        return view('livewire.widgets.order-form', [
            'categories' => $productService->getCategories(),
            'brands' => blank($this->selectedCategory) ? [] : $productService->getBrands($this->selectedCategory),
            'products' => (blank($this->selectedBrand)) ? [] : $productService->getProducts(
                $this->selectedCategory,
                $this->selectedBrand
            ),
            'selectProduct' => $product,
            'paymentMethods' => $paymentMethods
        ]);
    }
}
