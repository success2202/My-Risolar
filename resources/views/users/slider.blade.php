<section class="slider">
    <div class="slick-carousel m-slides-0" 
      data-slick='{"slidesToShow": 1, "arrows": true,"autoplay": true, "dots": false, "speed": 3000,"fade": true,"cssEase": "linear"}'>
      
      @forelse($sliders as $slider)
      <div class="slide-item align-v-h">
        <div class="bg-img"><img src="{{asset('images/sliders/'.$slider->image_path)}}" alt=""></div>
   
      </div><!-- /.slide-item -->
      @empty 
      @endforelse
    </div><!-- /.carousel -->
  </section><!-- /.slider -->