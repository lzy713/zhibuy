@extends('layout.home')
@section('title',$title)
<!-- end banner_x -->


@section('content')   


	<!-- start danpin -->
		<div class="danpin center">
			
			<div class="biaoti center">{{$res->nname}}</div>
		
		
				<div class="main center">
				<div class="mingxing fl" style="height: auto;width: 1200px;">
					<div style="height: 40px;width: 1000px;font-size: 20px;margin-left: 50px;margin-top: 30px;"></div>
					
					
					<div id="homeMsg"><a href="">{!!$res->detail!!}</a></div>
					
				</div>
				


				<div class="clear"></div>
			</div>	
	

			
			
			<div class="clear"></div>
		
			
		
		</div>

		

	@endsection 




@section('js')

@endsection