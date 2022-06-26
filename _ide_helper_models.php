<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\PaymentMethod
 *
 * @property string $id
 * @property string $name
 * @property string|null $payment_code
 * @property string|null $account_name
 * @property string|null $account_number
 * @property string|null $account_memo
 * @property int $min_amount
 * @property int $max_amount
 * @property int $rate
 * @property bool $is_with_random_amount
 * @property string $currency
 * @property int|null $fee_in_idr
 * @property float|null $fee_in_percent
 * @property bool $is_active
 * @property string $group
 * @property int $provider
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod query()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereAccountMemo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereAccountName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereAccountNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereFeeInIdr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereFeeInPercent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereIsWithRandomAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereMaxAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereMinAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod wherePaymentCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereUpdatedAt($value)
 */
	class PaymentMethod extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Product
 *
 * @property string $id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $cluster
 * @property bool $is_available_checking
 * @property string|null $category
 * @property string|null $category_slug
 * @property string|null $brand
 * @property string|null $brand_slug
 * @property string|null $type
 * @property string|null $type_slug
 * @property int|null $price
 * @property int|null $stock
 * @property bool $is_multi
 * @property string $start_cut_off
 * @property string $end_cut_off
 * @property int $is_available
 * @property array|null $details
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product prepaid()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereBrandSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCategorySlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCluster($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereEndCutOff($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereIsAvailable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereIsAvailableChecking($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereIsMulti($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereStartCutOff($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTypeSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 */
	class Product extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Transaction
 *
 * @property string $id
 * @property string|null $user_id
 * @property string $payment_method_id
 * @property string $cluster
 * @property string $product_id
 * @property string $product_name
 * @property int $product_price
 * @property string $target
 * @property int $status
 * @property string|null $sn
 * @property string|null $note
 * @property mixed|null $description
 * @property array|null $reply
 * @property string|null $reff_id
 * @property string|null $customer_contact
 * @property int|null $cc_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\PaymentMethod|null $paymentMethod
 * @property-read \App\Models\TransactionPayment|null $transactionPayment
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereCcType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereCluster($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereCustomerContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction wherePaymentMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereProductName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereProductPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereReffId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereReply($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereSn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereTarget($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereUserId($value)
 */
	class Transaction extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TransactionPayment
 *
 * @property string $id
 * @property string $transaction_id
 * @property string|null $reff_id
 * @property string $currency
 * @property string|null $payment_name
 * @property string|null $payment_number
 * @property string|null $payment_url
 * @property string|null $unique_amount
 * @property string|null $fee
 * @property string $total
 * @property string|null $expired_at
 * @property string|null $paid_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionPayment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionPayment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionPayment query()
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionPayment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionPayment whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionPayment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionPayment whereExpiredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionPayment whereFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionPayment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionPayment wherePaidAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionPayment wherePaymentName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionPayment wherePaymentNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionPayment wherePaymentUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionPayment whereReffId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionPayment whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionPayment whereTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionPayment whereUniqueAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionPayment whereUpdatedAt($value)
 */
	class TransactionPayment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property string $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property int $role_user
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRoleUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

