@extends('admin.layouts.master')

@section('content')
    <link rel="stylesheet" href="{{ load_asset('css/client.css') }}">

    <div class="content-wrapper">

        <section class="content-header">
            <h1>
                后台
                <small>客户</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"><i
                                class="fa fa-dashboard"></i> 后台</a></li>
                <li class="active">客户</li>
            </ol>
        </section>

        <section class="content">

            @include('admin.layouts.partials.alerts')

            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">客户</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool"
                                data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="box-body">

                    <div class="client-info">
                        <div class="form-group">
                            <strong>合同编号:</strong>
                            {{ $client->contractno }}
                        </div>
                        <div class="form-group">
                            <strong>非续投/续投:</strong>
                            {{ Client::IsContinueCs($client->is_continue) }}
                        </div>
                        <div class="form-group">
                            <strong>出借人:</strong>
                            {{ $client->client }}
                        </div>
                        <div class="form-group">
                            <strong>身份证:</strong>
                            {{ $client->cardid }}
                        </div>
                        <div class="form-group">
                            <strong>性别:</strong>
                            @if ($client->gender == 'M')
                                男
                            @else
                                女
                            @endif
                        </div>
                    </div>

                    <div class="product-info">
                        <div class="form-group">
                            <strong>出借金额:</strong>
                            {{ $client->loan_amount }}
                        </div>
                        <div class="form-group">
                            <strong>产品名称:</strong>
                            {{ $client->product_name }}
                        </div>
                        <div class="form-group">
                            <strong>期数（单位：月）:</strong>
                            {{ $client->nper }}
                        </div>
                        <div class="form-group">
                            <strong>年化收益率:</strong>
                            {{ $client->annualized_return }}%
                        </div>
                        <div class="form-group">
                            <strong>利息总额:</strong>
                            {{ $client->gross_interest }}元
                        </div>
                        <div class="form-group">
                            <strong>月付利息:</strong>
                            {{ $client->interest_monthly }}元
                        </div>
                        <div class="form-group">
                            <strong>划扣日期:</strong>
                            {{ $client->deduct_date }}
                        </div>
                        <div class="form-group">
                            <strong>初始出借日期:</strong>
                            {{ $client->loan_date }}
                        </div>
                        <div class="form-group">
                            <strong>初始出借日期:</strong>
                            {{ $client->loan_date }}
                        </div>
                        <div class="form-group">
                            <strong>到期日:</strong>
                            {{ $client->due_date }}
                        </div>
                        <div class="form-group">
                            <strong>账单日:</strong>
                            {{ $client->billing_days }}
                        </div>
                        <div class="form-group">
                            <strong>到期天数:</strong>
                            {{ $client->expire_days }}
                        </div>
                        <div class="form-group">
                            <strong>状态:</strong>
                            @if ($client->status ==
                        </div>
                    </div>

                    <a class="btn bg-purple"
                       href="{{ route('clients.edit',$client->id) }}"><i
                                class="fa fa-edit"> 编辑</i></a>
                    {!! Form::open(['method' => 'DELETE','route' => ['clients.destroy', $client->id],'style'=>'display:inline','class'=>'delete']) !!}
                    {!! Form::button('<i class="fa fa-remove"> 删除</i>', ['class'=>'btn btn-danger', 'type'=>'submit']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </section>
    </div>

@endsection