@extends('main')

@section('extra_style')
<style type="text/css">
  .upper-alpha{
    list-style-type: upper-alpha !important;
  }
  .fs-150{
    font-size: 150%;
    position: relative;
  }
  .badge-circle{
    height: 50px;
    min-width: 50px;
    width: auto;
    border-radius: 50%;
    font-size: 150%;
    font-weight: 0;
    padding: 10px;
    margin-right: 10px; 
  }
  textarea{
    max-height: 200px;
  }

</style>

@endsection

@section('content')
<div style="position: relative;">
  <h1 style="display: initial;">Ujian Online</h1>
  <div id="clock" class="pull-right fs-150" style="display: initial;">
    
  </div>
</div>

<hr style="border-color: #b9b9b9">

{{-- 
<div class="row">
   <div class="col-lg-12 fs-150">

      <p>
        <span class="badge badge-circle badge-primary">1</span>
        Which of the following jQuery method remove all or the specified class(es) from the set of matched elements?
      </p>
       
      <div class="ibox">
           
            <div class="ibox-content">

              

            </div>

      </div>

   </div> 
</div> --}}


<div id="wizard">

    @for($i=0;$i<20;$i++)
      <h2>(Ganda)</h2>
      <section>
          <p>Which of the following jQuery method remove all or the specified class(es) from the set of matched elements?</p>
              <ul class="upper-alpha">
                <li>
                  <label>
                    <input type="radio" name="answer-{{$i}}">
                    <span>removeClass( class )</span>
                  </label>
                </li>
                <li>
                  <label>
                    <input type="radio" name="answer-{{$i}}">
                    <span>removeStyleClass( class )</span>
                  </label>
                </li>
                <li>
                  <label>
                    <input type="radio" name="answer-{{$i}}">
                    <span>removeCSSClass( class )</span>
                  </label>
                </li>
                <li>
                  <label>
                    <input type="radio" name="answer-{{$i}}">
                    <span>None of the above.</span>
                  </label>
                </li>
              </ul>
      </section>
    @endfor

    @for($j=0;$j<5;$j++)
      <h2>(Essay)</h2>
      <section>
          <p>What is Jquery?</p>
          <textarea class="form-control" name="answer-{{$j}}"></textarea>
      </section>
    @endfor
</div>



@endsection
@section('extra_script')


<script type="text/javascript">
  $(document).ready(function(){
    function scrollEnd(){
      $("html, body").animate({ scrollTop: $(document).height() }, 500);
    }

    scrollEnd();

    

    $("#wizard").steps({
        headerTag: "h2",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        autoFocus: true,
        enableAllSteps:true,
        enableCancelButton:false,
        onStepChanging: function (event, currentIndex, newIndex) {
          console.log("event",event,"currentIndex", currentIndex, "newIndex", newIndex);

          var wizard_head = $('#wizard-t-'+ currentIndex);
          var wizard_body = $('#wizard-p-'+ currentIndex);

          console.log(wizard_body.find('[type="radio"]').length);

          var wizard_val_length = wizard_body.find('[type="radio"]').length == 0 ? wizard_body.find('textarea').length : wizard_body.find('[type="radio"]').length;

          for(var i = 0; i<wizard_val_length;i++){
            if (wizard_body.find('[type="radio"]').eq(i).is(':checked') || $.trim(wizard_body.find('textarea').val())) {
              wizard_head.parents('li').addClass('active-filled');
              console.log('statement if is true');
            } else if(!$.trim(wizard_body.find('textarea').val()) && wizard_body.find('[type="radio"]').length === 0){
              wizard_head.parents('li').removeClass('active-filled');

            }

          }

          return true;
        },
        labels: {
            cancel: "Batal",
            current: "langkah saat ini:",
            pagination: "Pagination",
            finish: "Selesai",
            next: "Lanjut",
            previous: "Kembali",
            loading: "Sedang Memuat ..."
        },
        onFinishing: function (event, currentIndex) {
          return true; 
        }, 
        onFinished: function (event, currentIndex) {

        }
    });

    var fiveSeconds = new Date().getTime() + 3600000;
    $('#clock').countdown(fiveSeconds, function(event) {
      $(this).html(event.strftime('%H:%M:%S'));
    });


    $('#wizard .steps ul > li > a').click(function(){
      scrollEnd();
    });
  })
</script>
@endsection