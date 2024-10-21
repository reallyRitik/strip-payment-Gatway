<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * Subscriptions allow you to charge a customer on a recurring basis.
 *
 * Related guide: <a href="https://stripe.com/docs/billing/subscriptions/creating">Creating subscriptions</a>
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|string|\Stripe\Application $application ID of the Connect Application that created the subscription.
 * @property null|float $application_fee_percent A non-negative decimal between 0 and 100, with at most two decimal places. This represents the percentage of the subscription invoice total that will be transferred to the application owner's Stripe account.
 * @property \Stripe\StripeObject $automatic_tax
 * @property int $billing_cycle_anchor The reference point that aligns future <a href="https://stripe.com/docs/subscriptions/billing-cycle">billing cycle</a> dates. It sets the day of week for <code>week</code> intervals, the day of month for <code>month</code> and <code>year</code> intervals, and the month of year for <code>year</code> intervals. The timestamp is in UTC format.
 * @property null|\Stripe\StripeObject $billing_cycle_anchor_config The fixed values used to calculate the <code>billing_cycle_anchor</code>.
 * @property null|\Stripe\StripeObject $billing_thresholds Define thresholds at which an invoice will be sent, and the subscription advanced to a new billing period
 * @property null|int $cancel_at A date in the future at which the subscription will automatically get canceled
 * @property bool $cancel_at_period_end Whether this subscription will (if <code>status=active</code>) or did (if <code>status=canceled</code>) cancel at the end of the current billing period.
 * @property null|int $canceled_at If the subscription has been canceled, the date of that cancellation. If the subscription was canceled with <code>cancel_at_period_end</code>, <code>canceled_at</code> will reflect the time of the most recent update request, not the end of the subscription period when the subscription is automatically moved to a canceled state.
 * @property null|\Stripe\StripeObject $cancellation_details Details about why this subscription was cancelled
 * @property string $collection_method Either <code>charge_automatically</code>, or <code>send_invoice</code>. When charging automatically, Stripe will attempt to pay this subscription at the end of the cycle using the default source attached to the customer. When sending an invoice, Stripe will email your customer an invoice with payment instructions and mark the subscription as <code>active</code>.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property int $current_period_end End of the current period that the subscription has been invoiced for. At the end of this period, a new invoice will be created.
 * @property int $current_period_start Start of the current period that the subscription has been invoiced for.
 * @property string|\Stripe\Customer $customer ID of the customer who owns the subscription.
 * @property null|int $days_until_due Number of days a customer has to pay invoices generated by this subscription. This value will be <code>null</code> for subscriptions where <code>collection_method=charge_automatically</code>.
 * @property null|string|\Stripe\PaymentMethod $default_payment_method ID of the default payment method for the subscription. It must belong to the customer associated with the subscription. This takes precedence over <code>default_source</code>. If neither are set, invoices will use the customer's <a href="https://stripe.com/docs/api/customers/object#customer_object-invoice_settings-default_payment_method">invoice_settings.default_payment_method</a> or <a href="https://stripe.com/docs/api/customers/object#customer_object-default_source">default_source</a>.
 * @property null|string|\Stripe\Account|\Stripe\BankAccount|\Stripe\Card|\Stripe\Source $default_source ID of the default payment source for the subscription. It must belong to the customer associated with the subscription and be in a chargeable state. If <code>default_payment_method</code> is also set, <code>default_payment_method</code> will take precedence. If neither are set, invoices will use the customer's <a href="https://stripe.com/docs/api/customers/object#customer_object-invoice_settings-default_payment_method">invoice_settings.default_payment_method</a> or <a href="https://stripe.com/docs/api/customers/object#customer_object-default_source">default_source</a>.
 * @property null|\Stripe\TaxRate[] $default_tax_rates The tax rates that will apply to any subscription item that does not have <code>tax_rates</code> set. Invoices created will have their <code>default_tax_rates</code> populated from the subscription.
 * @property null|string $description The subscription's description, meant to be displayable to the customer. Use this field to optionally store an explanation of the subscription for rendering in Stripe surfaces and certain local payment methods UIs.
 * @property null|\Stripe\Discount $discount Describes the current discount applied to this subscription, if there is one. When billing, a discount applied to a subscription overrides a discount applied on a customer-wide basis. This field has been deprecated and will be removed in a future API version. Use <code>discounts</code> instead.
 * @property (string|\Stripe\Discount)[] $discounts The discounts applied to the subscription. Subscription item discounts are applied before subscription discounts. Use <code>expand[]=discounts</code> to expand each discount.
 * @property null|int $ended_at If the subscription has ended, the date the subscription ended.
 * @property \Stripe\StripeObject $invoice_settings
 * @property \Stripe\Collection<\Stripe\SubscriptionItem> $items List of subscription items, each with an attached price.
 * @property null|string|\Stripe\Invoice $latest_invoice The most recent invoice this subscription has generated.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property \Stripe\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|int $next_pending_invoice_item_invoice Specifies the approximate timestamp on which any pending invoice items will be billed according to the schedule provided at <code>pending_invoice_item_interval</code>.
 * @property null|string|\Stripe\Account $on_behalf_of The account (if any) the charge was made on behalf of for charges associated with this subscription. See the Connect documentation for details.
 * @property null|\Stripe\StripeObject $pause_collection If specified, payment collection for this subscription will be paused. Note that the subscription status will be unchanged and will not be updated to <code>paused</code>. Learn more about <a href="/billing/subscriptions/pause-payment">pausing collection</a>.
 * @property null|\Stripe\StripeObject $payment_settings Payment settings passed on to invoices created by the subscription.
 * @property null|\Stripe\StripeObject $pending_invoice_item_interval Specifies an interval for how often to bill for any pending invoice items. It is analogous to calling <a href="https://stripe.com/docs/api#create_invoice">Create an invoice</a> for the given subscription at the specified interval.
 * @property null|string|\Stripe\SetupIntent $pending_setup_intent You can use this <a href="https://stripe.com/docs/api/setup_intents">SetupIntent</a> to collect user authentication when creating a subscription without immediate payment or updating a subscription's payment method, allowing you to optimize for off-session payments. Learn more in the <a href="https://stripe.com/docs/billing/migration/strong-customer-authentication#scenario-2">SCA Migration Guide</a>.
 * @property null|\Stripe\StripeObject $pending_update If specified, <a href="https://stripe.com/docs/billing/subscriptions/pending-updates">pending updates</a> that will be applied to the subscription once the <code>latest_invoice</code> has been paid.
 * @property null|string|\Stripe\SubscriptionSchedule $schedule The schedule attached to the subscription
 * @property int $start_date Date when the subscription was first created. The date might differ from the <code>created</code> date due to backdating.
 * @property string $status <p>Possible values are <code>incomplete</code>, <code>incomplete_expired</code>, <code>trialing</code>, <code>active</code>, <code>past_due</code>, <code>canceled</code>, <code>unpaid</code>, or <code>paused</code>.</p><p>For <code>collection_method=charge_automatically</code> a subscription moves into <code>incomplete</code> if the initial payment attempt fails. A subscription in this status can only have metadata and default_source updated. Once the first invoice is paid, the subscription moves into an <code>active</code> status. If the first invoice is not paid within 23 hours, the subscription transitions to <code>incomplete_expired</code>. This is a terminal status, the open invoice will be voided and no further invoices will be generated.</p><p>A subscription that is currently in a trial period is <code>trialing</code> and moves to <code>active</code> when the trial period is over.</p><p>A subscription can only enter a <code>paused</code> status <a href="/billing/subscriptions/trials#create-free-trials-without-payment">when a trial ends without a payment method</a>. A <code>paused</code> subscription doesn't generate invoices and can be resumed after your customer adds their payment method. The <code>paused</code> status is different from <a href="/billing/subscriptions/pause-payment">pausing collection</a>, which still generates invoices and leaves the subscription's status unchanged.</p><p>If subscription <code>collection_method=charge_automatically</code>, it becomes <code>past_due</code> when payment is required but cannot be paid (due to failed payment or awaiting additional user actions). Once Stripe has exhausted all payment retry attempts, the subscription will become <code>canceled</code> or <code>unpaid</code> (depending on your subscriptions settings).</p><p>If subscription <code>collection_method=send_invoice</code> it becomes <code>past_due</code> when its invoice is not paid by the due date, and <code>canceled</code> or <code>unpaid</code> if it is still not paid by an additional deadline after that. Note that when a subscription has a status of <code>unpaid</code>, no subsequent invoices will be attempted (invoices will be created, but then immediately automatically closed). After receiving updated payment information from a customer, you may choose to reopen and pay their closed invoices.</p>
 * @property null|string|\Stripe\TestHelpers\TestClock $test_clock ID of the test clock this subscription belongs to.
 * @property null|\Stripe\StripeObject $transfer_data The account (if any) the subscription's payments will be attributed to for tax reporting, and where funds from each payment will be transferred to for each of the subscription's invoices.
 * @property null|int $trial_end If the subscription has a trial, the end of that trial.
 * @property null|\Stripe\StripeObject $trial_settings Settings related to subscription trials.
 * @property null|int $trial_start If the subscription has a trial, the beginning of that trial.
 */
