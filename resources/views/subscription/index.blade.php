@extends('layouts.admin.main')

@section('content')
    <link href="{{asset('css/plans.css')}}" rel="stylesheet">
    <div class="container-fluid pt-4 px-4">
        @if(Session::has('note'))
            <div class="alert alert-warning">{{Session::get('note')}}</div>
        @endif
            <div class="row bg-secondary rounded mx-0">
                <div class="bg-secondary mt-3 mb-2 text-center"><h3>Subscribe</h3></div>
            </div>
            <br>
                    <div class="row bg-secondary rounded align-items-center justify-content-center mx-0">
                        <div class="col-md-6 mt-4 mb-3 text-center">
    <div id="generic_price_table">
        <section>
            <div class="container">
                <!--BLOCK ROW START-->
                <div class="row">
                    <div class="col-md-4">

                        <!--PRICE CONTENT START-->
                        <div class="generic_content clearfix">

                            <!--HEAD PRICE DETAIL START-->
                            <div class="generic_head_price clearfix">

                                <!--HEAD CONTENT START-->
                                <div class="generic_head_content clearfix">

                                    <!--HEAD START-->
                                    <div class="head_bg"></div>
                                    <div class="head">
                                        <span>Weekly</span>
                                    </div>
                                    <!--//HEAD END-->

                                </div>
                                <!--//HEAD CONTENT END-->

                                <!--PRICE START-->
                                <div class="generic_price_tag clearfix">
                                <span class="price">
                                    <span class="sign">€</span>
                                    <span class="currency">20</span>
                                    <span class="cent">.00</span>
                                    <span class="month">/WEK</span>
                                </span>
                                </div>
                                <!--//PRICE END-->

                            </div>
                            <!--//HEAD PRICE DETAIL END-->

                            <!--FEATURE LIST START-->
                            <div class="generic_feature_list">
                                <ul>
                                    <li><span>2GB</span> Bandwidth</li>
                                    <li><span>150GB</span> Storage</li>
                                    <li><span>12</span> Accounts</li>
                                    <li><span>7</span> Host Domain</li>
                                    <li><span>24/7</span> Support</li>
                                </ul>
                            </div>
                            <!--//FEATURE LIST END-->

                            <!--BUTTON START-->
                            <div class="generic_price_btn clearfix">
                                <a class="" href="{{route('pay.weekly')}}">Subscribe</a>
                            </div>
                            <!--//BUTTON END-->

                        </div>
                        <!--//PRICE CONTENT END-->

                    </div>

                    <div class="col-md-4">

                        <!--PRICE CONTENT START-->
                        <div class="generic_content active clearfix">

                            <!--HEAD PRICE DETAIL START-->
                            <div class="generic_head_price clearfix">

                                <!--HEAD CONTENT START-->
                                <div class="generic_head_content clearfix">

                                    <!--HEAD START-->
                                    <div class="head_bg"></div>
                                    <div class="head">
                                        <span>Monthly</span>
                                    </div>
                                    <!--//HEAD END-->

                                </div>
                                <!--//HEAD CONTENT END-->

                                <!--PRICE START-->
                                <div class="generic_price_tag clearfix">
                                <span class="price">
                                    <span class="sign">€</span>
                                    <span class="currency">80</span>
                                    <span class="cent">.00</span>
                                    <span class="month">/MON</span>
                                </span>
                                </div>
                                <!--//PRICE END-->

                            </div>
                            <!--//HEAD PRICE DETAIL END-->

                            <!--FEATURE LIST START-->
                            <div class="generic_feature_list">
                                <ul>
                                    <li><span>2GB</span> Bandwidth</li>
                                    <li><span>150GB</span> Storage</li>
                                    <li><span>12</span> Accounts</li>
                                    <li><span>7</span> Host Domain</li>
                                    <li><span>24/7</span> Support</li>
                                </ul>
                            </div>
                            <!--//FEATURE LIST END-->

                            <!--BUTTON START-->
                            <div class="generic_price_btn clearfix">
                                <a class="" href="{{route('pay.monthly')}}">Subscribe</a>
                            </div>
                            <!--//BUTTON END-->

                        </div>
                        <!--//PRICE CONTENT END-->

                    </div>
                    <div class="col-md-4">

                        <!--PRICE CONTENT START-->
                        <div class="generic_content clearfix">

                            <!--HEAD PRICE DETAIL START-->
                            <div class="generic_head_price clearfix">

                                <!--HEAD CONTENT START-->
                                <div class="generic_head_content clearfix">

                                    <!--HEAD START-->
                                    <div class="head_bg"></div>
                                    <div class="head">
                                        <span>Yearly</span>
                                    </div>
                                    <!--//HEAD END-->

                                </div>
                                <!--//HEAD CONTENT END-->

                                <!--PRICE START-->
                                <div class="generic_price_tag clearfix">
                                <span class="price">
                                    <span class="sign">€</span>
                                    <span class="currency">200</span>
                                    <span class="cent">.00</span>
                                    <span class="month">/YRL</span>
                                </span>
                                </div>
                                <!--//PRICE END-->

                            </div>
                            <!--//HEAD PRICE DETAIL END-->

                            <!--FEATURE LIST START-->
                            <div class="generic_feature_list">
                                <ul>
                                    <li><span>2GB</span> Bandwidth</li>
                                    <li><span>150GB</span> Storage</li>
                                    <li><span>12</span> Accounts</li>
                                    <li><span>7</span> Host Domain</li>
                                    <li><span>24/7</span> Support</li>
                                </ul>
                            </div>
                            <!--//FEATURE LIST END-->

                            <!--BUTTON START-->
                            <div class="generic_price_btn clearfix">
                                <a class="" href="{{route('pay.yearly')}}">Subscribe</a>
                            </div>
                            <!--//BUTTON END-->

                        </div>
                        <!--//PRICE CONTENT END-->

                    </div>
                </div>
                <!--//BLOCK ROW END-->
            </div>
        </section>
    </div>
                        </div>
                    </div>
@endsection
