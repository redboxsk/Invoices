<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $invoice->name }}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
        body { font-size: 11px; }
        h1,h2,h3,h4,h5,p,span,div { font-family: DejaVu Sans; }
    </style>
</head>
<body>
<div style="width:500pt;">
    <div class="row">
        <div class="col-xs-6">
            <img class="img-rounded" height="{{ $invoice->logo_height }}" src="{{ $invoice->logo }}">
        </div>
        <div class="col-xs-6">
            <h2>@lang('invoices::invoices.invoice') {{ $invoice->number }}</h2>
            <h5>@lang('invoices::invoices.order') {{ $invoice->order }}</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6">
            <h4>@lang('invoices::invoices.supplier')</h4>
            {{ $invoice->business_details->get('name') }}<br />
            {{ $invoice->business_details->get('street') }}<br />
            {{ $invoice->business_details->get('zip') }} {{ $invoice->business_details->get('city') }}<br />
            {{ $invoice->business_details->get('country') }}<br />
            @lang('invoices::invoices.ico'): {{ $invoice->business_details->get('ico') }}<br />
            @if($invoice->business_details->get('dic')) @lang('invoices::invoices.dic'): {{ $invoice->business_details->get('dic') }}<br /> @endif
            @if($invoice->ic_dph || $invoice->business_details->get('ic_dph')) @lang('invoices::invoices.ic_dph'): {{ $invoice->ic_dph ? $invoice->ic_dph : $invoice->business_details->get('ic_dph') }}<br /> @endif
        </div>
        <div class="col-xs-6">
            <h4>@lang('invoices::invoices.customer')</h4>
            @if($invoice->customer_details->get('company_name')) {{ $invoice->customer_details->get('company_name') }}<br /> @endif
            {{ $invoice->customer_details->get('name') }}<br />
            {{ $invoice->customer_details->get('street') }}<br />
            {{ $invoice->customer_details->get('zip') }} {{ $invoice->customer_details->get('city') }}
            {{ $invoice->customer_details->get('country') }}<br />
            @if($invoice->customer_details->get('ico')) @lang('invoices::invoices.ico'): {{ $invoice->customer_details->get('ico') }}<br /> @endif
            @if($invoice->customer_details->get('dic')) @lang('invoices::invoices.dic'): {{ $invoice->customer_details->get('dic') }}<br /> @endif
            @if($invoice->customer_details->get('ic_dph')) @lang('invoices::invoices.ic_dph'): {{ $invoice->customer_details->get('ic_dph') }}<br /> @endif
        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-xs-2">
            @lang('invoices::invoices.issue_date')<br />
            {{ Carbon\Carbon::createFromFormat('Y-m-d', $invoice->dates->get('issue_date'))->format('d.m.Y') }}
        </div>
        <div class="col-xs-2">
            @lang('invoices::invoices.delivery_date')<br />
            {{ Carbon\Carbon::createFromFormat('Y-m-d', $invoice->dates->get('delivery_date'))->format('d.m.Y') }}
        </div>
        <div class="col-xs-2">
            @lang('invoices::invoices.due_date')<br />
            {{ Carbon\Carbon::createFromFormat('Y-m-d', $invoice->dates->get('due_date'))->format('d.m.Y') }}
        </div>
        <div class="col-xs-2">
            @lang('invoices::invoices.payment')<br />
            {{ $invoice->types->get('payment_type') }}
        </div>
        <div class="col-xs-2">
            @lang('invoices::invoices.delivery')<br />
            {{ $invoice->types->get('delivery_type') }}
        </div>
    </div>
    <br />
    <br />
    <div class="row">
        <div class="col-xs-4">
            @lang('invoices::invoices.iban')<br/>
            <b>{{ $invoice->payment_info->get('iban') }}</b>
        </div>
        <div class="col-xs-1">
            @lang('invoices::invoices.swift')<br/>
            <b>{{ $invoice->payment_info->get('swift') }}</b>
        </div>
        <div class="col-xs-2">
            @lang('invoices::invoices.variable')<br/>
            <b>{{ $invoice->number }}</b>
        </div>
        <div class="col-xs-1">
            @lang('invoices::invoices.constant')<br/>
            <b>{{ $invoice->payment_info->get('ks') }}</b>
        </div>
        <div class="col-xs-2">
            @lang('invoices::invoices.total')<br/>
            <b>{{ number_format(($invoice->price + $invoice->tax) - $invoice->payments, 2, ',', '') }} {{ $invoice->formatCurrency()->symbol }}</b>
        </div>
    </div>
    <br />
    <br />
    @if($invoice->rate == 0)
        <p>@lang('invoices::invoices.tax_note')</p>
    @endif
    <p>@lang('invoices::invoices.text'): {{ $invoice->order }}</p>
    <table class="table">
        <thead>
        <tr>
            <th>@lang('invoices::invoices.number')</th>
            <th>@lang('invoices::invoices.name')</th>
            <th class="text-right">@lang('invoices::invoices.rate')</th>
            <th class="text-right">@lang('invoices::invoices.quantity')</th>
            <th class="text-right">@lang('invoices::invoices.unit_price')</th>
            <th class="text-right">@lang('invoices::invoices.price')</th>
            <th class="text-right">@lang('invoices::invoices.tax')</th>
            <th class="text-right">@lang('invoices::invoices.price_tax')</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($invoice->items as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->get('name') }}</td>
                <td class="text-right">{{ round($item->get('rate')) }} %</td>
                <td class="text-right">{{ $item->get('quantity') }}</td>
                <td class="text-right">{{ number_format($item->get('price') / $item->get('quantity'), 2, ',', '') }} {{ $invoice->formatCurrency()->symbol }}</td>
                <td class="text-right">{{ number_format($item->get('price'), 2, ',', '') }} {{ $invoice->formatCurrency()->symbol }}</td>
                <td class="text-right">{{ number_format($item->get('tax'), 2, ',', '') }} {{ $invoice->formatCurrency()->symbol }}</td>
                <td class="text-right">{{ number_format($item->get('price') + $item->get('tax'), 2, ',', '') }} {{ $invoice->formatCurrency()->symbol }}</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="5">@lang('invoices::invoices.summary')</td>
            <td class="text-right"><b>{{ number_format($invoice->price, 2, ',', '') }} {{ $invoice->formatCurrency()->symbol }}</b></td>
            <td class="text-right"><b>{{ number_format($invoice->tax, 2, ',', '') }} {{ $invoice->formatCurrency()->symbol }}</b></td>
            <td class="text-right"><b>{{ number_format($invoice->price + $invoice->tax, 2, ',', '') }} {{ $invoice->formatCurrency()->symbol }}</b></td>
        </tr>
        @if($invoice->payments)
            <tr>
                <td colspan="7">@lang('invoices::invoices.payments')</td>
                <td class="text-right">{{ number_format($invoice->payments, 2, ',', '') }} {{ $invoice->formatCurrency()->symbol }}</td>
            </tr>
        @endif
        <tr>
            <td colspan="7">@lang('invoices::invoices.total')</td>
            <td class="text-right"><b>{{ number_format(($invoice->price + $invoice->tax) - $invoice->payments, 2, ',', '') }} {{ $invoice->formatCurrency()->symbol }}</b></td>
        </tr>
        </tbody>
    </table>
    <br />
    @if($invoice->signature)
        <div class="row">
            <div class="col-xs-4 col-xs-offset-8">
                <img class="img-rounded" src="{{ $invoice->signature }}">
            </div>
        </div>
    @endif
</div>
</body>
</html>