class Subscription extends ApiResource
{
    const OBJECT_NAME = 'subscription';

    use ApiOperations\Update;

    const COLLECTION_METHOD_CHARGE_AUTOMATICALLY = 'charge_automatically';
    const COLLECTION_METHOD_SEND_INVOICE = 'send_invoice';

    const STATUS_ACTIVE = 'active';
    const STATUS_CANCELED = 'canceled';
    const STATUS_INCOMPLETE = 'incomplete';
    const STATUS_INCOMPLETE_EXPIRED = 'incomplete_expired';
    const STATUS_PAST_DUE = 'past_due';
    const STATUS_PAUSED = 'paused';
    const STATUS_TRIALING = 'trialing';
    const STATUS_UNPAID = 'unpaid';

    /**
     * Creates a new subscription on an existing customer. Each customer can have up to
     * 500 active or scheduled subscriptions.
     *
     * When you create a subscription with
     * <code>collection_method=charge_automatically</code>, the first invoice is
     * finalized as part of the request. The <code>payment_behavior</code> parameter
     * determines the exact behavior of the initial payment.
     *
     * To start subscriptions where the first invoice always begins in a
     * <code>draft</code> status, use <a
     * href="/docs/billing/subscriptions/subscription-schedules#managing">subscription
     * schedules</a> instead. Schedules provide the flexibility to model more complex
     * billing configurations that change over time.
     *
     * @param null|array $params
     * @param null|array|string $options
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Subscription the created resource
     */
    public static function create($params = null, $options = null)
    {
        self::_validateParams($params);
        $url = static::classUrl();

        list($response, $opts) = static::_staticRequest('post', $url, $params, $options);
        $obj = \Stripe\Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * By default, returns a list of subscriptions that have not been canceled. In
     * order to list canceled subscriptions, specify <code>status=canceled</code>.
     *
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Subscription> of ApiResources
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieves the subscription with the given ID.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Subscription
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }

