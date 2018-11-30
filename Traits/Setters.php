<?php
/**
 * This file is part of consoletvs/invoices.
 *
 * (c) Erik Campobadal <soc@erik.cat>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ConsoleTVs\Invoices\Traits;

use Carbon\Carbon;
use Illuminate\Support\Collection;

/**
 * This is the Setters trait.
 *
 * @author Erik Campobadal <soc@erik.cat>
 */
trait Setters
{
    /**
     * Set the invoice name.
     *
     * @method name
     *
     * @param string $name
     *
     * @return self
     */
    public function name($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Set the invoice number.
     *
     * @method number
     *
     * @param int $number
     *
     * @return self
     */
    public function number($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Set the order number.
     *
     * @method order
     *
     * @param int $number
     *
     * @return self
     */
    public function order($number)
    {
        $this->order = $number;

        return $this;
    }

    /**
     * Set the invoice decimal precision.
     *
     * @method decimals
     *
     * @param int $decimals
     *
     * @return self
     */
    public function decimals($decimals)
    {
        $this->decimals = $decimals;

        return $this;
    }

    /**
     *
     * Set IC DPH.
     *
     * @method icDph
     *
     * @param string $value
     *
     * @return self
     */
    public function icDph($value)
    {
        $this->ic_dph = $value;

        return $this;
    }

    /**
     *
     * Set price without VAT.
     *
     * @method price
     *
     * @param float $price
     *
     * @return self
     */
    public function price($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     *
     * Set VAT.
     *
     * @method tax
     *
     * @param float $tax
     *
     * @return self
     */
    public function tax($tax)
    {
        $this->tax = $tax;

        return $this;
    }

    /**
     *
     * Set VAT rate.
     *
     * @method rate
     *
     * @param float $rate
     *
     * @return self
     */
    public function rate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     *
     * Set payments.
     *
     * @method payments
     *
     * @param float $payments
     *
     * @return self
     */
    public function payments($payments)
    {
        $this->payments = $payments;

        return $this;
    }

    /**
     * Set the type of delivery, payment.
     *
     * @method types
     *
     * @param array $types
     *
     * @return self
     */
    public function types($types)
    {
        $this->types = Collection::make($types);

        return $this;
    }

    /**
     * Set the invoice logo URL.
     *
     * @method logo
     *
     * @param string $logo_url
     *
     * @return self
     */
    public function logo($logo_url)
    {
        $this->logo = $logo_url;

        return $this;
    }

    /**
     * Set the invoice dates.
     *
     * @method dates
     *
     * @param array $dates
     *
     * @return self
     */
    public function dates($dates)
    {
        $this->dates = Collection::make($dates);

        return $this;
    }

    /**
     * Set the invoice payment info.
     *
     * @method payment
     *
     * @param array $items
     *
     * @return self
     */
    public function payment($payment_info)
    {
        $this->payment_info = Collection::make($payment_info);

        return $this;
    }

    /**
     * Set the invoice notes.
     *
     * @method notes
     *
     * @param string $notes
     *
     * @return self
     */
    public function notes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Set the invoice business details.
     *
     * @method business
     *
     * @param array $details
     *
     * @return self
     */
    public function business($details)
    {
        $this->business_details = Collection::make($details);

        return $this;
    }

    /**
     * Set the invoice customer details.
     *
     * @method customer
     *
     * @param array $details
     *
     * @return self
     */
    public function customer($details)
    {
        $this->customer_details = Collection::make($details);

        return $this;
    }

    /**
     * Set the invoice currency.
     *
     * @method currency
     *
     * @param string $currency
     *
     * @return self
     */
    public function currency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Set the invoice signature.
     *
     * @method signature
     *
     * @param string $signature
     *
     * @return self
     */
    public function signature($signature)
    {
        $this->signature = $signature;

        return $this;
    }
}
