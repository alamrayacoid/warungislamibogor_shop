@extends('main')

@section('content')

<h1>Warung Islami Bogor Rekruitment</h1>

<hr style="border-color: #b9b9b9">

<div class="row">        

    <div class="col-lg-12">

        <section class="variable slider">
            <div>
                <img src="http://placehold.it/350x300?text=1">
            </div>
            <div>
                <img src="http://placehold.it/200x300?text=2">
            </div>
            <div>
                <img src="http://placehold.it/100x300?text=3">
            </div>
            <div>
                <img src="http://placehold.it/200x300?text=4">
            </div>
            <div>
                <img src="http://placehold.it/350x300?text=5">
            </div>
            <div>
                <img src="http://placehold.it/300x300?text=6">
            </div>
        </section>

    </div>

</div>

@endsection
@section('extra_script')
<script type="text/javascript">
    $(document).ready(function(){
        $(".variable").slick({
            autoplay:true,
            autoplaySpeed:5000,
            dots: true,
            infinite: true,
            variableWidth: true
        });
    })
</script>
@endsection