    /**
     * Updates an existing subscription to match the specified parameters. When
     * changing prices or quantities, we optionally prorate the price we charge next
     * month to make up for any price changes. To preview how the proration is
     * calculated, use the <a href="/docs/api/invoices/create_preview">create
     * preview</a> endpoint.
     *
     * By default, we prorate subscription changes. For example, if a customer signs up
     * on May 1 for a <currency>100</currency> price, they’ll be billed
     * <currency>100</currency> immediately. If on May 15 they switch to a
     * <currency>200</currency> price, then on June 1 they’ll be billed
     * <currency>250</currency> (<currency>200</currency> for a renewal of her
     * subscription, plus a <currency>50</currency> prorating adjustment for half of
     * the previous month’s <currency>100</currency> difference). Similarly, a
     * downgrade generates a credit that is applied to the next invoice. We also
     * prorate when you make quantity changes.
     *
     * Switching prices does not normally change the billing date or generate an
     * immediate charge unless:
     *
     * <ul> <li>The billing interval is changed (for example, from monthly to
     * yearly).</li> <li>The subscription moves from free to paid.</li> <li>A trial
     * starts or ends.</li> </ul>
     *
     * In these cases, we apply a credit for the unused time on the previous price,
     * immediately charge the customer using the new price, and reset the billing date.
     * Learn about how <a
     * href="/billing/subscriptions/upgrade-downgrade#immediate-payment">Stripe
     * immediately attempts payment for subscription changes</a>.
     *
     * If you want to charge for an upgrade immediately, pass
     * <code>proration_behavior</code> as <code>always_invoice</code> to create
     * prorations, automatically invoice the customer for those proration adjustments,
     * and attempt to collect payment. If you pass <code>create_prorations</code>, the
     * prorations are created but not automatically invoiced. If you want to bill the
     * customer for the prorations before the subscription’s renewal date, you need to
     * manually <a href="/docs/api/invoices/create">invoice the customer</a>.
     *
     * If you don’t want to prorate, set the <code>proration_behavior</code> option to
     * <code>none</code>. With this option, the customer is billed
     * <currency>100</currency> on May 1 and <currency>200</currency> on June 1.
     * Similarly, if you set <code>proration_behavior</code> to <code>none</code> when
     * switching between different billing intervals (for example, from monthly to
     * yearly), we don’t generate any credits for the old subscription’s unused time.
     * We still reset the billing date and bill immediately for the new subscription.
     *
     * Updating the quantity on a subscription many times in an hour may result in <a
     * href="/docs/rate-limits">rate limiting</a>. If you need to bill for a frequently
     * changing quantity, consider integrating <a
     * href="/docs/billing/subscriptions/usage-based">usage-based billing</a> instead.
     *
     * @param string $id the ID of the resource to update
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Subscription the updated resource
     */
    public static function update($id, $params = null, $opts = null)
    {
        self::_validateParams($params);
        $url = static::resourceUrl($id);

        list($response, $opts) = static::_staticRequest('post', $url, $params, $opts);
        $obj = \Stripe\Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    use ApiOperations\Delete {
        delete as protected _delete;
      }

    public static function getSavedNestedResources()
    {
        static $savedNestedResources = null;
        if (null === $savedNestedResources) {
            $savedNestedResources = new Util\Set([
                'source',
            ]);
        }

        return $savedNestedResources;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Subscription the updated subscription
     */
    public function deleteDiscount($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/discount';
        list($response, $opts) = $this->_request('delete', $url, $params, $opts);
        $this->refreshFrom(['discount' => null], $opts, true);

        return $this;
    }

    const PAYMENT_BEHAVIOR_ALLOW_INCOMPLETE = 'allow_incomplete';
    const PAYMENT_BEHAVIOR_DEFAULT_INCOMPLETE = 'default_incomplete';
    const PAYMENT_BEHAVIOR_ERROR_IF_INCOMPLETE = 'error_if_incomplete';
    const PAYMENT_BEHAVIOR_PENDING_IF_INCOMPLETE = 'pending_if_incomplete';

    const PRORATION_BEHAVIOR_ALWAYS_INVOICE = 'always_invoice';
    const PRORATION_BEHAVIOR_CREATE_PRORATIONS = 'create_prorations';
    const PRORATION_BEHAVIOR_NONE = 'none';

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Subscription the canceled subscription
     */
    public function cancel($params = null, $opts = null)
    {
        $url = $this->instanceUrl();
        list($response, $opts) = $this->_request('delete', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Subscription the resumed subscription
     */
    public function resume($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/resume';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\SearchResult<\Stripe\Subscription> the subscription search results
     */
    public static function search($params = null, $opts = null)
    {
        $url = '/v1/subscriptions/search';

        return static::_requestPage($url, \Stripe\SearchResult::class, $params, $opts);
    }
}
