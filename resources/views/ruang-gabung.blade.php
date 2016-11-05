<html>
	<head>
		
	    <meta charset="utf-8" />
	    <title>Status Ruangan</title>
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	   <!-- BEGIN GLOBAL MANDATORY STYLES -->          
	    <!-- <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/> -->
	    <!-- END GLOBAL MANDATORY STYLES -->
	    <link rel="shortcut icon" href="favicon.ico" />
		<style>
			.ruang {
			    background-color: #00FF00;
			    width: 120px;
			    height: 80px;
			    padding: 25px;
			    margin: 10px;
			    color: white;
			    font-size: 14px;
			    text-align: center;
				vertical-align: center;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="row col-xs-9" style="margin:10px 10px;">
			  @foreach($data as $ruang)
			  <button class="col-xs-1 ruang" onclick=" <?php if($ruang->available == 0){ ?> location.href = '{{ route('set.activeGabung', ['id' => $ruang->id]) }}'<?php }else{ ?>location.href = '{{ route('set.inactiveGabung', ['id' => $ruang->id]) }}'<?php } ?>" style="<?php if($ruang->available == 0): ?>background-color: red <?php endif; ?>">Ruang {{ $ruang->id }}</button>
			  @endforeach
			</div>
		</div>

	</body>

	<script>
        window.onload = function() {
            setTimeout(function(){ location.href = "{{ url('statusRuangGabung') }} "; }, 10000);
        };
    </script>
</html>
