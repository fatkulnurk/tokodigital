<?php

namespace Database\Seeders;

use App\Enums\PaymentMethodGroupEnum;
use App\Enums\PaymentMethodProviderEnum;
use App\Enums\RoleUserEnum;
use App\Models\PaymentMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'admin',
             'email' => 'admin@dibumi.com',
             'password' => Hash::make('12345678'),
             'role_user' => RoleUserEnum::ROLE_ADMIN
         ]);

        $paymentMethods = [
            [
                'id' => 'crypto-busd-bep20',
                'name' => 'BUSD (BEP20) - Binance Smartchain',
                'payment_code' => 'busd',
                'account_name' => '',
                'account_number' => "0x...",
                'min_amount' => 1,
                'max_amount' => 1000000000,
                'rate' => 15000,
                'is_with_random_amount' => true,
                'currency' => 'USD',
                'fee_in_idr' => 0,
                'fee_in_percent' => 0,
                'is_active' => false,
                'group' => PaymentMethodGroupEnum::GROUP_CRYPTO,
                'provider' => PaymentMethodProviderEnum::PROVIDER_INDODAX,
            ],
            [
                'id' => 'crypto-usdt-bep20',
                "name" => "USDT (BEP20) - Binance Smartchain",
                'payment_code' => "usdt",
                'account_name' => '',
                'account_number' => "0x...",
                'min_amount' => 1,
                'max_amount' => 1000000000,
                'rate' => 15000,
                'is_with_random_amount' => true,
                'currency' => 'USD',
                'fee_in_idr' => 0,
                'fee_in_percent' => 0,
                'is_active' => false,
                'group' => PaymentMethodGroupEnum::GROUP_CRYPTO,
                'provider' => PaymentMethodProviderEnum::PROVIDER_INDODAX,
            ],
            [
                'id' => 'crypto-usdt-trc20',
                'name' => 'USDT (TRC20) - Tron Network',
                'payment_code' => 'usdt',
                'account_name' => '',
                'account_number' => '',
                'min_amount' => 1,
                'max_amount' => 1000000000,
                'rate' => 15000,
                'is_with_random_amount' => true,
                'currency' => 'USD',
                'fee_in_idr' => 0,
                'fee_in_percent' => 0,
                'is_active' => false,
                'group' => PaymentMethodGroupEnum::GROUP_CRYPTO,
                'provider' => PaymentMethodProviderEnum::PROVIDER_INDODAX,
            ],
            [
                'id' => 'crypto-usdt-erc20',
                'name' => 'USDT (ERC20) - Ethereum Network',
                'payment_code' => 'usdt',
                'account_name' => '',
                'account_number' => '',
                'min_amount' => 1,
                'max_amount' => 1000000000,
                'rate' => 15000,
                'is_with_random_amount' => true,
                'currency' => 'USD',
                'fee_in_idr' => 0,
                'fee_in_percent' => 0,
                'is_active' => false,
                'group' => PaymentMethodGroupEnum::GROUP_CRYPTO,
                'provider' => PaymentMethodProviderEnum::PROVIDER_INDODAX,
            ],
            [
                'id' => 'crypto-usdc-erc20',
                'name' => 'USDC (ERC20) - Ethereum Network',
                'payment_code' => 'usdc',
                'account_name' => '',
                'account_number' => '',
                'min_amount' => 1,
                'max_amount' => 1000000000,
                'rate' => 15000,
                'is_with_random_amount' => true,
                'currency' => 'USD',
                'fee_in_idr' => 0,
                'fee_in_percent' => 0,
                'is_active' => false,
                'group' => PaymentMethodGroupEnum::GROUP_CRYPTO,
                'provider' => PaymentMethodProviderEnum::PROVIDER_INDODAX,
            ],
            [
                'id' => 'crypto-usdp-erc20',
                'name' => 'USDP Pax Dollar (ERC20) - Ethereum Network',
                'payment_code' => 'usdp',
                'account_name' => '',
                'account_number' => '',
                'min_amount' => 1,
                'max_amount' => 1000000000,
                'rate' => 15000,
                'is_with_random_amount' => true,
                'currency' => 'USD',
                'fee_in_idr' => 0,
                'fee_in_percent' => 0,
                'is_active' => false,
                'group' => PaymentMethodGroupEnum::GROUP_CRYPTO,
                'provider' => PaymentMethodProviderEnum::PROVIDER_INDODAX,
            ],
            [
                'id' => 'crypto-idk-xlm',
                'name' => 'IDK (XLM) - Stellar Lumen',
                'payment_code' => 'idk',
                'account_name' => '',
                'account_number' => 'GC4KAS6W2YCGJGLP633A6F6AKTCV4WSLMTMIQRSEQE5QRRVKSX7THV6S',
                'account_memo' => '487387',
                'min_amount' => 1,
                'max_amount' => 1000000000,
                'rate' => 1000,
                'is_with_random_amount' => true,
                'currency' => 'IDR',
                'fee_in_idr' => 0,
                'fee_in_percent' => 0,
                'is_active' => false,
                'group' => PaymentMethodGroupEnum::GROUP_CRYPTO,
                'provider' => PaymentMethodProviderEnum::PROVIDER_INDODAX,
            ],
            [
                'id' => 'crypto-idk-erc20',
                'name' => 'IDK (ERC20) - Ethereum Network',
                'payment_code' => 'idk',
                'account_name' => '',
                'account_number' => '0xc1660f4e0cd2c021405d4ab97c56a61f75bcea98',
                'min_amount' => 1,
                'max_amount' => 1000000000,
                'rate' => 1000,
                'is_with_random_amount' => true,
                'currency' => 'IDR',
                'fee_in_idr' => 0,
                'fee_in_percent' => 0,
                'is_active' => false,
                'group' => PaymentMethodGroupEnum::GROUP_CRYPTO,
                'provider' => PaymentMethodProviderEnum::PROVIDER_INDODAX,
            ],
            [
                'id' => 'duitku-vc',
                'name' => 'Kartu Kredit (Visa / Master Card / JCB)',
                'payment_code' => 'VC',
                'account_name' => '',
                'account_number' => '',
                'min_amount' => 10000,
                'max_amount' => 1000000000,
                'rate' => 1,
                'is_with_random_amount' => false,
                'currency' => 'IDR',
                'fee_in_idr' => 2500,
                'fee_in_percent' => 3.3,
                'is_active' => false,
                'group' => PaymentMethodGroupEnum::GROUP_CREDIT_CARD,
                'provider' => PaymentMethodProviderEnum::PROVIDER_DUITKU,
            ],
            [
                'id' => 'duitku-bc',
                'name' => 'BCA Virtual Account',
                'payment_code' => 'BC',
                'account_name' => '',
                'account_number' => '',
                'min_amount' => 10000,
                'max_amount' => 1000000000,
                'rate' => 1,
                'is_with_random_amount' => false,
                'currency' => 'IDR',
                'fee_in_idr' => 5000,
                'fee_in_percent' => 0,
                'is_active' => false,
                'group' => PaymentMethodGroupEnum::GROUP_VIRTUAL_ACCOUNT,
                'provider' => PaymentMethodProviderEnum::PROVIDER_DUITKU,
            ],
            [
                'id' => 'duitku-m2',
                'name' => 'Mandiri Virtual Account',
                'payment_code' => 'M2',
                'account_name' => '',
                'account_number' => '',
                'min_amount' => 10000,
                'max_amount' => 1000000000,
                'rate' => 1,
                'is_with_random_amount' => false,
                'currency' => 'IDR',
                'fee_in_idr' => 4000,
                'fee_in_percent' => 0,
                'is_active' => false,
                'group' => PaymentMethodGroupEnum::GROUP_VIRTUAL_ACCOUNT,
                'provider' => PaymentMethodProviderEnum::PROVIDER_DUITKU,
            ],
            [
                'id' => 'duitku-va',
                'name' => 'Maybank Virtual Account',
                'payment_code' => 'VA',
                'account_name' => '',
                'account_number' => '',
                'min_amount' => 10000,
                'max_amount' => 1000000000,
                'rate' => 1,
                'is_with_random_amount' => false,
                'currency' => 'IDR',
                'fee_in_idr' => 3000,
                'fee_in_percent' => 0,
                'is_active' => false,
                'group' => PaymentMethodGroupEnum::GROUP_VIRTUAL_ACCOUNT,
                'provider' => PaymentMethodProviderEnum::PROVIDER_DUITKU,
            ],
            [
                'id' => 'duitku-i1',
                'name' => 'BNI Virtual Account',
                'payment_code' => 'I1',
                'account_name' => '',
                'account_number' => '',
                'min_amount' => 10000,
                'max_amount' => 1000000000,
                'rate' => 1,
                'is_with_random_amount' => false,
                'currency' => 'IDR',
                'fee_in_idr' => 3000,
                'fee_in_percent' => 0,
                'is_active' => false,
                'group' => PaymentMethodGroupEnum::GROUP_VIRTUAL_ACCOUNT,
                'provider' => PaymentMethodProviderEnum::PROVIDER_DUITKU,
            ],
            [
                'id' => 'duitku-b1',
                'name' => 'CIMB Niaga Virtual Account',
                'payment_code' => 'B1',
                'account_name' => '',
                'account_number' => '',
                'min_amount' => 10000,
                'max_amount' => 1000000000,
                'rate' => 1,
                'is_with_random_amount' => false,
                'currency' => 'IDR',
                'fee_in_idr' => 3000,
                'fee_in_percent' => 0,
                'is_active' => false,
                'group' => PaymentMethodGroupEnum::GROUP_VIRTUAL_ACCOUNT,
                'provider' => PaymentMethodProviderEnum::PROVIDER_DUITKU,
            ],
            [
                'id' => 'duitku-bt',
                'name' => 'Permata Bank Virtual Account',
                'payment_code' => 'BT',
                'account_name' => '',
                'account_number' => '',
                'min_amount' => 10000,
                'max_amount' => 1000000000,
                'rate' => 1,
                'is_with_random_amount' => false,
                'currency' => 'IDR',
                'fee_in_idr' => 3000,
                'fee_in_percent' => 0,
                'is_active' => false,
                'group' => PaymentMethodGroupEnum::GROUP_VIRTUAL_ACCOUNT,
                'provider' => PaymentMethodProviderEnum::PROVIDER_DUITKU,
            ],
            [
                'id' => 'duitku-a1',
                'name' => 'ATM Bersama',
                'payment_code' => 'A1',
                'account_name' => '',
                'account_number' => '',
                'min_amount' => 10000,
                'max_amount' => 1000000000,
                'rate' => 1,
                'is_with_random_amount' => false,
                'currency' => 'IDR',
                'fee_in_idr' => 3000,
                'fee_in_percent' => 0,
                'is_active' => false,
                'group' => PaymentMethodGroupEnum::GROUP_VIRTUAL_ACCOUNT,
                'provider' => PaymentMethodProviderEnum::PROVIDER_DUITKU,
            ],
            [
                'id' => 'duitku-ag',
                'name' => 'Bank Artha Graha',
                'payment_code' => 'AG',
                'account_name' => '',
                'account_number' => '',
                'min_amount' => 10000,
                'max_amount' => 1000000000,
                'rate' => 1,
                'is_with_random_amount' => false,
                'currency' => 'IDR',
                'fee_in_idr' => 1500,
                'fee_in_percent' => 0,
                'is_active' => false,
                'group' => PaymentMethodGroupEnum::GROUP_VIRTUAL_ACCOUNT,
                'provider' => PaymentMethodProviderEnum::PROVIDER_DUITKU,
            ],
            [
                'id' => 'duitku-nc',
                'name' => 'Bank Neo Commerce/BNC',
                'payment_code' => 'NC',
                'account_name' => '',
                'account_number' => '',
                'min_amount' => 10000,
                'max_amount' => 1000000000,
                'rate' => 1,
                'is_with_random_amount' => false,
                'currency' => 'IDR',
                'fee_in_idr' => 3000,
                'fee_in_percent' => 0,
                'is_active' => false,
                'group' => PaymentMethodGroupEnum::GROUP_VIRTUAL_ACCOUNT,
                'provider' => PaymentMethodProviderEnum::PROVIDER_DUITKU,
            ],
            [
                'id' => 'duitku-br',
                'name' => 'BRI Virtual Akun',
                'payment_code' => 'BR',
                'account_name' => '',
                'account_number' => '',
                'min_amount' => 10000,
                'max_amount' => 1000000000,
                'rate' => 1,
                'is_with_random_amount' => false,
                'currency' => 'IDR',
                'fee_in_idr' => 3000,
                'fee_in_percent' => 0,
                'is_active' => false,
                'group' => PaymentMethodGroupEnum::GROUP_VIRTUAL_ACCOUNT,
                'provider' => PaymentMethodProviderEnum::PROVIDER_DUITKU,
            ],
            [
                'id' => 'duitku-s1',
                'name' => 'Bank Sahabat Sampoerna',
                'payment_code' => 'S1',
                'account_name' => '',
                'account_number' => '',
                'min_amount' => 10000,
                'max_amount' => 1000000000,
                'rate' => 1,
                'is_with_random_amount' => false,
                'currency' => 'IDR',
                'fee_in_idr' => 1500,
                'fee_in_percent' => 0,
                'is_active' => false,
                'group' => PaymentMethodGroupEnum::GROUP_VIRTUAL_ACCOUNT,
                'provider' => PaymentMethodProviderEnum::PROVIDER_DUITKU,
            ],
            [
                'id' => 'duitku-ft',
                'name' => 'Pegadaian/ALFA/Pos',
                'payment_code' => 'FT',
                'account_name' => '',
                'account_number' => '',
                'min_amount' => 10000,
                'max_amount' => 1000000000,
                'rate' => 1,
                'is_with_random_amount' => false,
                'currency' => 'IDR',
                'fee_in_idr' => 2500,
                'fee_in_percent' => 0,
                'is_active' => false,
                'group' => PaymentMethodGroupEnum::GROUP_RETAIL,
                'provider' => PaymentMethodProviderEnum::PROVIDER_DUITKU,
            ],
            [
                'id' => 'duitku-a2',
                'name' => 'POS Indonesia',
                'payment_code' => 'A2',
                'account_name' => '',
                'account_number' => '',
                'min_amount' => 10000,
                'max_amount' => 1000000000,
                'rate' => 1,
                'is_with_random_amount' => false,
                'currency' => 'IDR',
                'fee_in_idr' => 2500,
                'fee_in_percent' => 0,
                'is_active' => false,
                'group' => PaymentMethodGroupEnum::GROUP_RETAIL,
                'provider' => PaymentMethodProviderEnum::PROVIDER_DUITKU,
            ],
            [
                'id' => 'duitku-ir',
                'name' => 'Indomaret',
                'payment_code' => 'IR',
                'account_name' => '',
                'account_number' => '',
                'min_amount' => 10000,
                'max_amount' => 1000000000,
                'rate' => 1,
                'is_with_random_amount' => false,
                'currency' => 'IDR',
                'fee_in_idr' => 1000,
                'fee_in_percent' => 1.5,
                'is_active' => false,
                'group' => PaymentMethodGroupEnum::GROUP_RETAIL,
                'provider' => PaymentMethodProviderEnum::PROVIDER_DUITKU,
            ],
            [
                'id' => 'duitku-dn',
                'name' => 'Indodana Paylater',
                'payment_code' => 'DN',
                'account_name' => '',
                'account_number' => '',
                'min_amount' => 10000,
                'max_amount' => 1000000000,
                'rate' => 1,
                'is_with_random_amount' => false,
                'currency' => 'IDR',
                'fee_in_idr' => 0,
                'fee_in_percent' => 1.4,
                'is_active' => false,
                'group' => PaymentMethodGroupEnum::GROUP_KREDIT,
                'provider' => PaymentMethodProviderEnum::PROVIDER_DUITKU,
            ],
            [
                'id' => 'duitku-sp',
                'name' => 'Shopee Pay',
                'payment_code' => 'SP',
                'account_name' => '',
                'account_number' => '',
                'min_amount' => 10000,
                'max_amount' => 1000000000,
                'rate' => 1,
                'is_with_random_amount' => false,
                'currency' => 'IDR',
                'fee_in_idr' => 0,
                'fee_in_percent' => 4,
                'is_active' => false,
                'group' => PaymentMethodGroupEnum::GROUP_QRIS,
                'provider' => PaymentMethodProviderEnum::PROVIDER_DUITKU,
            ],
            [
                'id' => 'duitku-lq',
                'name' => 'LinkAja',
                'payment_code' => 'LQ',
                'account_name' => '',
                'account_number' => '',
                'min_amount' => 10000,
                'max_amount' => 1000000000,
                'rate' => 1,
                'is_with_random_amount' => false,
                'currency' => 'IDR',
                'fee_in_idr' => 0,
                'fee_in_percent' => 0.78,
                'is_active' => false,
                'group' => PaymentMethodGroupEnum::GROUP_QRIS,
                'provider' => PaymentMethodProviderEnum::PROVIDER_DUITKU,
            ],
            [
                'id' => 'duitku-nq',
                'name' => 'Nobu',
                'payment_code' => 'NQ',
                'account_name' => '',
                'account_number' => '',
                'min_amount' => 10000,
                'max_amount' => 1000000000,
                'rate' => 1,
                'is_with_random_amount' => false,
                'currency' => 'IDR',
                'fee_in_idr' => 0,
                'fee_in_percent' => 0.7,
                'is_active' => false,
                'group' => PaymentMethodGroupEnum::GROUP_QRIS,
                'provider' => PaymentMethodProviderEnum::PROVIDER_DUITKU,
            ],
            [
                'id' => 'duitku-sl',
                'name' => 'Shopee Pay Account Link',
                'payment_code' => 'SL',
                'account_name' => '',
                'account_number' => '',
                'min_amount' => 10000,
                'max_amount' => 1000000000,
                'rate' => 1,
                'is_with_random_amount' => false,
                'currency' => 'IDR',
                'fee_in_idr' => 0,
                'fee_in_percent' => 4,
                'is_active' => false,
                'group' => PaymentMethodGroupEnum::GROUP_EWALLET,
                'provider' => PaymentMethodProviderEnum::PROVIDER_DUITKU,
            ],
            [
                'id' => 'duitku-da',
                'name' => 'DANA',
                'payment_code' => 'DA',
                'account_name' => '',
                'account_number' => '',
                'min_amount' => 10000,
                'max_amount' => 1000000000,
                'rate' => 1,
                'is_with_random_amount' => false,
                'currency' => 'IDR',
                'fee_in_idr' => 0,
                'fee_in_percent' => 1.68,
                'is_active' => false,
                'group' => PaymentMethodGroupEnum::GROUP_EWALLET,
                'provider' => PaymentMethodProviderEnum::PROVIDER_DUITKU,
            ],
            [
                'id' => 'duitku-la',
                'name' => 'LinkAja Apps (Percentage Fee)',
                'payment_code' => 'LA',
                'account_name' => '',
                'account_number' => '',
                'min_amount' => 10000,
                'max_amount' => 1000000000,
                'rate' => 1,
                'is_with_random_amount' => false,
                'currency' => 'IDR',
                'fee_in_idr' => 0,
                'fee_in_percent' => 1.68,
                'is_active' => false,
                'group' => PaymentMethodGroupEnum::GROUP_EWALLET,
                'provider' => PaymentMethodProviderEnum::PROVIDER_DUITKU,
            ],
            [
                'id' => 'duitku-lf',
                'name' => 'LinkAja Apps (Fixed Fee)',
                'payment_code' => 'LF',
                'account_name' => '',
                'account_number' => '',
                'min_amount' => 10000,
                'max_amount' => 1000000000,
                'rate' => 1,
                'is_with_random_amount' => false,
                'currency' => 'IDR',
                'fee_in_idr' => 3330,
                'fee_in_percent' => 0,
                'is_active' => false,
                'group' => PaymentMethodGroupEnum::GROUP_EWALLET,
                'provider' => PaymentMethodProviderEnum::PROVIDER_DUITKU,
            ],
            [
                'id' => 'duitku-sa',
                'name' => 'Shopee Pay Apps (Support Void)',
                'payment_code' => 'SA',
                'account_name' => '',
                'account_number' => '',
                'min_amount' => 10000,
                'max_amount' => 1000000000,
                'rate' => 1,
                'is_with_random_amount' => false,
                'currency' => 'IDR',
                'fee_in_idr' => 0,
                'fee_in_percent' => 4,
                'is_active' => false,
                'group' => PaymentMethodGroupEnum::GROUP_EWALLET,
                'provider' => PaymentMethodProviderEnum::PROVIDER_DUITKU,
            ],
            [
                'id' => 'duitku-ov',
                'name' => 'OVO (Support Void)',
                'payment_code' => 'OV',
                'account_name' => '',
                'account_number' => '',
                'min_amount' => 10000,
                'max_amount' => 1000000000,
                'rate' => 1,
                'is_with_random_amount' => false,
                'currency' => 'IDR',
                'fee_in_idr' => 0,
                'fee_in_percent' => 3.1,
                'is_active' => false,
                'group' => PaymentMethodGroupEnum::GROUP_EWALLET,
                'provider' => PaymentMethodProviderEnum::PROVIDER_DUITKU,
            ]
        ];

        foreach ($paymentMethods as $paymentMethod) {
            PaymentMethod::create($paymentMethod);
        }
    }
}
