@extends('layout.home')
@section('title',$title)
<!-- end banner_x -->


@section('content')   


	<!-- start danpin -->
		<div class="danpin center">
			
			<div class="biaoti center">小米测评</div>
			<div class="main center">

			<?php $i = 0 ?>

			@foreach ($res as $k=>$v)

		
				<div class="mingxing fl">
					<div class="sub_mingxing"><a href="/details/{{$v->nid}}"><img src="{{$v->imgs}}" alt=""></a></div>




					<div class="pinpai"><a href="">{{$v->nname}}</a></div>
					<div class="youhui">{{$v->desc}}</div>
					
				</div>

				<?php $i++; ?>

				@if($i == 5 || $i == 10)
				
				  <div class="clear"></div>
				  </div>
				<div class="main center" style="margin-top: 20px; ">
			
				
				@endif
				@endforeach
			
				 <div class="clear"></div>
				 
				</div>
				<div style="width: 1226px; height: 50px; text-align: center;">
				 	{{ $res->links() }}
				 </div>
				
			
		
		</div>

@endsection 


@section('js')

@endsection

	
	</body>
</html>