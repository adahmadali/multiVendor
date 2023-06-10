@extends('frontendMaster')
@section('mainBody')
    @include('frontend.includes.homeSlider')
        <!--End category slider-->
        @include('frontend.includes.categorySlider')
        <!--End category slider-->
        <!-- banner start -->
        @include('frontend.includes.banner')
        <!--End banners-->

        <!--Products Tabs-->
        @include('frontend.includes.productTab')
        <!--Products Tabs-->

        <!-- Best Sales-->
        @include('frontend.includes.bestSale')
        <!--End Best Sales-->

        <!-- TV Category -->

        @include('frontend.includes.tvCategory')
        <!--End TV Category -->

        <!-- Tshirt Category -->

        @include('frontend.includes.t-shirt')
        <!--End Tshirt Category -->

        <!-- Computer Category -->

        @include('frontend.includes.computerCategory')
        <!--End Computer Category -->

        <!-- hot deal, special offer etc -->
        @include('frontend.includes.specialOffer')
        <!--End 4 columns-->

        <!--Vendor List -->
        @include('frontend.includes.vendorList')
        <!--End Vendor List -->



@endsection